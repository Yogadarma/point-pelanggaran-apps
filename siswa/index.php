<?php
session_start();
include '../config/koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM siswa");
?>

<h2>Data Siswa</h2>
<a href="tambah.php">Tambah Siswa</a>
<br><br>

<table border="1">
<tr>
<th>Nama</th>
<th>NIS</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $row['nama']; ?></td>
<td><?= $row['nis']; ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="../index.php">Kembali</a>
