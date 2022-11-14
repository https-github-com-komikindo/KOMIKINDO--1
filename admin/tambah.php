<?php
session_start();
  include('../koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  

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
    <title>CRUD </title>

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
    </nav><br><br>
    <center>
        <h1>Add New Comic</h1>
    </center><br>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>Judul</label>
                <input type="text" name="judul" autofocus="" required="" />
            </div>
            <div>
                <label>Sinopsis</label>
                <input type="text" name="sinopsis" />
            </div>
            <div>
                <label>Episode</label>
                <input type="text" name="eps" required="" />
            </div>
            <div>
                <label>Link episode</label>
                <input type="text" name="link_eps" required="" />
            </div>
            <div>
                <label>Produser</label>
                <input type="text" name="produser" required="">
            </div>
            <div>
                <label>Rating</label>
                <input type="text" name="rating" required="">
            </div>
            <div>
                <label>Terakhir Ditambah</label>
                <input type="datetime-local" name="tgl" required="">
            </div>
            <div>
                <label>Gambar</label>
                <input type="file" name="gmbr_judul" required="" />
            </div>
            <div>
                <button class="kirim" type="submit">Kirim</button>
            </div>
        </section>
    </form>
</body>

</html>