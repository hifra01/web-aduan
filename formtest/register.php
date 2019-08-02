<?php
include "header_login.php";
include "db.php";
$username=$nama=$cPassErr='';
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$nama=$_POST['Nama'];
	$password=$_POST['password'];
	$cpassword=$_POST['cPassword'];
	$unit=$_POST['unit'];
	$jabatan=$_POST['jabatan'];
	$telp=$_POST['telpon'];
	$level='3';

	if($password!=$cpassword){
		$cPassErr='Password tidak cocok!';
	}
	else{
		$sql="INSERT INTO `tbluser`(`UserLogin`, `Nama`, `Password`, `IDUnit`, `IDJabatan`, `Telp`, `LevelID`) VALUES
				('$username', '$nama', '$password', '$unit', '$jabatan', '$telp', '$level');";
		$query=$conn->query($sql);
		header("Location: success.php");
	}
}

$sql="SELECT IDUnit, NamaUnit FROM tblunit;";
$query=$conn->query($sql);

$sql2="SELECT IDJabatan, NamaJabatan FROM tbljabatan;";
$query2=$conn->query($sql2);
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div class="card p-4">
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="card-header text-center text-uppercase h4 font-weight-light">
						Register
					</div>
					<div class="card-body py-5">
						<div class="form-group">
							<label for="username" class="form-control-label require">Username</label>
							<input type="name" id="username" name="username" class="form-control" value="<?php echo $username; ?>" required>
						</div>
						<div class="form-group">
							<label for="Nama" class="form-control-label require">Nama</label>
							<input type="text" id="Nama" name="Nama" class="form-control" value="<?php echo $nama; ?>" required>
						</div>
						<div class="form-group">
							<label for="password" class="form-control-label require">Password</label>
							<input type="password" id="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cPassword" class="form-control-label require">Konfirmasi Password</label><span><small>&nbsp;<?php echo $cPassErr; ?></small></span>
							<input type="password" id="cPassword" name="cPassword" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="unit" class="form-control-label require">Unit</label>
							<select id="unit" class="form-control" name="unit" required>
								<option disabled selected value>--Pilih Salah Satu--</option>
								<?php

								while($result=$query->fetch_array()){
									$rIDUnit=$result['IDUnit'];
									$rNamaUnit=$result['NamaUnit'];
									echo '
									<option value="'.$rIDUnit.'">'.$rIDUnit.' - '.$rNamaUnit.'</option>
									';
								}

								?>
							</select>
						</div>
						<div class="form-group">
							<label for="jabatan" class="form-control-label require">Jabatan</label>
							<select id="jabatan" class="form-control" name="jabatan" required>
								<option disabled selected value>--Pilih Salah Satu--</option>
								<?php

								while($result2=$query2->fetch_array()){
									$rIDJabatan=$result2['IDJabatan'];
									$rNamaJabatan=$result2['NamaJabatan'];
									echo '
									<option value="'.$rIDJabatan.'">'.$rIDJabatan.' - '.$rNamaJabatan.'</option>
									';
								}

								?>
							</select>
						</div>
						<div class="form-group">
							<label for="telpon" class="form-control-label">No. Telepon</label>
							<input type="text" id="telpon" name="telpon" class="form-control" maxlength="13">
						</div>
					</div>
					<div class="card-footer">
						<input type="submit" class="btn btn-success btn-block" value="Buat Akun" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>