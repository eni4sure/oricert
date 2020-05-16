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
				$old_password = $_POST['c_pass'];
				$new_password = $_POST['n_pass'];

				if ($old_password != "" && $new_password != "") {
					$hashed_old_password = md5($old_password);
					$hashed_new_password = md5($new_password);

					$sql = "SELECT * FROM user_u WHERE u_email = '$c_email'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					$retrieved_old_password = $row['u_password'];

					if ($hashed_old_password == $retrieved_old_password) {
						$update_u_password = "UPDATE `user_u` SET u_password = '$hashed_new_password' WHERE u_email = '$c_email'";
						$update_query = mysqli_query($conn, $update_u_password);

						if ($update_query) {
							header("location:../U?er=Password has updated successfully&erty=success#Tab2");
						}
					} else {
						header("location:../U?er=Password is Incorrect&erty=danger#Tab2");
					}
				} else {
					header("location:../U");
				}
				break;

			case 'o':
				$old_password = $_POST['c_pass'];
				$new_password = $_POST['n_pass'];

				if ($old_password != "" && $new_password != "") {
					$hashed_old_password = md5($old_password);
					$hashed_new_password = md5($new_password);

					$sql = "SELECT * FROM user_o WHERE o_email = '$c_email'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					$retrieved_old_password = $row['o_password'];

					if ($hashed_old_password == $retrieved_old_password) {
						$update_u_password = "UPDATE `user_o` SET o_password = '$hashed_new_password' WHERE o_email = '$c_email'";
						$update_query = mysqli_query($conn, $update_u_password);

						if ($update_query) {
							header("location:../O?er=Password has updated successfully&erty=success#Tab2");
						}
					} else {
						header("location:../O?er=Password is Incorrect&erty=danger#Tab2");
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