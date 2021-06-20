<!DOCTYPE html>
<html>
<head>
	<title>Kompre</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<!-- nim, nama, nilai uts, nilai uas, absen, tugas, nilai akhir, dan nilai hurufnim, nama, nilai uts, nilai uas, absen, tugas, nilai akhir, dan nilai huruf. -->
<center>
<h1>Input Nilai Mahasiswa</h1>
<br>
<form method="post" action="index.php">
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nim</label>
<input type="text" class="col-md-3" name="nim">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nama</label>
<input type="text" class="col-md-3" name="nama">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nilai uts</label>
<input type="text" name="nilaiuts" class="col-md-3">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nilai uas</label>
<input type="text" name="nilaiuas" class="col-md-3">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Absen</label>
<input type="text" name="absen" class="col-md-3">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Tugas</label>
<input type="text" name="tugas" class="col-md-3">
</div>
<br>
<!-- <div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nilai Akhir</label>
<input type="text" name="nilaiakhir" class="col-md-3">
<br>
</div>
<div class="row">
<div class="col-md-4"></div>
<label class="col-md-1">Nilai Huruf</label>
<input type="text" name="nilaihuruf" class="col-md-3">
</div> -->
<div class="row">
<div class="col-md-6"></div>
<input type="submit" name="submit" class="col-md-2">
</div>
<br>
</form>
</body>
</html>

<?php
$db = mysqli_connect("localhost","root","","kompree");
if ($db) {
	
}else{
	echo "Databse tidak terhubung";
}

if (ISSET($_POST['submit'])) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$uts = $_POST['nilaiuts'];
	$uas = $_POST['nilaiuas'];
	$absen = $_POST['absen'];
	$tugas = $_POST['tugas'];

//cara mendapatkan nilai akhir, nanti sesuaikan dengan soal
	$nilaiakhir = $uts*0.25 + $uas*0.35 + $absen*0.15 + $tugas*0.25;

if($nilaiakhir > 90){
	$nilaihuruf ='A';
}elseif($nilaiakhir > 78){
	$nilaihuruf ='B';
}elseif ($nilaihuruf > 66) {
	$nilaihuruf ='C';
}else{
	$nilaihuruf ='D';
}

//potongan harga
$diskon = $uts*0.3 + $uas*0.45 + $absen*0.25;

if ($diskon >89) {
	$potong = 50;
}elseif ($diskon > 79) {
	$potong = 40;
}elseif ($diskon > 79) {
	$potong = 30;
}else{
	$potong = 0;
}

	$query = "INSERT INTO mahasiswa 
		(nim, nama, nilai_uts,nilai_uas,absen,tugas,nilaiakhir,nilaihuruf,potonganharga)
VALUES ('$nim', '$nama', '$uts','$uas','$absen','$tugas','$nilaiakhir','$nilaihuruf','$potong')";

mysqli_query($db,$query);
};

?>
<table class="table">
	<tr>
		<th>Nim</th>
		<th>Nama</th>
		<th>Nilai UTS</th>
		<th>Nilai UAS</th>
		<th>Absen</th>
		<th>Tugas</th>
		<th>Nilai Akhir</th>
		<th>Nilai Huruf</th>
		<th>Potongan Harga</th>
	</tr>

<?php
$data = mysqli_query($db,"SELECT * FROM mahasiswa");

while($row = mysqli_fetch_array($data))
{
	echo "
	<tr>
		<td>$row[nim]</td>
		<td>$row[nama]</td>
		<td>$row[nilai_uts]</td>
		<td>$row[nilai_uas]</td>
		<td>$row[absen]</td>
		<td>$row[tugas]</td>
		<td>$row[nilaiakhir]</td>
		<td>$row[nilaihuruf]</td>
		<td>$row[potonganharga]%</td>
	</tr>
";
}

?>
</table>
</center>
