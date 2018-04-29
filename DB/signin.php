<?php 
session_start();
if (isset($_POST['submitLogin'])) {
	include 'db.php';
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

	//Error handlers
	//check if inputs are empty
	if(empty($uid)||empty($pwd)){
		header("Location: ../signin.php?login=empty");
	}else {
		$sql = "SELECT * FROM user WHERE user_identifier='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck<1) {
			header("Location: ../signin.php?login=errorauth");
			exit();
		}else {
			if ($rows = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $rows['user_password']);
				if($hashedPwdCheck == false){
					header("Location: ../signin.php?login=errorauth");
					exit();
				}elseif ($hashedPwdCheck == true){
					//Log in the user here 
					$_SESSION['idnumber'] = $rows['id'];
					$_SESSION['u_id'] = $rows['user_identifier'];
					$_SESSION['username'] = $rows['user_name'];
					header("Location: ../index.php");
					exit();
				}
			}
		}
	}
}else{
	header("Location: ../404.php");
	exit();
}