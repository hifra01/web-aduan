<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";

$IDKerusakan=$_GET['IDKerusakan'];

$sql="SELECT IDKerusakan, Nama, UserLogin, TglLapor, TglSelesai, Lokasi, JenisKeluahan as Keluhan, DeskripsiKeluhan, Status FROM tblkerusakan INNER JOIN tbluser ON tblkerusakan.IDUser = tbluser.IdUser INNER JOIN tblkeluhan ON tblkerusakan.IDJenisKeluhan = tblkeluhan.IDKeluhan WHERE IDKerusakan = '$IDKerusakan';";
$query=$conn->query($sql);
if(mysqli_num_rows($query)>0){
	$result=$query->fetch_array();
	$IDKerusakan = $result['IDKerusakan'];
	$NamaPelapor = $result['Nama'];
	$uName = $result['UserLogin'];
	$TglLapor = $result['TglLapor'];
	$TglSelesai = $result['TglSelesai'];
	$Lokasi = $result['Lokasi'];
	$Keluhan = $result['Keluhan'];
	$DeskKeluhan = $result['DeskripsiKeluhan'];
	$Status = $result['Status'];
}
?>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body p-0">
						<div class="row mt-5 mx-5">
							<div class="col-md-9">
								<p><b>ID Kerusakan :</b> <?php echo $IDKerusakan;?></p>
								<p><b>Nama Pelapor :</b> <?php echo $NamaPelapor. ' ('.$uName.')';?></p>
								<p><b>Tanggal Lapor :</b> <?php echo $TglLapor;?></p>
								<p><b>Tanggal Selesai :</b> <?php echo $TglSelesai;?></p>
								<p><b>Lokasi :</b> <?php echo $Lokasi;?></p>
								<p><b>Jenis Keluhan :</b> <?php echo $Keluhan;?></p>
							</div>

							<div class="col-md-3">
								<p class="font-weight-bold"> Status : <?php echo $Status;?></p>
							</div>
						</div>
						<div class="row mx-5">
							<div class="col-md-12">
								<p class="font-weight-bold">Deskripsi Keluhan :</p>
							</div>
						</div>
						<div class="row mx-5 mb-5 px-2">
							
								<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<?php echo $DeskKeluhan;?>
									</div>
								</div>
							</div>
						</div>
						<div class="row mx-5 mb-5">
							<div class="col-md-10">
							</div>
							<div class="col-md-2 text-right">
								<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button type="button" class="btn btn-danger btn-block"><i class="icon-arrow-left"></i>&nbsp;Kembali</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php";?>