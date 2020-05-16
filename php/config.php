<?php error_reporting(0); ?>
<?php
	
	$servername	= "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "oricert";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		// echo "Connected successfully";
	}

	function check_error_msg(){

		if (isset($_GET['er']) && isset($_GET['erty'])){
			$error = strtoupper($_GET['er']);
			$error_type = $_GET['erty'];
			echo '<div class="alert alert-'.$error_type.' text-center"><strong>'.$error.'</strong></div>';
		} else {
			$error = ""; $error_type = "";
		}
	}

	function check_if_exist ($type, $email){

		$conn = $GLOBALS['conn'];
		// 1 = teacher, 2 = student, 3 = parent

		switch ($type) {
			case 'u':
				$sql = "SELECT * FROM user_u WHERE u_email='$email'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 1) {
					return true;
				} else {
					return false;
				}
				break;

			case 'o':
				$sql = "SELECT * FROM user_o WHERE o_email='$email'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 1) {
					return true;
				} else {
					return false;
				}
				break;

			default:
				return false;
				break;
		}
	}
?>