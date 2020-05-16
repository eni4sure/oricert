<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php $_SESSION['welcome_shown'] = true ?>
<?php require 'php/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'constant/head.php'; ?>

<body>

	<div id="preloader"><center><div class="preloader"><img src="assets/img/logo.png"></div></center></div>

	<div id="home" class="hero-area text-center" style="height: 100vh;">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay ed-bg-color-b"></div>
		<!-- /Backgound Image -->

		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="white-text">Welcome to OriCert Verification</h1>
						<p class="lead white-text">The Most Reliable Nigerian Certificate Verification Platform</p>
						<p class="lead h5 white-text">** <b>Original Certificate Platform</b> **</p>
						
						<a class="main-button icon-button" href="./">Get Started</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/easy-responsive-tabs.js"></script>
	<script type="text/javascript" src="assets/js/j.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>