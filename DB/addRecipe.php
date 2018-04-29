<?php

if(isset($_POST['addIngredients'])) {
	include_once 'db.php';
	session_start();

	$listFood = mysqli_real_escape_string($conn,$_POST['listIngredients']);//List of all ingredients in the hidden input (separated by "'")
	$nameRecipe = mysqli_real_escape_string($conn,$_POST['inputNameRecipe']);
	$typeRecipe = mysqli_real_escape_string($conn,$_POST['inputTypeRecipe']);
	$prepTimeRecipe = mysqli_real_escape_string($conn,$_POST['inputPrepTime']);
	$cookTimeRecipe = mysqli_real_escape_string($conn,$_POST['inputCookTime']);
	$descriptionRecipe = mysqli_real_escape_string($conn,$_POST['inputDescription']);


//LISTING OF DIFFERENT ERRORS (empty fields, letters in integer fields...)
	if(empty($listFood)){
		header("Location: ../add_recipe.php?error=noingredients");
		exit();
	}elseif(empty($nameRecipe)){
		header("Location: ../add_recipe.php?error=noname");
		exit();
	}elseif(empty($descriptionRecipe)){
		header("Location: ../add_recipe.php?error=nodescription");
		exit();
	}elseif(!preg_match("/^[0-9]*$/", $prepTimeRecipe)){
		header("Location: ../add_recipe.php?error=wrongprep");
		exit();
	}elseif(!preg_match("/^[0-9]*$/", $cookTimeRecipe)){
		header("Location: ../add_recipe.php?error=wrongcook");
		exit();
	}else{ //IF EVERY FIELD IS OK
		$listFood = substr($listFood,1);//to remove the first "'"
		$listFood = explode(',',$listFood);//to change this string to an array
		$sql = "INSERT INTO recipe (recipe_name,recipe_description,recipe_type,recipe_prep_time,recipe_cook_time) VALUES ('$nameRecipe','$descriptionRecipe','$typeRecipe','$prepTimeRecipe','$cookTimeRecipe');";
		mysqli_query($conn,$sql); //the new recipe is sent to the database
	    $sql = "SELECT max(id) FROM recipe"; //the ID of this new recipe is put in 'idLastRecipe' variable
   		$result = mysqli_query($conn,$sql);
   		$idLastRecipe = mysqli_fetch_all($result,MYSQLI_ASSOC); 
   		$idLastRecipe = $idLastRecipe[0]["max(id)"]; //I insert all the ingredients IDs in the table 'involves'
		foreach ($listFood as $key => $value) {
			$sql = "INSERT INTO involves (food_id,recipe_id) VALUES ('$value','$idLastRecipe');";
			mysqli_query($conn,$sql);
		}
		header("Location: ../recipe.php?recipe=".$idLastRecipe); //Redirection to the recipe's page directly
		exit();
	}

}else{
	header("Location: ../404.php");
	exit();
}