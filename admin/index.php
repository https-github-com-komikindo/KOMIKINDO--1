<?php
session_start();
require '../koneksi.php';

if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM item WHERE judul LIKE '%$keyword%'";
    $result = mysqli_query($conn, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM item";
    $result = mysqli_query($conn, $read_sql);
}

$item = [];

while ($row = mysqli_fetch_assoc($result)) {
    $item[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Home Admin</title>
</head>

<body>
    <nav>
        <h2><a class="home" href="home.php">Admin</a></h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="tambah.php">Add New Comic</a></li>
            <li><a href="#"><?php echo $_SESSION['admin']['username'];  ?> <i class="fa-solid fa-user"></i></a></li>
            <li><a href="logout.php">Log Out</a></li>

        </ul>

        </div>
    </nav>

    <section>

        <!-- <h1>Lihat Data</h1> -->
        <form action="" method="post" class="form">
            <input type="text" class="cari" name="keyword" placeholder="Pencarian" autofocus autocomplete="off">
            <button type="submit" class="logo-cari" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
            <a href="index.php" class="pencet"><button>Refresh</button></a>
        </form>

        <table border='1' width='100%' cellspacing='2' cellpadding='4px'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Sinopsis</th>
                    <th>Episode</th>
                    <th>Link Episode</th>
                    <th>Produser</th>
                    <th>Rating</th>
                    <th>Terakhir Ditambahkan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($item as $itm) : ?>
            <tr>
                <tbody>
                    <td><?= $i ?></td>
                    <td style="text-align: center">
                        <img src="img/<?php echo $itm['gmbr_judul']; ?>" style="width: 100px" />
                    </td>
                    <td><?php echo $itm['judul']; ?></td>
                    <td><?php echo $itm['sinopsis']; ?></td>
                    <td><?php echo $itm['eps']; ?></td>
                    <td><?php echo $itm['link_eps']; ?></td>
                    <td><?php echo $itm['produser']; ?></td>
                    <td><?php echo $itm['rating']; ?></td>
                    <td><?php echo $itm['tgl']; ?></td>
                    <td>
                        <a class="blue" href="edit.php?id=<?= $itm['id']; ?>"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a class="red" href="proses_hapus.php?id=<?= $itm['id']; ?>"
                            onclick="return confirm('Anda yakin akan menghapus data ini?')"><i
                                class="fa-sharp fa-solid fa-trash"> </i></a>
                    </td>
                </tbody>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </section>



</body>

</html>