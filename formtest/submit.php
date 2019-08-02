<?php
include "db.php";
session_start();
 	$UserLogin=$_SESSION['UserLogin'];
	$IdUser=$_SESSION['IdUser'];
	$LevelID=$_SESSION['LevelID'];

$lokasi=$_POST['lokasi'];
$keluh=$_POST['keluh'];
$jumlahkeluh=count($keluh);
$deskkeluhan=$_POST['deskkeluhan'];

for ($x=0; $x < $jumlahkeluh ; $x++) { 
	$sql="INSERT INTO `tblkerusakan` (`IDUser`, `TglLapor`, `Lokasi`, `IDJenisKeluhan`, `DeskripsiKeluhan`, `Status`) VALUES('$IdUser', NOW(), '$lokasi', '$keluh[$x]', '$deskkeluhan', 'Belum Diproses');";
	$query=$conn->query($sql);
}


header("Location: recent.php");
?>