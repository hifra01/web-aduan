<div class="main-container">
	<div class="sidebar">
		<nav class="sidebar-nav">
			<ul class="nav">
				<li class="nav-title">Navigation</li>
				<li class="nav-item">
					<a href="index.php" class="nav-link">
						<i class="icon icon-home"></i> Home
					</a>
				</li>
				<?php
					if($LevelID==3 or $LevelID==1){
						echo '
							<li class="nav-item">
								<a href="recent.php" class="nav-link">
									<i class="icon icon-note"></i> Aduan Terakhir
								</a>
							</li>';
					}
				?>
				<?php
					if($LevelID==1){
						echo '
							<li class="nav-item">
								<a href="allrecent.php" class="nav-link">
									<i class="icon icon-note"></i> Semua Aduan Terakhir
								</a>
							</li>';
					}
				?>
				<?php
					if($LevelID==2 or $LevelID==1){
						echo '
							<li class="nav-item">
								<a href="current.php" class="nav-link">
									<i class="icon icon-note"></i> Aduan yang Ditangani
								</a>
							</li>';
					}
				?>
				<?php
					if($LevelID==1){
						echo '
							<li class="nav-item">
								<a href="allcurrent.php" class="nav-link">
									<i class="icon icon-note"></i> Semua Aduan yang Ditangani
								</a>
							</li>';
					}
				?>
				<li class="nav-item">
					<a href="logout.php" class="nav-link">
						<i class="icon icon-logout"></i> Log Out
					</a>
				</li>
			</ul>
		</nav>
	</div>