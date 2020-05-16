<?php session_start(); ?>
<?php error_reporting(0); ?>
<?php
	if (isset($_SESSION['email']) && isset($_SESSION['ttt'])) {
		$ttt = $_SESSION["ttt"];
		if ($_SESSION['ttt'] == "U") {
			$c_email = $_SESSION['email'];
		} else {
			header("location:../$ttt");
		}
	} else {
		header("location:../");
	}
?>
<?php require 'config.php'; ?>
<?php
	$name = $_POST['fullname'];
	$programme = $_POST['programme'];
	$serial_no = $_POST['serial_no'];
	$reg_no = $_POST['reg_no'];
	$cert_class = $_POST['cert_class'];
	$gender = $_POST['gender'];
	$grad_year = $_POST['grad_year'];

	if ($name != "" && $programme != "" && $serial_no != "" && $reg_no != "" && $cert_class != "" && $gender != "" && $grad_year != "" ) {
		
		$cert_imgname = "".$name." ".$programme." certificate ".$serial_no."";
		$cert_image_name = strtolower(str_replace(" ", "_", $cert_imgname));

		$cert_upload_dir = "../certs/";
		$cert_info = $_FILES["c_im"]["name"];
		$file_extension = strtolower(pathinfo($cert_info, PATHINFO_EXTENSION));

		$cert_filename = "".$cert_image_name.".".$file_extension."";

		$target_file = $cert_upload_dir . basename($cert_filename);

		// Check file size
		if ($_FILES["c_im"]["size"] > 5000000) {

			header("location:../U?er=The file is too large to upload&erty=danger#Tab3");
		} else {

			// Allow certain file formats
			if( $file_extension != "jpg") {

				header("location:../U?er=Please Upload format must be a jpg&erty=danger#Tab3");
			} else {

				// if everything is ok, try to upload file
				if (move_uploaded_file($_FILES["c_im"]["tmp_name"], $target_file)) {

					$get_details_sql = "SELECT * FROM `user_u` WHERE u_email = '$c_email'";
					$get_details_query = mysqli_query($conn, $get_details_sql);
					$get_details_row = mysqli_fetch_array($get_details_query);

					$u_id = $get_details_row['u_id'];

					$insert_cert = "INSERT INTO `certificates` (`c_name`, `c_programme`, `c_institution`, `c_serial_no`, `c_reg_no`, `c_class`, `c_gender`, `c_grad_year`, `c_image_name`)
						VALUES ('$name', '$programme', '$u_id', '$serial_no', '$reg_no', '$cert_class', '$gender', '$grad_year', '$cert_filename')";
					$insert_cert_code = mysqli_query($conn, $insert_cert);
					if ($insert_cert_code) {

						header("location:../U?er=certificate uploaded successfully&erty=success#Tab3");
					} else {

						header("location:../U?er=Error while processing Request&erty=danger#Tab3");
					}
				} else {
					header("location:../U?er=Error while uploading certificate. Try again Later&erty=danger#Tab3");
				}
			}
		}
	} else {
		header("location:../");
	}
?>