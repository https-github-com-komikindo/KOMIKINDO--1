<?php
session_start();
  // memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit;
}

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM item WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>CRUD</title>

</head>

<body>
    <nav>
        <h2><a class="home" href="home.php">Admin</a></h2>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="tambah.php">Add New Comic</a></li>
            <li><a href="#"><?php echo $_SESSION['admin']['username'];  ?> <i class="fa-solid fa-user"></i></a></li>
            <li><a href="index.php">Log Out</a></li>

        </ul>

        </div>
    </nav><br><br>
    <center>
        <h1>Edit Comic</h1>
    </center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
        <section class="base">
            <!-- menampung nilai id produk yang akan di edit -->
            <input name="id" value="<?php echo $data['id']; ?>" hidden />
            <div>
                <label>Judul</label>
                <input type="text" name="judul" <?php echo $data['judul'];?> />
            </div>
            <div>
                <label>Sinopsis</label>
                <input type="text" name="sinopsis" <?php echo $data['sinopsis']; ?> />
            </div>
            <div>
                <label>Episode</label>
                <input type="text" name="eps" <?php echo $data['eps']; ?> />
            </div>
            <div>
                <label>Link episode</label>
                <input type="text" name="link_eps" <?php echo $data['link_eps']; ?> />
            </div>
            <div>
                <label>Produser</label>
                <input type="text" name="produser" <?php echo $data['produser']; ?>>
            </div>
            <div>
                <label>Rating</label>
                <input type="text" name="rating" <?php echo $data['rating']; ?>>
            </div>
            <div>
                <label>Terakhir Ditambah</label>
                <input type="datetime-local" name="tgl" <?php echo $data['tgl']; ?>>
            </div>
            <div>
                <label>Gambar</label>
                <img src="img/<?php echo $data['gmbr_judul']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                <input type="file" name="gmbr_judul" />
                <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
            </div>
            <div>
                <button type="submit">Simpan Perubahan</button>
            </div>
        </section>
    </form>
</body>

</html>