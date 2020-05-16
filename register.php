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
						<li>Register</li>
					</ul>
					<h1 class="white-text">Register</h1>
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
						<h2 class="text-center">Register</h2>
						<?php
						if (isset($_GET['t'])) {
							if ($_GET['t'] == "o") {
								?>
									<form action="php/register" method="post">
										<label class="login_label">Name / Organisation Name</label>
										<input class="login_input" type="text" name="name" placeholder="" required autofocus>

										<label class="login_label">E-mail</label>
										<input class="login_input" type="email" name="email" placeholder="" required>

										<label class="login_label">Password</label>
										<input class="login_input" type="password" name="password" placeholder="" required>

										<input type="text" name="t" value="<?php echo $_GET['t']; ?>" hidden>

										<input type="submit" value="Register" class="login_submit">
									</form>

									<small><a data-toggle="modal" href="login?t=<?php echo $_GET['t']; ?>" class="signup_link">Already have an account ? Sign In</a></small>
								<?php
							} elseif ($_GET['t'] == "u") {
								?>
									<form action="php/register" method="post">
										<label class="login_label">University / School Name</label>
										<input class="login_input" type="text" name="name" placeholder="" required autofocus>

										<label class="login_label">Type</label>
										<select class="login_input" name="type" id="type" required style="width: 100%;">
											<option value="" disabled selected>Choose School / University type</option>
											<option value="University">University</option>
											<option value="Polytechnic">Polytechnic</option>
											<option value="College Of Eduction">College Of Eduction</option>
										</select>

										<label class="login_label">Status</label>
										<select class="login_input" name="status" id="status" required style="width: 100%;">
											<option value="" disabled selected>Choose School Status</option>
											<option value="Private">Private</option>
											<option value="State">State</option>
											<option value="Federal">Federal</option>
										</select>

										<label class="login_label">E-mail</label>
										<input class="login_input" type="email" name="email" placeholder="" required>

										<label class="login_label">Website</label>
										<input class="login_input" type="url" name="website" placeholder="" required>

										<label class="login_label">Est. Date</label>
										<select class="login_input" name="est_date" id="est_date" required style="width: 100%;">
											<option value="" disabled selected>Select establishment year</option>
											<?php foreach (range(date('Y'), "1900") as $x) {
												echo "<option value='".$x."'>".$x."</option>";
											} ?>
										</select>

										<label class="login_label">Password</label>
										<input class="login_input" type="password" name="password" placeholder="" required>

										<input type="text" name="t" value="<?php echo $_GET['t']; ?>" hidden>
										<input type="submit" value="Register" class="login_submit">
									</form>

									<small><a data-toggle="modal" href="login?t=<?php echo $_GET['t']; ?>" class="signup_link">Already have an account ? Sign In</a></small>
								<?php
							}
						} else {

						}
						?>
						

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>