<?php
include "header.php";
include "navbar.php";
include "sidebar.php";
include "user_access.php";
?>
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row align-self-center">
							<div class="col-md-8 text-justify">
								<h1 align="center">We can help you</h1>
								<br/>
								<p>Laporkan masalah komputer, printer, jaringan atau lainnya melalui formulir pengaduan dengan menekan tombol "Ajukan Aduan" di sebelah kanan (di bawah bila melalui smartphone) ini.</p>
							</div>
							<div class="col-md-4 my-auto mx-auto center">
								<a href="formaduan.php">
									<img src="./imgs/trouble.png" class="img-fluid">
									<button type="button" class="btn btn-lg btn-block btn-success">Ajukan Aduan</button>
								</a>
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