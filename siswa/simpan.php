<?php
include '../config/koneksi.php';

$nama = $_POST['nama'];
$nis  = $_POST['nis'];

mysqli_query($conn,"INSERT INTO siswa (nama,nis) VALUES ('$nama','$nis')");

header("Location: index.php");
?>
