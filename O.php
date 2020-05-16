<?php session_start(); ?>
<?php error_reporting(1); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$ttt = $_SESSION["ttt"];
		if ($_SESSION['ttt'] == "O") {
			$c_email = $_SESSION['email'];
		} else {
			header("location:$ttt");
		}
	} else {
		header("location:login?t=o");
	}
?>
<?php require 'php/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'constant/head.php'; ?>

<?php
	$get_details_sql = "SELECT * FROM `user_o` WHERE o_email = '$c_email'";
	$get_details_query = mysqli_query($conn, $get_details_sql);
	$get_details_row = mysqli_fetch_array($get_details_query);

	$name = $get_details_row['o_name'];
	$email = $get_details_row['o_email'];
	$website = $get_details_row['o_website'];
?>

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
						<li>Account</li>
					</ul>
					<h1 class="white-text"><?php echo $name; ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div id="dashboard" class="section">
		<div class="container bootstrap snippet">
			<div class="row">
				<div class="col-sm-3">
					<!--left col-->
					<div class="text-center">
						<a href="php/logout"><img src="assets/img/logout.jpg" class="avatar img-circle img-thumbnail" alt="avatar"></a>
						<!-- <h6>Upload a different photo...</h6>
						<input type="file" class="text-center center-block file-upload"> -->
					</div>
					<br>
					<div class="panel panel-default">
						<div class="panel-heading">
							Website <i class="fa fa-link fa-1x"></i>
						</div>
						<div class="panel-body">
							<?php if($website != ""){ echo "<a href='".$website."'>".$website."</a>"; } else { echo "Not available"; } ?>
						</div>
					</div>
				</div>
				<!--/col-3-->
				<div class="col-sm-9">
					<?php check_error_msg(); ?>
					<div id="Tab">
						<ul class="resp-tabs-list ver_1">
							<li> Account Details </li>
							<li> Change Password </li>
							<li> Verify Certificate </li>
						</ul>
						<div class="resp-tabs-container ver_1">
							<div>
								<h2>Edit Account Details</h2>
								<form action="php/update_account" method="post">
									<label class="login_label">Name / Organisation Name</label>
									<input class="login_input" type="text" name="name" placeholder="" value="<?php echo $name; ?>" required autofocus>

									<label class="login_label">E-mail</label>
									<input class="login_input" type="email" name="email" placeholder="" value="<?php echo $email; ?>" required>

									<label class="login_label">Website</label>
									<input class="login_input" type="url" name="website" placeholder="" value="<?php echo $website; ?>">

									<input type="text" name="t" value="o" hidden>

									<input type="submit" value="Update" class="login_submit">
								</form>
							</div>
							<div>
								<h2>Change Password</h2>
								<form action="php/change_pass" method="post">
									<label class="login_label">Current Password</label>
									<input class="login_input" type="password" name="c_pass" placeholder="" required autofocus>

									<label class="login_label">New Password</label>
									<input class="login_input" type="password" name="n_pass" placeholder="" required autofocus>

									<input type="text" name="t" value="o" hidden>

									<input type="submit" value="Update" class="login_submit">
								</form>
							</div>
							<div>
								<h2>Certificate Verification</h2>
								<div><a data-toggle="modal" href="#verify_cert" class="login_submit text-center">Verify Certificate</a></div>

								<?php

									if (isset($_POST['submit'])){

										$c_name = $_POST['fullname'];
										$c_serial_no = $_POST['serial_no'];
										$c_reg_no = $_POST['reg_no'];
										$c_grad_year = $_POST['grad_year'];
										$c_institution = $_POST['university'];

										if ($c_name != "" && $c_serial_no != "" && $c_reg_no != "" && $c_grad_year != "" && $c_institution != "") {

											$get_match_certificate_sql = "SELECT * FROM `certificates` WHERE `c_serial_no` = '$c_serial_no' AND c_reg_no = '$c_reg_no' AND c_grad_year = '$c_grad_year' AND c_institution = '$c_institution'";
											$get_match_certificate_query = mysqli_query($conn, $get_match_certificate_sql);

											if (mysqli_num_rows($get_match_certificate_query) > 0) {
												$get_match_certificate_row = mysqli_fetch_array($get_match_certificate_query);

												$oc_name = $get_match_certificate_row['c_name'];
												$oc_institution = $get_match_certificate_row['c_institution'];
												$oc_serial_no = $get_match_certificate_row['c_serial_no'];
												$oc_reg_no = $get_match_certificate_row['c_reg_no'];
												$oc_programme = $get_match_certificate_row['c_programme'];
												$oc_class = $get_match_certificate_row['c_class'];
												$oc_gender = $get_match_certificate_row['c_gender'];
												$oc_grad_year = $get_match_certificate_row['c_grad_year'];

												$oc_image_filename = $get_match_certificate_row['c_image_name'];


												$show_university_sql = "SELECT * FROM user_u WHERE u_id = '$oc_institution'";
												$show_university_result = mysqli_query($conn, $show_university_sql);
												$show_university_row = mysqli_fetch_assoc($show_university_result);

												$oc_university_name = $show_university_row['u_name'];
												?>
												<div class="alert alert-success">
													<h2><i class="fa fa-edit"></i> <b>Valid</b></h2>
													<h3>Certificate Details:</h3>
													<div class="h4">
																														<hr>
														<b>Owner:</b>				<?php echo $oc_name; ?>				<hr>
														<b>Institution:</b>			<?php echo $oc_university_name; ?>	<hr>
														<b>Serial No.:</b>			<?php echo $oc_serial_no; ?>		<hr>
														<b>Registration No.:</b>	<?php echo $oc_reg_no; ?>			<hr>
														<b>Programme:</b>			<?php echo $oc_programme; ?>		<hr>
														<b>Class:</b>				<?php echo $oc_class; ?>			<hr>
														<b>Gender:</b>				<?php echo $oc_gender; ?>			<hr>
														<b>Year of Graduation:</b>	<?php echo $oc_grad_year; ?>		<hr>
														<b>Image:</b>
														<br><br>
														<img src="certs/<?php echo $oc_image_filename; ?>" class="img-responsive img-thumbnail" >
														<hr>
													</div>
												</div>
												<?php
											} else {
												$show_university_sql = "SELECT * FROM user_u WHERE u_id = '$c_institution'";
												$show_university_result = mysqli_query($conn, $show_university_sql);
												$show_university_row = mysqli_fetch_assoc($show_university_result);

												$university_name = $show_university_row['u_name'];
												?>
													<div class="alert alert-danger">
														<h2><i class="fa fa-close"></i> <b>Invalid</b></h2>
														<h3>Certificate Details:</h3>
														<div class="h4">
																														<hr>
															<b>Owner:</b>				<?php echo $c_name; ?>			<hr>
															<b>Serial No.:</b>			<?php echo $c_serial_no; ?>		<hr>
															<b>Registration No.:</b>	<?php echo $c_reg_no; ?>		<hr>
															<b>Year of Graduation:</b>	<?php echo $c_grad_year; ?>		<hr>
															<b>Institution:</b>			<?php echo $university_name; ?>	<hr>
														</div>
													</div>
												<?php
											}
										} else {
											?>
												<script type="text/javascript">window.location = "O#Tab3";</script>
											<?php
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
				<!--/tab-content-->
			</div>
			<!--/col-9-->
		</div>
	</div>
	<div id="verify_cert" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" style="font-size: 40px;opacity: 1;">&times;</button>
					<h2 class="modal-title text-center ed-color-b"><i class="fa fa-edit"></i> Verify</h2>
				</div>
				<div class="modal-body">
					<div class="wrapper">
						<form action="O#Tab3" method="post">
							<label class="login_label">Owner's name</label>
							<input class="login_input" type="text" name="fullname" placeholder="Fullname" required>
							<label class="login_label">Serial Number</label>
							<input class="login_input" type="text" name="serial_no" placeholder="Serial Number" required>
							<label class="login_label">Registration No.</label>
							<input class="login_input" type="text" name="reg_no" placeholder="Registration no." required>
							<label class="login_label">Graduation Year</label>
							<input class="login_input" type="text" name="grad_year" placeholder="Graduation year" required>
							<label class="login_label">University</label>
							<select class="login_input" name="university" id="university" required style="width: 100%;">
								<option value="" disabled selected>Choose University</option>
								<?php
									$show_all_university_sql = "SELECT * FROM user_u";
									$show_all_university_result = mysqli_query($conn, $show_all_university_sql);

									while ($show_all_university_row = mysqli_fetch_assoc($show_all_university_result)){
										$u_id = $show_all_university_row['u_id'];
										$u_name = $show_all_university_row['u_name'];
										?>
											<option value="<?php echo $u_id; ?>"><?php echo $u_name; ?></option>
										<?php
									}
								?>
							</select>
							<input type="submit" value="Verify" name="submit" class="login_submit">
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>