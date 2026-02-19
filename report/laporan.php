<?php
include '../config/koneksi.php';

$data = mysqli_query($conn,"
SELECT siswa.id, siswa.nama,
SUM(jenis_pelanggaran.poin) as total
FROM pelanggaran
JOIN siswa ON siswa.id = pelanggaran.siswa_id
JOIN jenis_pelanggaran ON jenis_pelanggaran.id = pelanggaran.jenis_id
GROUP BY siswa.id
");
?>

<h2>Laporan Poin Siswa</h2>

<table border="1">
<tr>
<th>Nama</th>
<th>Total Poin</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) {

$total = $row['total'];

if($total >= 100){
    $status = "SP3";
}elseif($total >= 75){
    $status = "SP2";
}elseif($total >= 50){
    $status = "SP1";
}else{
    $status = "Aman";
}
?>

<tr>
<td><?= $row['nama']; ?></td>
<td><?= $total; ?></td>
<td><?= $status; ?></td>
</tr>

<?php } ?>
</table>

<br>
<a href="print_pdf.php">Print PDF</a>
