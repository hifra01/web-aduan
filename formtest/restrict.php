<?php session_start();?>
<?php 	$UserLogin=$_SESSION['UserLogin'];
		$IdUser=$_SESSION['IdUser'];
		$LevelID=$_SESSION['LevelID'];
?>
<?php include "header_login.php";?>
<div class="container flex-row align-items-center">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<span class="display-4 d-block">Anda tidak memiliki hak akses ke halaman ini</span>
			<div class="mb-4">Klik tombol dibawah untuk kembali ke halaman awal</div>
			<a href="index.php"><button type="button" class="btn btn-success btn-lg">Klik Disini</button></a>
		</div>
	</div>
</div>
<?php include "footer.php";?>