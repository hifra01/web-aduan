<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";
include "teknisi_access.php";

$IDKerusakan = $_GET['IDKerusakan'];
$errselesai = '';

if(isset($_POST['submit'])){

	if($_POST['tglselesai']!='' AND $_POST['Status']!='Selesai'){
		$errselesai = 'Tanggal Selesai dan Status harus sesuai';
	}

	elseif($_POST['tglselesai']=='' AND $_POST['Status']=='Selesai'){
		$errselesai = 'Tanggal Selesai dan Status harus sesuai';
	}
	else{
		$tgltindakan = $_POST['tgltindakan'];
		$jtin = $_POST['jamtindakan'];
		$jamtindakan = date('H:i:s', strtotime($jtin));
		$wkttindakan = $tgltindakan. ' ' . $jamtindakan;
		$IDKerusakan = $_POST['IDKerusakan'];
		$NamaTeknisi = $_POST['NamaTeknisi'];
		$Status = $_POST['Status'];
		$DeskPerbaikan = $_POST['DeskPerbaikan'];

		if($_POST['tglselesai']!=''){
			$tglselesai=$_POST['tglselesai'];
			$jsel=$_POST['jamselesai'];
			$jamselesai=date('H:i:s', strtotime($jsel));
			$wktselesai=$tglselesai.' '.$jamselesai;
			$sql="INSERT INTO `tblperbaikan` (
									`IDKerusakan`, 
									`IDUser`, 
									`TglTindakan`, 
									`TglPenyelesaian`, 
									`DeskripsiPerbaikan`,
									`Status`)
						VALUES (
									'$IDKerusakan',
									'$IdUser',
									'$wkttindakan',
									'$wktselesai',
									'$DeskPerbaikan',
									'$Status'
									);";
								
		}

		else{
	
			$sql="INSERT INTO `tblperbaikan` (
									`IDKerusakan`, 
									`IDUser`, 
									`TglTindakan`, 
									`TglPenyelesaian`, 
									`DeskripsiPerbaikan`,
									`Status`)
						VALUES (
									'$IDKerusakan',
									'$IdUser',
									'$wkttindakan',
									NULL,
									'$DeskPerbaikan',
									'$Status'
									);";
		}
		$query=$conn->query($sql);

		$sql2="UPDATE `tblkerusakan` SET status='$Status' WHERE tblkerusakan.IDKerusakan = '$IDKerusakan';";
									
		$query2=$conn->query($sql2);
		header("Location: index.php");
	}
}

?>

<div class="content">
	<div class="container-fluid">
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-light">
							Laporan Perbaikan
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group bootstrap-timepicker timepicker">
										<label for="tgltindakan" class="form-control-label require">Tanggal Tindakan</label>
										<input type="date" id="tgltindakan" class="form-control" name="tgltindakan" required>
										<label for="jamtindakan" class="form-control-label require mt-2">Waktu Tindakan</label>
           								<input id="jamtindakan" type="text" class="form-control input-small" name="jamtindakan">
									</div>
	 								<script type="text/javascript">
            							$('#jamtindakan').timepicker({
            								minuteStep: 1,
											template: false,
											showSeconds: false,
											showMeridian: false,
											defaultTime: 'current'
            							});
       								</script>
								</div>
								<div class="col-md-6">
									<div class="form-group bootstrap-timepicker timepicker">
										<label for="tglselesai" class="form-control-label">Tanggal Selesai &nbsp; <span><small><?php echo $errselesai;?></small></span></label>
										<input type="date" id="tglselesai" class="form-control" name="tglselesai">
										<label for="jamselesai" class="form-control-label require mt-2">Waktu Selesai</label>
										<input id="jamselesai" type="text" class="form-control input-small" name="jamselesai">
        							</div>
									<script type="text/javascript">
            							$('#jamselesai').timepicker({
            								minuteStep: 1,
											template: false,
											showSeconds: false,
											showMeridian: false,
											defaultTime: false
            							});
       								</script>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="IDKerusakan" class="form-control-label require">ID Laporan Kerusakan</label>
										<input type="text" id="IDKerusakan" class="form-control" readonly value="<?php echo $IDKerusakan;?>" name="IDKerusakan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="NamaTeknisi" class="form-control-label require">Nama Teknisi</label>
										<input type="text" id="NamaTeknisi" class="form-control" readonly value="<?php echo $UserLogin;?>" name="NamaTeknisi">
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">Status</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-6">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="status1" class="ts-label">Dalam Proses</label>
										<input id="status1" type="radio" name="Status" value="Dalam Proses" hidden="hidden" required>
										<label for="status1" class="ts-helper"></label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="status2" class="ts-label">Selesai</label>
										<input id="status2" type="radio" name="Status" value="Selesai" hidden="hidden" required>
										<label for="status2" class="ts-helper"></label> &nbsp; <span><small><?php echo $errselesai;?></small></span>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="form-group">
										<label for="DeskPerbaikan" class="form-control-label">Deskripsi Perbaikan</label>
										<textarea id="DeskPerbaikan" name="DeskPerbaikan" class="form-control" rows="6"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="submit" value="SUBMIT" class="btn btn-block btn-lg btn-success" name="submit">
								</div>
								<div class="col-md-6">
									<a href="index.php">
										<input type="button" value="BATAL" class="btn btn-block btn-lg btn-danger">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
include "footer.php";
?>