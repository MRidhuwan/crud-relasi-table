
<?php

//include koneksi database
include "koneksi.php";

//get data dari form

$id             = $_POST['id'];
$nama            = $_POST['nama'];
$alamat          = $_POST['alamat'];
$nama_bank         = $_POST['nama_bank'];
$nomor_bank           = $_POST['nomor_bank'];


//query insert data ke dalam database

$update = mysqli_query($connection, "UPDATE perusahaan INNER JOIN rekening 
ON perusahaan.id_perusahaan = rekening.id_perusahaan SET
nama = '$nama',
alamat = '$alamat',
nama_bank = '$nama_bank',
nomor_bank = '$nomor_bank'
WHERE perusahaan.id_perusahaan = '$id'") or die(mysqli_error($connection));


//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($update) {

  //redirect ke halaman index.php 
  // header('location: index.php?alert=3');
  echo "<script>alert('Data Berhasil Di Update');document.location.href='index.php?alert=3'</script>";
} else {

  //pesan error gagal insert data
  // echo "Data Gagal Disimpan!";
  // header('location: index.php?alert=1');
  echo "<script>alert('Data Gagal Di Update');document.location.href='index.php?alert=1'</script>";
}

?>