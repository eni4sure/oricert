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
	$email = $_POST['email'];
	$password = $_POST['password'];
	$type = $_POST['t'];

	if ($email != "" && $password != "" && $type != "") {
		
		$hashed_login_password = md5($password);

		switch ($type) {
			case 'u':
				if (check_if_exist("u", $email)) {
					
					$sql = "SELECT * FROM user_u WHERE u_email = '$email'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					$retrieved_password = $row['u_password'];

					if ($retrieved_password == $hashed_login_password) {

						$_SESSION['email'] = $email;
						$_SESSION['ttt'] = "U";

						header("location:../U");
					} else {
						header("location:../login?t=$type&er=Password Is incorrect&erty=danger");
					}
				} else {
					header("location:../login?t=$type&er=Account details are invalid&erty=danger");
				}
				break;

			case 'o':
				if (check_if_exist("o", $email)) {
					$sql = "SELECT * FROM user_o WHERE o_email = '$email'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					$retrieved_password = $row['o_password'];

					if ($retrieved_password == $hashed_login_password) {

						$_SESSION['email'] = $email;
						$_SESSION['ttt'] = "O";

						header("location:../O");
					} else {
						header("location:../login?t=$type&er=Password Is incorrect&erty=danger");
					}
				} else {
					header("location:../login?t=$type&er=Account details are invalid&erty=danger");
				}
				break;
			
			default:
				header("location:../");
				break;
		}
	} else {
		header("location:../login?t=$type");
	}

?>