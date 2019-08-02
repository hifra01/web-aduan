<?php
include "db.php";
include "header.php";
include "navbar.php";
include "sidebar.php";
include "teknisi_access.php";
?>
<?php

$sql="SELECT tblkerusakan.IDKerusakan as IDRusak, userlogin, TglLapor, Lokasi, jeniskeluahan AS keluhan, tblkerusakan.status as stts FROM tblkerusakan INNER JOIN tblkeluhan ON tblkerusakan.idjeniskeluhan=tblkeluhan.idkeluhan INNER JOIN tbluser ON tblkerusakan.iduser=tbluser.iduser WHERE tblkerusakan.IDKerusakan NOT IN (SELECT IDKerusakan FROM tblperbaikan) GROUP BY tblkerusakan.IDKerusakan;";
$query=$conn->query($sql);

$sql2="SELECT COUNT(*) AS Total, COUNT(IF(Status = 'Dalam Proses',1,NULL)) AS DlmProses, COUNT(IF(Status = 'Selesai',1,NULL)) AS Selesai, COUNT(IF(Status = 'Belum Diproses',1,NULL)) AS BlmProses FROM tblkerusakan;";
$query2=$conn->query($sql2);
$r2=$query2->fetch_array();
$Total=$r2['Total'];
$DlmProses=$r2['DlmProses'];
$Selesai=$r2['Selesai'];
$BlmProses=$r2['BlmProses'];

?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="card bg-primary p-4">
					<div class="card-body d-flex justify-content-between align-items-center text-white">
						<div>
							<span class="h4 d-block font-weight-normal mb-2"><?php echo $Total;?></span>
							<span class="font-weight-light">Total Laporan yang Masuk</span>
						</div>
						<div class="h2 text-white">
							<i class="fa fa-align-justify"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-danger p-4">
					<div class="card-body d-flex justify-content-between align-items-center text-white">
						<div>
							<span class="h4 d-block font-weight-normal mb-2"><?php echo $BlmProses;?></span>
							<span class="font-weight-light">Laporan Belum Diproses</span>
						</div>
						<div class="h2 text-white">
							<i class="fa fa-spinner"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-warning p-4">
					<div class="card-body d-flex justify-content-between align-items-center text-white">
						<div>
							<span class="h4 d-block font-weight-normal mb-2"><?php echo $DlmProses;?></span>
							<span class="font-weight-light">Laporan Dalam Proses</span>
						</div>
						<div class="h2 text-white">
							<i class="fa fa-tasks"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card bg-success p-4">
					<div class="card-body d-flex justify-content-between align-items-center text-white">
						<div>
							<span class="h4 d-block font-weight-normal mb-2"><?php echo $Selesai;?></span>
							<span class="font-weight-light">Laporan yang Selesai</span>
						</div>
						<div class="h2 text-white">
							<i class="fa fa-check-circle"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-light">
						Aduan Terakhir
					</div>
					<div class="card-body">
						<div class="row">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Tanggal Lapor</th>
											<th>Lokasi</th>
											<th>Pelapor</th>
											<th>Jenis Keluhan</th>
											<th>Deskripsi Keluhan</th>
											<th>Status</th>
											<th>Laporan</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($result=$query->fetch_array()){
												$idperbaikan=$tgltindakan=$tglpenyelesaian='';
												$idrusak=$result['IDRusak'];
												$TglLapor=$result['TglLapor'];
												$Lokasi=$result['Lokasi'];
												$pelapor=$result['userlogin'];
												$keluhan=$result['keluhan'];
												$status=$result['stts'];
												$view = '<a href="view_entry.php?IDKerusakan='.$idrusak.'"><button type="button" class="btn btn-primary btn-block"><i class="icon-note"></i> &nbsp; Lihat </button></a>';
												$tombol ='<a href="report.php?IDKerusakan='.$idrusak.'"><button type="button" class="btn btn-success btn-block"><i class="icon-pencil"></i> &nbsp; Buat </button></a>';
												echo "
												<tr>
													<td>$idrusak</td>
													<td>$TglLapor</td>
													<td>$Lokasi</td>
													<td>$pelapor</td>
													<td>$keluhan</td>
													<td>$view</td>
													<td>$status</td>
													<td>$tombol</td>
												</tr>";
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include "footer.php";?>