<?php

if(isset($_POST['submitList'])) {
	include_once 'db.php';
	session_start();

	$listFood = mysqli_real_escape_string($conn,$_POST['listIngredients']);//List of all ingredients in the hidden input (separated by "'")
	if(!empty($listFood)){
		$listFood = substr($listFood,1);//to remove the first "'"
		$listFood = explode(',',$listFood);//to change this string to an array
		$userId = $_SESSION['idnumber'];
//First, all the ingredients possessed by the user are deleted. Then all the ingredients in the "$listFood" list are added :		
		$sql= "DELETE FROM `possesses` WHERE user_id =".$_SESSION['idnumber'];
		$result = mysqli_query($conn,$sql);
		foreach ($listFood as $key => $value) {
			$sql = "INSERT INTO possesses (food_id,user_id) VALUES ('$value','$userId');";
			mysqli_query($conn,$sql);
		}
		$_SESSION['ingredients_saved'] = true;
		header("Location: ../ingredients.php");
		exit();
	}else{ //in case listFood is empty, it means that the user just deleted all his current ingredients. So they are all deleted from the DB
		$sql= "DELETE FROM `possesses` WHERE user_id =".$_SESSION['idnumber'];
		$result = mysqli_query($conn,$sql);
		header("Location: ../ingredients.php");
		exit();
	}
}else{
	header("Location: ../404.php");
	exit();
}