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
						<li><a href="./">Home</a></li>
						<li>University</li>
					</ul>
					<h1 class="white-text">Universities</h1>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">b { color: black; }</style>

	<div id="login" class="section">
		<div class="container-fluid">
			<div class="row">
				<?php
					$get_universities_sql = "SELECT * FROM `user_u` ORDER BY u_name ASC";
					$get_universities_query = mysqli_query($conn, $get_universities_sql);

					while ($get_universities_row = mysqli_fetch_array($get_universities_query)){
						?>
							<div class="col-md-3">
								<div class="text-center">
									<img src="assets/img/us.png" class="avatar img-circle img-thumbnail" alt="avatar">
								</div>
								<br>
								<div class="panel panel-default text-center">
									<div class="panel-heading"> Name </div>
									<div class="panel-body"> <b><?php echo $get_universities_row['u_name']; ?></b> </div>

									<div class="panel-heading"> Status </div>
									<div class="panel-body"> <b><?php echo $get_universities_row['u_status']; ?></b> </div>

									<div class="panel-heading"> Type </div>
									<div class="panel-body"> <b><?php echo $get_universities_row['u_type']; ?></b> </div>

									<div class="panel-heading"> Email </div>
									<div class="panel-body"> <b><?php echo $get_universities_row['u_email']; ?></b> </div>

									<div class="panel-heading"> Website </div>
									<div class="panel-body"> <a href="<?php echo $get_universities_row['u_website']; ?>"><b><?php echo $get_universities_row['u_website']; ?></b></a> </div>
								</div>
							</div>
						<?php
					}
				?>
			</div>
		</div>
	</div>

	<?php require 'constant/footer.php'; ?>

</body>
</html>