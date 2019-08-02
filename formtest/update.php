<?php
include "header.php";
include "db.php";

$postTglTindakan=$_POST['tgltindakan'];
$postIDKerusakan=$_POST['IDKerusakan'];
$postStatus=$_POST['Status'];
$postDeskPerbaikan=$_POST['DeskPerbaikan'];
$IDPerbaikan=$_POST['IDPerbaikan'];
if($_POST['tglselesai']!=''){
	$postTglSelesai=$_POST['tglselesai'];
}
else{
	$postTglSelesai=NULL;
}
$sql="UPDATE tblperbaikan SET 
			TglTindakan='$postTglTindakan',
			TglPenyelesaian='$postTglSelesai',
			Status='$postStatus',
			DeskripsiPerbaikan='$postDeskPerbaikan'
			WHERE IDPerbaikan='$IDPerbaikan';";
$sql2="UPDATE `tblkerusakan` SET Status='$postStatus', TglSelesai='$postTglSelesai' 	WHERE tblkerusakan.IDKerusakan = '$postIDKerusakan';";
	$query = $conn->query($sql);
	$query2=$conn->query($sql2);
	header("Location: index.php");

?>