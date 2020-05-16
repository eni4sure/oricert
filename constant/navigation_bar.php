<div id="preloader"><center><div class="preloader"><img src="assets/img/logo.png"></div></center></div>

<header id="header">
	<div class="container">

		<div class="navbar-header">
			<!-- Logo -->
			<div class="navbar-brand">
				<a class="logo" href="./" style="font-size: 150%;">
					<!-- <img src="./img/logo.png" alt="logo"> -->
					OriCert
				</a>
			</div>
			<!-- /Logo -->

			<!-- Mobile toggle -->
			<button class="navbar-toggle">
				<span></span>
			</button>
			<!-- /Mobile toggle -->
		</div>

		<!-- Navigation -->
		<nav id="nav">
			<ul class="main-menu nav navbar-nav navbar-right">
				<li><a href="./">Home</a></li>
				<li><a href="university">Universities</a></li>
				<li><a href="contact">Contact</a></li>
				<?php
					if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
						?><button class="login-btn" onclick="document.location='<?php echo $_SESSION['ttt']; ?>'">Account</button><?php
					} else {
						?><button class="login-btn" data-toggle="modal" data-target="#login_modal">Login</button><?php
					}
				?>
			</ul>
		</nav>
		<!-- /Navigation -->

	</div>
</header>

<div id="login_modal" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" style="font-size: 40px;opacity: 1;">&times;</button>
				<h2 class="modal-title text-center ed-color-b"><i class="fa fa-sign-in"></i> Login As</h2>
			</div>
			<div class="modal-body">
				<div class="wrapper">
					<a href="login?t=u" class="login_submit text-center">University / School</a>
					<hr>
					<a href="login?t=o" class="login_submit text-center">Organisation / Individual</a>
				</div>
				<br>
			</div>
		</div>

	</div>
</div>