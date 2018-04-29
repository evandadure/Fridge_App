<?php

//a simple signout code to destroy the session variable and redirect to the index.
if (isset($_POST['submitLogout'])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php");
	exit();
}