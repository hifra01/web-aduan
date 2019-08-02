<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";
include "teknisi_access.php";

$IDPerbaikan = $_GET['IDPerbaikan'];
$errselesai = '';

if(isset($_POST['submit'])){
	if($_POST['tglselesai']!='' AND $_POST['Status']!='Selesai'){
		$errselesai = 'Tanggal Selesai dan Status harus sesuai';
	}

	elseif($_POST['tglselesai']=='' AND $_POST['Status']=='Selesai'){
		$errselesai = 'Tanggal Selesai dan Status harus sesuai';
	}
	else{
		$postIDPerbaikan=$_POST['IDPerbaikan'];
		$postTglTindakan=$_POST['tgltindakan'];
		$postjtin=$_POST['jamtindakan'];
		$postJamTindakan=date('H:i:s', strtotime($postjtin));
		$postWktTindakan=$postTglTindakan.' '.$postJamTindakan;
		$postIDKerusakan=$_POST['IDKerusakan'];
		$postStatus=$_POST['Status'];
		$postDeskPerbaikan=$_POST['DeskPerbaikan'];
		if($_POST['tglselesai']!=''){
			$postTglSelesai=$_POST['tglselesai'];
			$postjsel=$_POST['jamselesai'];
			$postJamSelesai=date('H:i:s', strtotime($postjsel));
			$postWktSelesai=$postTglSelesai.' '.$postJamSelesai;
			$sql="UPDATE `tblperbaikan` SET 
					TglTindakan='$postWktTindakan',
					TglPenyelesaian='$postWktSelesai',
					Status='$postStatus',
					DeskripsiPerbaikan='$postDeskPerbaikan'
				WHERE IDPerbaikan='$postIDPerbaikan';";
			$sql2="UPDATE `tblkerusakan` SET Status='$postStatus', TglSelesai='$postWktSelesai' WHERE tblkerusakan.IDKerusakan = '$postIDKerusakan';";
			$query = $conn->query($sql);
			$query2=$conn->query($sql2);
		}
		else{
			$sql="UPDATE `tblperbaikan` SET 
					TglTindakan='$postWktTindakan',
					TglPenyelesaian=NULL,
					Status='$postStatus',
					DeskripsiPerbaikan='$postDeskPerbaikan'
				WHERE IDPerbaikan='$postIDPerbaikan';";
			$sql2="UPDATE `tblkerusakan` SET Status='$postStatus', TglSelesai=NULL WHERE tblkerusakan.IDKerusakan = '$postIDKerusakan';";
			$query = $conn->query($sql);
			$query2=$conn->query($sql2);
		}	
		header("Location: view_report.php?IDPerbaikan=$postIDPerbaikan");
	}
}


$sql="SELECT `IDKerusakan`, `UserLogin`, `TglTindakan`, `TglPenyelesaian`, `DeskripsiPerbaikan`, `Status` FROM tblperbaikan INNER JOIN tbluser ON tblperbaikan.IDUser = tbluser.IdUser WHERE IDPerbaikan='$IDPerbaikan';";
$query = $conn->query($sql);

if (mysqli_num_rows($query) > 0){

	$result=$query->fetch_array();

	$IDKerusakan = $result['IDKerusakan'];
	$User = $result['UserLogin'];
	$TglTindakan = strtotime($result['TglTindakan']);
	if(isset($result['TglPenyelesaian'])){
		$TglPenyelesaian= strtotime($result['TglPenyelesaian']);
	}
	else{
		$TglPenyelesaian = '';
	}
	$DeskPerbaikan = $result['DeskripsiPerbaikan'];
	$Status = $result['Status'];
}

?>

<div class="content">
	<div class="container-fluid">
		<form method="POST" action="<?php echo $_SERVER['REQUEST_URI'];?>">
			<input type="hidden" name="IDPerbaikan" value="<?php echo $IDPerbaikan;?>">
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
										<label for="tgltindakan" class="form-control-label">Tanggal Tindakan</label>
										<input type="date" id="tgltindakan" class="form-control" name="tgltindakan" value="<?php echo date('Y-m-d',$TglTindakan);?>">
										<label for="jamtindakan" class="form-control-label mt-2">Waktu Tindakan</label>
           								<input id="jamtindakan" type="text" class="form-control" name="jamtindakan" value="<?php echo date('H:i',$TglTindakan);?>">	
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
										<input type="date" id="tglselesai" class="form-control" name="tglselesai" value="<?php echo date('Y-m-d', $TglPenyelesaian);?>">
										<label for="jamselesai" class="form-control-label mt-2">Waktu Selesai</label>
										<input id="jamselesai" type="text" class="form-control input-small" name="jamselesai" value="<?php echo date('H:i', $TglPenyelesaian);?>">
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
										<label for="IDKerusakan" class="form-control-label">ID Laporan Kerusakan</label>
										<input type="text" id="IDKerusakan" class="form-control" readonly value="<?php echo $IDKerusakan;?>" name="IDKerusakan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="NamaTeknisi" class="form-control-label">Nama Teknisi</label>
										<input type="text" id="NamaTeknisi" class="form-control" readonly value="<?php echo $User; ?>" name="NamaTeknisi">
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
										<input id="status1" type="radio" name="Status" value="Dalam Proses" hidden="hidden" <?php echo ($Status=="Dalam Proses"? "checked" : "");?> >
										<label for="status1" class="ts-helper"></label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="status2" class="ts-label">Selesai</label>
										<input id="status2" type="radio" name="Status" value="Selesai" hidden="hidden" <?php echo ($Status=='Selesai'? 'checked' : '');?> >
										<label for="status2" class="ts-helper"></label> &nbsp; <span><small><?php echo $errselesai;?></small></span>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="form-group">
										<label for="DeskPerbaikan" class="form-control-label">Deskripsi Perbaikan</label>
										<textarea id="DeskPerbaikan" name="DeskPerbaikan" class="form-control" rows="6"><?php echo $DeskPerbaikan;?></textarea>
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