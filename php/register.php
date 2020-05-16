<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$ttt = $_SESSION["ttt"];
		header("location:../$ttt");
	} else {
		#do nothing
	}
?>
<?php require 'config.php'; ?>
<?php

	$ty = $_POST['t'];

	if ($ty != "") {
		switch ($ty) {
			case 'u':
				$name = $_POST['name'];
				$type = $_POST['type'];
				$status = $_POST['status'];
				$email = $_POST['email'];
				$website = mysqli_real_escape_string($conn, $_POST['website']);
				$est_date = $_POST['est_date'];
				$password = $_POST['password'];

				if ($name != "" && $type != "" && $status != "" && $email != "" && $website != "" && $est_date != "" && $password != "") {
					$hashed_pass = md5($password);
					$insert_u_sql = "INSERT INTO `user_u` (`u_name`, `u_type`, `u_status`, `u_email`, `u_password`, `u_website`, `u_est_date`)
						VALUES ('$name', '$type', '$status', '$email', '$hashed_pass', '$website', '$est_date')";
					$insert_u_query = mysqli_query($conn, $insert_u_sql);

					if ($insert_u_query) {
						header("location:../login?t=u&er=Account has been created successfully&erty=success");
					} else {
						header("location:../register?t=u&er=Error while processing&erty=danger");
					}
				} else {
					header("location:../register?t=u");
				}
				break;

			case 'o':
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];

				if ($name != "" && $email != "" && $password != "") {
					$hashed_pass = md5($password);
					$insert_o_sql = "INSERT INTO `user_o` ( `o_name`, `o_email`, `o_password`, `o_website`)
						VALUES ('$name', '$email', '$hashed_pass', '')";
					$insert_o_query = mysqli_query($conn, $insert_o_sql);

					if ($insert_o_query) {
						header("location:../login?t=o&er=Account has been created successfully&erty=success");
					} else {
						header("location:../register?t=o&er=Error while processing&erty=danger");
					}
				} else {
					header("location:../register?t=o");
				}
				break;
			
			default:
				header("location:../");
				break;
		}
	} else {

		header("location:../");
	}
?>