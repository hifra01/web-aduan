<div class="page-wrapper">
	<nav class="navbar page-header">
		<a href="#" class="btn btn-link sidebar-mobile-toggle d-md-none mr-auto">
			<i class="fa fa-bars"></i>
		</a>
		<a class="navbar-brand" href="index.php">
			<img src="./imgs/logo.png" alt="logo">
		</a>
		<a href="#" class="btn btn-link sidebar-toggle d-md-down-none">
			<i class="fa fa-bars"></i>
		</a> 
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="./imgs/avatar-1.png" class="avatar avatar-sm ml-1 " align="" lt="logo">
					<span class="small ml-1 d-md-down-none"><?php echo $UserLogin;?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<div class="dropdown-header">Profil</div>
					<a href="profile.php" class="dropdown-item">
						<i class="fa fa-user"></i> Profil
					</a>
					<div class="dropdown-header"></div>
					<a href="logout.php" class="dropdown-item">
						<i class="fa fa-lock"></i> Logout
					</a>
				</div>
			</li>
		</ul>
	</nav>