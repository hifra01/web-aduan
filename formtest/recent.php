<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";
include "user_access.php";
?>
<?php

$sql="SELECT IDKerusakan, userlogin, TglLapor, Lokasi, jeniskeluahan AS keluhan, status, TglSelesai FROM tblkerusakan INNER JOIN tblkeluhan ON tblkerusakan.idjeniskeluhan=tblkeluhan.idkeluhan INNER JOIN tbluser ON tblkerusakan.iduser=tbluser.iduser WHERE tblkerusakan.IDUser = '$IdUser' GROUP BY IDKerusakan;";
$query=$conn->query($sql);

?>
<div class="content">
	<div class="container-fluid">
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
											<th>Jenis Keluhan</th>
											<th>Deskripsi Keluhan</th>
											<th>Status</th>
											<th>Tanggal Selesai</th>
										</tr>
									</thead>
									<tbody>
										<?php
											while($result=$query->fetch_array()){
												
												$idrusak=$result['IDKerusakan'];
												$TglLapor=$result['TglLapor'];
												$Lokasi=$result['Lokasi'];
												$keluhan=$result['keluhan'];
												$status=$result['status'];
												$TglSelesai=$result['TglSelesai'];
												$view = '<a href="view_entry.php?IDKerusakan='.$idrusak.'"><button type="button" class="btn btn-primary btn-block"><i class="icon-note"></i> &nbsp; Lihat </button></a>';
												echo "
												<tr>
													<td>".$idrusak."</td>
													<td>".$TglLapor."</td>
													<td>".$Lokasi."</td>
													<td>".$keluhan."</td>
													<td>".$view."</td>
													<td>".$status."</td>
													<td>".$TglSelesai."</td>
												</tr>
												";
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