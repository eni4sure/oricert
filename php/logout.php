<?php
	session_start();
	
	$_SESSION['email'] = false;
	$_SESSION['ttt'] = false;

	session_unset();
	session_destroy();

	header("location:../");
?>