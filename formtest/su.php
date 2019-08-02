<?php
include "header.php";
include "db.php";
include "navbar.php";
include "sidebar.php";
include "su_access.php";
?>

<div class="content ">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-self-center">
							<div class="col-md-9 my-auto mx-auto text-justify">
								Klik tombol berikut untuk mengubah hak akses sebuah user.
							</div>
							<div class="col-md-3 my-auto mx-auto">
								<a href="privilege.php"><button class="btn btn-success btn-block">Ubah hak akses</button></a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row align-self-center">
							<div class="col-md-9 my-auto mx-auto text-justify">
								Klik tombol berikut untuk mengakses halaman Home Teknisi
							</div>
							<div class="col-md-3 my-auto mx-auto">
								<a href="home_teknisi.php"><button class="btn btn-success btn-block">Home (Teknisi)</button></a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="row align-self-center">
							<div class="col-md-9 my-auto mx-auto text-justify">
								Klik tombol berikut untuk mengakses halaman Home User
							</div>
							<div class="col-md-3 my-auto mx-auto">
								<a href="home_user.php"><button class="btn btn-success btn-block">Home (User)</button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>