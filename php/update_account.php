<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$c_email = $_SESSION['email'];
	} else {
		header("location:../");
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

				if ($name != "" && $type != "" && $status != "" && $email != "" && $website != "" && $est_date != "") {

					$update_u_sql = "UPDATE `user_u` SET `u_name` = '$name', `u_type` = '$type', `u_status` = '$status', `u_email` = '$email', `u_website` = '$website', `u_est_date` = '$est_date' WHERE u_email='$c_email'";
					$update_u_query = mysqli_query($conn, $update_u_sql);

					if ($update_u_query) {
						$_SESSION['email'] = $email;
						header("location:../U?t=u&er=Account details has been updated successfully&erty=success");
					} else {
						header("location:../U?er=Error while processing&erty=danger");
					}
				} else {
					header("location:../U");
				}
				break;

			case 'o':
				$name = $_POST['name'];
				$email = $_POST['email'];
				$website = mysqli_real_escape_string($conn, $_POST['website']);

				if ($name != "" && $email != "") {

					$update_o_sql = "UPDATE `user_o` SET `o_name` = '$name', `o_email` = '$email', `o_website` = '$website' WHERE o_email='$c_email'";
					$update_o_query = mysqli_query($conn, $update_o_sql);

					if ($update_o_query) {
						$_SESSION['email'] = $email;
						header("location:../O?t=u&er=Account details has been updated successfully&erty=success");
					} else {
						header("location:../O?er=Error while processing&erty=danger");
					}
				} else {
					header("location:../O");
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