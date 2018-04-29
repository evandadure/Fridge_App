<?php

if(isset($_POST['submitSignup'])) {
	include_once 'db.php';

	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
	$uid = mysqli_real_escape_string($conn,$_POST['uid']);


	//Error handlers
	//Check for empty fields
	if(empty($username) || empty($pwd) || empty($uid)){
		header("Location: ../signin.php?signup=empty");
		exit();
	}else{
		//Check if input characters are valid
		if(!preg_match("/^[a-zA-Z ]*$/", $username) || !preg_match("/^[a-zA-Z]*$/", $uid)){
			header("Location: ../signin.php?signup=invalidinput");
			exit();
		}else{
			$sql = "SELECT * FROM user WHERE user_identifier='$uid'";
			$result = mysqli_query($conn,$sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck > 0){ //if the username already exists, resultCheck should contain something !
				header("Location: ../signin.php?signup=usertaken");
				exit();
			}else{
				$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //hashing
				$sql = "INSERT INTO user (user_identifier,user_password,user_name) VALUES ('$uid','$hashedPwd','$username');";
				mysqli_query($conn,$sql);
				$sql = "SELECT id FROM `user` WHERE `user_identifier` = '".$uid."'";
				$idUser = mysqli_query($conn,$sql);
    			$idUser = mysqli_fetch_all($idUser,MYSQLI_ASSOC);
    			$idUser = $idUser[0]["id"];
				session_start();
				$_SESSION['u_id'] = $uid;
				$_SESSION['username'] = $username;
				$_SESSION['idnumber'] = $idUser;
				header("Location: ../index.php");
				exit();
			}
		}
	}
}else{
	header("Location: ../404.php");
	exit();
}