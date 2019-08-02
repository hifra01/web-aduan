<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";

$IDPerbaikan=$_GET['IDPerbaikan'];

$sql="SELECT IDPerbaikan, tblperbaikan.IDKerusakan AS IDRusak, UserLogin AS IDTeknisi, Nama AS NamaTeknisi, TglTindakan, TglPenyelesaian, Status, IDPelapor, NamaPelapor, TglLapor, DeskripsiPerbaikan, Lokasi, Keluhan FROM tblperbaikan INNER JOIN (SELECT IDKerusakan, TglLapor, UserLogin AS IDPelapor, Nama AS NamaPelapor, Lokasi, JenisKeluahan AS Keluhan FROM tblkerusakan INNER JOIN tbluser ON tblkerusakan.IDUser = tbluser.IDUser INNER JOIN tblkeluhan ON IDJenisKeluhan = IDKeluhan) AS tblrusak ON tblperbaikan.IDKerusakan = tblrusak.IDKerusakan INNER JOIN tbluser ON tblperbaikan.IDUser = tbluser.IdUser WHERE IDPerbaikan = '$IDPerbaikan';";
$query=$conn->query($sql);
if(mysqli_num_rows($query)>0){
	$result=$query->fetch_array();
	$IDRusak = $result['IDRusak'];
	$NamaPelapor = $result['NamaPelapor'];
	$IDPelapor = $result['IDPelapor'];
	$TglLapor = $result['TglLapor'];
	$TglPenyelesaian = $result['TglPenyelesaian'];
	$TglTindakan = $result['TglTindakan'];
	$Lokasi = $result['Lokasi'];
	$Keluhan = $result['Keluhan'];
	$DeskPerbaikan = $result['DeskripsiPerbaikan'];
	$Status = $result['Status'];
	$IDTeknisi = $result['IDTeknisi'];
	$NamaTeknisi = $result['NamaTeknisi'];
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
								<p>ID Perbaikan : <?php echo $IDPerbaikan;?></p>
								<p>ID Kerusakan : <?php echo $IDKerusakan;?></p>
								<p>Nama Pelapor : <?php echo $NamaPelapor. ' ('.$IDPelapor.')';?></p>
								<p>Nama Teknisi : <?php echo $NamaTeknisi. ' ('.$IDTeknisi.')';?></p>
								<p>Tanggal Lapor : <?php echo $TglLapor;?></p>
								<p>Tanggal Tindakan : <?php echo $TglTindakan;?></p>
								<p>Tanggal Penyelesaian : <?php echo $TglPenyelesaian;?></p>
								<p>Lokasi : <?php echo $Lokasi;?></p>
								<p>Jenis Keluhan : <?php echo $Keluhan;?></p>
							</div>
							<div class="col-md-3">
								<p class="font-weight-bold"> Status : <?php echo $Status;?></p>
							</div>
						</div>
						<div class="row mx-5">
							<div class="col-md-12">
								<p>Deskripsi Perbaikan: </p>
							</div>
						</div>
						<div class="row mx-5 mb-5 px-2">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<?php echo $DeskPerbaikan;?>
									</div>
								</div>
							</div>
						</div>
						<div class="row mx-5 mb-5">
							<div class="col-md-8">
							</div>
							<?php if($LevelID==2 OR $LevelID==1){
								echo '<div class="col-md-2">
									<a href="editreport.php?IDPerbaikan='.$IDPerbaikan.'"><button type="button" class="btn btn-warning btn-block"><i class="icon-pencil"></i> &nbsp; Edit </button></a>
								</div>';
							}
							?>
							<div class="col-md-2">
								<a href="index.php"><button type="button" class="btn btn-danger btn-block"><i class="icon-arrow-left"></i>&nbsp;Kembali</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php";?>