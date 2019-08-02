<?php
include "db.php";
include "header.php";
include "navbar.php";
include "sidebar.php";
include "teknisi_access.php";
?>
<?php

$sql="SELECT tblkerusakan.IDKerusakan AS IDRusak, TglLapor, Lokasi, UserLogin AS Pelapor, JenisKeluahan AS Keluhan, Status, Teknisi, IDPerbaikan, TglTindakan, TglPenyelesaian FROM tblkerusakan INNER JOIN (SELECT IDPerbaikan, IDKerusakan, UserLogin AS Teknisi, TglPenyelesaian, TglTindakan FROM tblperbaikan INNER JOIN tbluser ON tblperbaikan.IDUser = tbluser.IdUser) AS tblperbaiki ON tblkerusakan.IDKerusakan = tblperbaiki.IDKerusakan INNER JOIN tbluser ON tblkerusakan.IDUser = tbluser.IdUser INNER JOIN tblkeluhan ON IDJenisKeluhan = IDKeluhan ORDER BY IDRusak;";
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
											<th>Teknisi</th>
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
												$pelapor=$result['Pelapor'];
												$keluhan=$result['Keluhan'];
												
												$status=$result['Status'];
												$teknisi=$result['Teknisi'];
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
													<td>$teknisi</td>
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