<?php
include "db.php";
include "header.php";
include "navbar.php";
include "sidebar.php";
include "teknisi_access.php";
?>
<?php

$sql="SELECT tblkerusakan.IDKerusakan as IDRusak, userlogin, TglLapor, Lokasi, jeniskeluahan AS keluhan, tblkerusakan.status as stts, IDPerbaikan, TglTindakan, TglPenyelesaian FROM tblkerusakan INNER JOIN tblkeluhan ON tblkerusakan.idjeniskeluhan=tblkeluhan.idkeluhan INNER JOIN tbluser ON tblkerusakan.iduser=tbluser.iduser INNER JOIN tblperbaikan ON tblkerusakan.IDKerusakan = tblperbaikan.IDKerusakan WHERE tblperbaikan.IDUser = '$IdUser' GROUP BY tblkerusakan.IDKerusakan;";
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
											<th>Pelapor</th>
											<th>Jenis Keluhan</th>
											<th>Deskripsi Keluhan</th>
											<th>Status</th>
											<th>ID Perbaikan</th>
											<th>Tanggal Tindakan</th>
											<th>Tanggal Selesai</th>
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
												$idperbaikan=$result['IDPerbaikan'];
												$tgltindakan=$result['TglTindakan'];
												$tglpenyelesaian=$result['TglPenyelesaian'];
												$view = '<a href="view_entry.php?IDKerusakan='.$idrusak.'"><button type="button" class="btn btn-primary btn-block"><i class="icon-note"></i> &nbsp; Lihat </button></a>';
												$tombol = '<a href="view_report.php?IDPerbaikan='.$idperbaikan.'"><button type="button" class="btn btn-primary btn-block"><i class="icon-magnifier"></i> &nbsp; Lihat </button></a>';
												echo "
												<tr>
													<td>$idrusak</td>
													<td>$TglLapor</td>
													<td>$Lokasi</td>
													<td>$pelapor</td>
													<td>$keluhan</td>
													<td>$view</td>
													<td>$status</td>
													<td>$idperbaikan</td>
													<td>$tgltindakan</td>
													<td>$tglpenyelesaian</td>
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