<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php require 'php/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'constant/head.php'; ?>

<body>
	
	<?php require 'constant/navigation_bar.php'; ?>

	<div id="breadcrum" class="hero-area section">

		<!-- Backgound -->
		<div class="bg-image bg-parallax overlay ed-bg-color-b"></div>
		<!-- /Backgound -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<ul class="hero-area-tree">
						<li><a href="#">Home</a></li>
						<li>Contact</li>
					</ul>
					<h1 class="white-text">Get In Touch</h1>
				</div>
			</div>
		</div>
	</div>

	<div id="contact" class="section">
		<div class="container">
			<div class="row">

				<!-- contact form -->
				<div class="col-md-6">
					<div class="contact-form">
						<h4>Send A Message</h4>
						<form action="javascript:void(0);" id="contact-form">
							<input class="input" type="text" name="name" placeholder="Name">
							<input class="input" type="email" name="email" placeholder="Email">
							<input class="input" type="tel" name="phone_no" placeholder="Phone Number">
							<textarea class="input" name="message" placeholder="Enter your Message"></textarea>
							<button class="main-button icon-button-send">Send Message</button>
						</form>
					</div>
				</div>
				<!-- /contact form -->

				<br>

				<!-- contact information -->
				<div class="col-md-5 col-md-offset-1">
					<h4>Contact Information</h4>
					<ul class="contact-details">
						<li><i class="fa fa-envelope"></i>info@oricert.com</li>
						<li><i class="fa fa-phone"></i>+234 90-932-636-22</li>
					</ul>
					<ul class="contact-social">
						<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
				<!-- contact information -->

			</div>
		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>