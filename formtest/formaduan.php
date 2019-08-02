<?php
include 'header.php';
include 'navbar.php';
include 'sidebar.php';
include 'user_access.php';
?>
<div class="content">
	<div class="container-fluid">
		<form method="POST" action="submit.php">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-light">
							Formulir Pengaduan
						</div>
						<input type="hidden" value="<?php echo $IdUser;?>" name="userid">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="date" class="form-control-label">Tanggal</label>
										<input id="date" class="form-control" value="<?php echo date("d-m-Y");?>" readonly name="date">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<p class="require">Jenis Keluhan</p>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-3">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="keluh1" class="ts-label">Komputer</label>
										<input id="keluh1" type="checkbox" name="keluh[]" hidden="hidden" value="1">
										<label for="keluh1" class="ts-helper"></label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="keluh2" class="ts-label">Printer</label>
										<input id="keluh2" type="checkbox" name="keluh[]" hidden="hidden" value="2">
										<label for="keluh2" class="ts-helper"></label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="keluh3" class="ts-label">Jaringan</label>
										<input id="keluh3" type="checkbox" name="keluh[]" hidden="hidden" value="3">
										<label for="keluh3" class="ts-helper"></label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="toggle-switch" data-ts-color="primary">
										<label for="keluh4" class="ts-label">Lainnya</label>
										<input id="keluh4" type="checkbox" name="keluh[]" hidden="hidden" value="4">
										<label for="keluh4" class="ts-helper"></label>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="form-group">
										<label for="lokasi" class="form-control-label require">Lokasi</label>
										<input id="lokasi" name="lokasi" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12">
									<div class="form-group">
										<label for="deskkeluhan">Deskripsi Keluhan</label>
										<textarea id="deskkeluhan" name="deskkeluhan" class="form-control" rows="6"></textarea>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-6">
									<input type="submit" value="SUBMIT" class="btn btn-block btn-lg btn-success">
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
<?php include 'footer.php';?>