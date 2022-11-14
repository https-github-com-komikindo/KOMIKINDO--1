<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form

    $id = $_POST['id'];
    $gmbr_judul  = $_FILES['gmbr_judul']['name'];
    $judul  = $_POST['judul'];
    $sinopsis = $_POST['sinopsis'];
    $eps = $_POST['eps'];
    $link_eps  = $_POST['link_eps'];
    $produser  = $_POST['produser'];
    $rating = $_POST['rating'];
    $tgl  = $_POST['tgl'];
  


//cek dulu jika ada gambar produk jalankan coding ini
if($gmbr_judul != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg, webp'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gmbr_judul); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gmbr_judul']['tmp_name'];   
  $angka_acak     = rand(5,000);
  $nama_gambar_baru = $angka_acak.'-'.$gmbr_judul; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO item (gmbr_judul, judul, sinopsis, eps, link_eps, produser, rating, tgl) VALUES ('$nama_gambar_baru', '$judul', '$sinopsis', '$eps' , '$link_eps', '$produser', '$rating', '$tgl')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpeg, jpg atau png.');window.location='tambah.php';</script>";
            }
} else {
   $query = "INSERT INTO admin (gmbr_judul, judul, sinopsis, eps, link_eps, produser, rating, tgl) VALUES (null, '$judul', '$sinopsis', '$eps' , '$link_eps', '$produser', '$rating', '$tgl')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}