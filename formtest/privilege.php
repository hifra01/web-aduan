<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";
include "su_access.php";
?>
<?php
if(isset($_POST['submit'])){
	$pIdUser=$_POST['idUser'];
	$pLevelID=$_POST['level'];
	$sql="UPDATE tbluser SET LevelID='$pLevelID' WHERE IdUser='$pIdUser';";
	$query=$conn->query($sql);
}
if(isset($_GET['username'])){
$uname = $_GET['username'];

if($uname!=''){
$sql="SELECT IdUser, UserLogin, Nama, LevelID FROM tbluser WHERE UserLogin LIKE '%".$uname."%';";
$query=$conn->query($sql);}
}
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-body">
						<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class="card">
								<div class="card-header bg-light">
									Cari User
								</div>
								<div class="card-body">
									<label for="uname" class="form-control-label">Username</label>
									<div class="input-group">
										<input type="text" class="form-control" id="uname" name="username" value="<?php echo $uname; ?>">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Cari</button>
										</span>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
						<h4>Petunjuk Hak Akses</h4><br/>
						<p> Level 1 = Super User/Admin </p>
						<p> Level 2 = Teknisi </p>
						<p> Level 3 = User </p>
					</div>
				</div>
			</div>
		</div>
		<?php

		if(mysqli_num_rows($query)>0){

		

		echo '
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<td colspan=2>IDUser</td>
											<td colspan=3>UserLogin</td>
											<td colspan=4>Nama</td>
											<td colspan=2>LevelID</td>
											<td colspan=1>Update</td>
										</tr>
									</thead>
									<tbody>';
									while($result=$query->fetch_array()){

									$rIDUser=$result['IdUser'];
									$rUserLogin=$result['UserLogin'];
									$rNama=$result['Nama'];
									$rLevelID=$result['LevelID'];
									echo '
										<tr>
										<input type="hidden" name="idUser" value="'.$rIDUser.'">
											<td colspan=2>'.$rIDUser.'</td>
											<td colspan=3>'.$rUserLogin.'</td>
											<td colspan=4>'.$rNama.'</td>
											<td colspan=2>
												<select name="level" class="form-control">
													<option value="1"'.($rLevelID==1?'selected':'').'>1 - SuperUser/Admin</option>
													<option value="2"'.($rLevelID==2?'selected':'').'>2 - Teknisi</option>
													<option value="3"'.($rLevelID==3?'selected':'').'>3 - User</option>
												</select>
											</td>
											<td colspan=1><input type="submit" name="submit" class="btn btn-primary btn-block" value="Update"></td>
										</tr>';}
										echo '
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>';
		}
		else{
			echo '
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body text-center">
							<p> Tidak ada data untuk ditampilkan </p>
						</div>
					</div>
				</div>
			</div>
			';
		}
		?>
	</div>
</div>

<?php
include "footer.php";
?>