<?php
$hostname = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "crud-db";

$connection = mysqli_connect($hostname, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
  echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
}
