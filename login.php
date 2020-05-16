<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$ttt = $_SESSION["ttt"];
		header("location:$ttt");
	} else {
		#do nothing
	}
?>
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
						<li><a href="./">Home</a></li>
						<li>Login</li>
					</ul>
					<h1 class="white-text">Login</h1>
				</div>
			</div>
		</div>
	</div>

	<div id="login" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="wrapper">
						<?php check_error_msg(); ?>
						<h2 class="text-center">Login</h2>
						<form action="php/login" method="post" id="login-form">
							<label class="login_label">Email Address</label>
							<input class="login_input" type="email" id="email" name="email" placeholder="Email" required autofocus>
							<label class="login_label">Password</label>
							<input class="login_input" type="password" id="password" name="password" placeholder="Password" required>
							<input type="text" name="t" value="<?php echo $_GET['t']; ?>" hidden>
							<input type="submit" value="LogIn" class="login_submit">
						</form>

						<small><a href="register?t=<?php echo $_GET['t']; ?>" class="signup_link">Dont have an account? Sign Up</a></small>

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>