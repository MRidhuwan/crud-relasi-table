<?php

//include koneksi database
include "koneksi.php";

//get data dari form
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];

$nama_bank  = $_POST['nama_bank'];
$nomor_bank = $_POST['nomor_bank'];

//query insert data ke dalam database
$insert = mysqli_query($connection, "INSERT INTO perusahaan(nama, alamat)
    VALUES ('$nama','$alamat');") or die(mysqli_error($connection));


$sql = mysqli_query($connection, "SELECT max(id_perusahaan) AS last_id 
FROM perusahaan");


$data = mysqli_fetch_array($sql);
$last_id = $data['last_id'];

$insert = mysqli_query($connection, "INSERT INTO rekening(
nama_bank, nomor_bank) VALUES 
('$nama_bank', '$nomor_bank');") or die(mysqli_error($connection));


if ($insert) {

  //redirect ke halaman index.php 
  //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
  echo "<script>alert('Data Berhasil Di Tambah');document.location.href='index.php?alert=2'</script>";
} else {

  //pesan error gagal insert data
  // echo "Data Gagal Disimpan!";
  echo "<script>alert('Data Gagal Di Tambah');document.location.href='index.php?alert=1'</script>";
}
