<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['welcome_shown'])) {
		# do nothing...
	} else {
		header("location:welcome");
	}
?>
<?php require 'php/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'constant/head.php'; ?>

<body>
	
	<?php require 'constant/navigation_bar.php'; ?>

	<div id="home" class="hero-area text-center">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay ed-bg-color-b"></div>
		<!-- /Backgound Image -->

		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="white-text">Welcome to OriCert Verification</h1>
						<p class="lead white-text">The Most Reliable Nigerian Certificate Verification Platform</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="about" class="section">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<div class="section-header">
						<h2>How It Works</h2>
					</div>

					<!-- about -->
					<div class="about">
						<i class="about-icon fa fa-users"></i>
						<div class="about-content">
							<h4>University / School</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris.
							</p>
						</div>
						<br>
						<a class="main-button icon-button" href="register?t=u">Get Started</a>
					</div>
					<!-- /about -->

					<!-- about -->
					<div class="about">
						<i class="about-icon fa fa-building"></i>
						<div class="about-content">
							<h4>Organisation / Individuals</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris.
							</p>
						</div>
						<br>
						<a class="main-button icon-button" href="register?t=o">Get Started</a>
					</div>
					<!-- /about -->
				</div>

				<div class="col-md-6">
					<div class="about-img">
						<img src="assets/img/about.png" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="contact-call-to-action" class="section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay ed-bg-color-b"></div>
		<!-- Backgound Image -->

		<div class="container">
			<div class="row">

				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="white-text">Contact Us</h2>
					<p class="lead white-text">Like What We Are Doing ? And You Would Like To Support Or Message Us</p>
					<a class="main-button icon-button" href="contact">Contact Us</a>
				</div>

			</div>
		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>