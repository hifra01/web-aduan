<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";

$sql = "SELECT UserLogin, Nama, LevelID, NamaUnit, NamaJabatan, Telp FROM tbluser INNER JOIN tblunit USING (IDUnit) INNER JOIN tbljabatan USING (IDJabatan) WHERE IdUser = '$IdUser';";
$query = $conn->query($sql);

if(mysqli_num_rows($query) > 0){
	$result = $query->fetch_array();
	$Nama=$result['Nama'];
	$uName=$result['UserLogin'];
	$Unit=$result['NamaUnit'];
	$Jabatan=$result['NamaJabatan'];
	$Telp=$result['Telp'];
	if($result['LevelID']==1){
		$Level = 'SuperUser/Admin';
	}
	elseif($result['LevelID']==2){
		$Level = 'Teknisi';
	}
	elseif($result['LevelID']==3){
		$Level = 'User';
	}
}
?>

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="list-group">
					<a href="#" class="list-group-item active">Profil</a>
					<a href="#" class="list-group-item">Pengaturan Akun <small class="small text-muted">(Dalam Pengembangan)</small></a>
				</div>
			</div>

			<div class="col-md-10">
				<div class="card">
					<div class="card-header bg-light">
						Profil
					</div>
					<div class="card-body">
						<div class="row mb-5">
							<div class="col-md-4 mb-4">
								<div>Informasi Anda</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">Nama</label>
											<input class="form-control" readonly value="<?php echo $Nama;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">Username</label>
											<input class="form-control" readonly value="<?php echo $uName;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">Unit</label>
											<input class="form-control" readonly value="<?php echo $Unit;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">Jabatan</label>
											<input class="form-control" readonly value="<?php echo $Jabatan;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">No. Telpon</label>
											<input class="form-control" readonly value="<?php echo $Telp;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label">Hak Akses</label>
											<input class="form-control" readonly value="<?php echo $Level;?>">
											<small class="form-text">Untuk mengganti Hak Akses anda, hubungi Admin.</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php include "footer.php";?>