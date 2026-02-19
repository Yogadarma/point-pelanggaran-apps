<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
}
?>

<h2>Dashboard</h2>
<a href="siswa/index.php">Data Siswa</a><br>
<a href="jenis/index.php">Jenis Pelanggaran</a><br>
<a href="pelanggaran/tambah.php">Input Pelanggaran</a><br>
<a href="report/laporan.php">Laporan</a><br>
<a href="logout.php">Logout</a>
