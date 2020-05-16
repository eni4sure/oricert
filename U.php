<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$ttt = $_SESSION["ttt"];
		if ($_SESSION['ttt'] == "U") {
			$c_email = $_SESSION['email'];
		} else {
			header("location:$ttt");
		}
	} else {
		header("location:login?t=u");
	}
?>
<?php require 'php/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require 'constant/head.php'; ?>

<?php
	$get_details_sql = "SELECT * FROM `user_u` WHERE u_email = '$c_email'";
	$get_details_query = mysqli_query($conn, $get_details_sql);
	$get_details_row = mysqli_fetch_array($get_details_query);


	$my_id = $get_details_row['u_id'];
	$name = $get_details_row['u_name'];
	$type = $get_details_row['u_type'];
	$status = $get_details_row['u_status'];
	$email = $get_details_row['u_email'];
	$website = $get_details_row['u_website'];
	$est_date = $get_details_row['u_est_date'];
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
							<a href="<?php echo $website; ?>"><?php echo $website; ?></a>
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
							<li> Upload Certificate </li>
						</ul>
						<div class="resp-tabs-container ver_1">
							<div>
								<h2>Edit Account Details</h2>
								<form action="php/update_account" method="post">
									<label class="login_label">University / School Name</label>
									<input class="login_input" type="text" name="name" placeholder="" value="<?php echo $name; ?>" required>

									<label class="login_label">Type</label>
									<select class="login_input" name="type" id="type" required style="width: 100%;">
										<option value="" disabled selected>Choose School / University type</option>
										<option <?php if($type == "University"){ echo "selected"; } else { } ?> value="University">University</option>
										<option <?php if($type == "Polytechnic"){ echo "selected"; } else { } ?> value="Polytechnic">Polytechnic</option>
										<option <?php if($type == "College Of Eduction"){ echo "selected"; } else { } ?> value="College Of Eduction">College Of Eduction</option>
									</select>

									<label class="login_label">Status</label>
									<select class="login_input" name="status" id="status" required style="width: 100%;">
										<option value="" disabled selected>Choose School Status</option>
										<option <?php if($status == "Private"){ echo "selected";} else{ } ?> value="Private">Private</option>
										<option <?php if($status == "State"){ echo "selected";} else{ } ?> value="State">State</option>
										<option <?php if($status == "Federal"){ echo "selected";} else{ } ?> value="Federal">Federal</option>
									</select>

									<label class="login_label">E-mail</label>
									<input class="login_input" type="email" name="email" placeholder="" value="<?php echo $c_email; ?>" required>

									<label class="login_label">Website</label>
									<input class="login_input" type="url" name="website" placeholder="" value="<?php echo $website; ?>" required>

									<label class="login_label">Est. Date</label>
									<select class="login_input" name="est_date" id="est_date" required style="width: 100%;">
										<option value="" disabled selected>Select establishment year</option>
										<?php foreach (range(date('Y'), "1900") as $x) {
											?>
											<option <?php if($est_date == $x){ echo "selected";} else { } ?>	value='<?php echo $x; ?>'><?php echo $x; ?></option>";
											<?php
										} ?>
									</select>

									<input type="text" name="t" value="u" hidden>
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

									<input type="text" name="t" value="u" hidden>

									<input type="submit" value="Update" class="login_submit">
								</form>
							</div>
							<div>
								<h2>Certificate Uploading</h2>
								<div><a data-toggle="modal" href="#upload_cert" class="login_submit text-center">Upload Certificate</a></div>

								<br>

								<h2>Uploaded Certificates</h2>
								<div class="table-responsive">
									<table class="table table-hover table-bordered" id="sampleTable">
										<thead>
											<tr>
												<th>Name</th>
												<th>Programme</th>
												<th>Serial No.</th>
												<th>Registration No.</th>
												<th>Class</th>
												<th>Gender</th>
												<th>Graduation Year</th>
												<!-- <th>Action</th> -->
											</tr>
										</thead>
										<tbody>
											<?php

												$get_certificate_sql = "SELECT * FROM certificates WHERE c_institution = '$my_id' ORDER BY c_id DESC";
												$get_certificate_result = mysqli_query($conn, $get_certificate_sql);

												while($get_certificate_row = mysqli_fetch_assoc($get_certificate_result)) {

													$c_name = $get_certificate_row['c_name'];
													$c_programme = $get_certificate_row['c_programme'];
													$c_serial_no = $get_certificate_row['c_serial_no'];
													$c_reg_no = $get_certificate_row['c_reg_no'];
													$c_class = $get_certificate_row['c_class'];
													$c_gender = $get_certificate_row['c_gender'];
													$c_grad_year = $get_certificate_row['c_grad_year'];
													?>
													<tr>
														<td><?php echo $c_name; ?></td>
														<td><?php  echo $c_programme; ?></td>
														<td><?php echo $c_serial_no; ?></td>
														<td><?php echo $c_reg_no; ?></td>
														<td><?php echo $c_class; ?></td>
														<td><?php echo $c_gender; ?></td>
														<td><?php echo $c_grad_year; ?></td>
														<!-- <td>
															<a href=""><i class="fa fa-edit fa-2x"></i></a>
															&nbsp;
															<a href=""><i class="fa fa-trash fa-2x"></i></a>
														</td> -->
													</tr>
													<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/tab-content-->
			</div>
			<!--/col-9-->
		</div>
	</div>
	<div id="upload_cert" class="modal fade" role="dialog" data-keyboard="true" data-backdrop="static">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" style="font-size: 40px;opacity: 1;">&times;</button>
					<h2 class="modal-title text-center ed-color-b"><i class="fa fa-edit"></i> Certificate Details</h2>
				</div>
				<div class="modal-body">
					<div class="wrapper">
						<form action="php/upload_cert" method="post" enctype="multipart/form-data">
							<label class="login_label">Owner's name</label>
							<input class="login_input" type="text" name="fullname" placeholder="" required>
							<label class="login_label">Programme</label>
							<input class="login_input" type="text" name="programme" placeholder="" required>
							<label class="login_label">Serial Number</label>
							<input class="login_input" type="text" name="serial_no" placeholder="" required>
							<label class="login_label">Registration Number</label>
							<input class="login_input" type="text" name="reg_no" placeholder="" required>
							<label class="login_label">Class</label>
							<select class="login_input" name="cert_class" id="cert_class" required style="width: 100%;">
								<option value="" disabled selected>Choose certificate Class</option>
								<option value="First class">First class</option>
								<option value="Second class upper">Second class upper</option>
								<option value="Second class lower">Second class lower</option>
							</select>
							<label class="login_label">Gender</label>
							<select class="login_input" name="gender" id="gender" required style="width: 100%;">
								<option value="" disabled selected>Choose Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<label class="login_label">Graduation Year</label>
							<select class="login_input" name="grad_year" id="grad_year" required style="width: 100%;">
								<option value="" disabled selected>Choose Graduation Year</option>
								<?php foreach (range(date('Y'), "1950") as $x) {
									echo "<option value='".$x."'>".$x."</option>";
								} ?>
							</select>
							<label class="login_label">Certificate Image</label>
							<input class="login_input" type="file" name="c_im" type="file" accept=".jpg" style="width: 100%;">
							<div class="alert alert-info" style="margin-bottom: 0px; padding: 0px; padding-left: 5px;">
								<b>Note:</b> only .jpg formats are accepted
							</div>

							<input type="submit" value="Upload" class="login_submit">
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