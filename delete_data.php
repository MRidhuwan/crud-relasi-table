

<?php
// include koneksi database
include "koneksi.php";

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  // perintah query untuk menghapus data pada tabel is_siswa
  $delete = mysqli_query($connection, "DELETE perusahaan, rekening FROM perusahaan 
  JOIN rekening ON perusahaan.id_perusahaan = rekening.id_perusahaan AND perusahaan.id_perusahaan ='$id'");
  // cek hasil query
  if ($delete) {

    //redirect ke halaman index.php 
    echo "<script>alert('Data Berhasil Di Hapus');document.location.href='index.php?alert=4'</script>";
  } else {

    //pesan error gagal insert data
    // echo "Data Gagal Disimpan!";
    echo "<script>alert('Data Gagal Di Hapus');document.location.href='index.php?alert=1'</script>";
  }
}
