<?php 
session_start();
include 'db.php';

unset($_SESSION["recipesToShow"]);	

//GET ALL RECIPES
$sql = "SELECT * FROM recipe ORDER BY recipe_name";
$result = mysqli_query($conn,$sql);
$allRecipes = mysqli_fetch_all($result,MYSQLI_ASSOC);


// GET ALL MY INGREDIENTS IDs
$sql = "SELECT `FOOD_ID` FROM `possesses` WHERE `possesses`.`user_id` = ".$_SESSION["idnumber"];
$result = mysqli_query($conn,$sql);
$allMyFood = mysqli_fetch_all($result,MYSQLI_ASSOC);
$allMyFoodIds = array();
foreach ($allMyFood as $key => $value) {
	array_push($allMyFoodIds, $value["FOOD_ID"]);
}

//GET ALL INGREDIENTS IDs FROM ALL RECIPES
$sql = "SELECT * FROM `involves` ORDER BY `recipe_id`";
$result = mysqli_query($conn,$sql);
$allRecipesIngredients = mysqli_fetch_all($result,MYSQLI_ASSOC);
$idRecipe = 0;
$currentRecipe = array();
$listRecipes = array();

foreach ($allRecipesIngredients as $key => $value) {
	if($value["recipe_id"] != $idRecipe){
		if(!empty($currentRecipe)){
			$listRecipes[$idRecipe] = $currentRecipe;	//ADDING THE CURRENT RECIPE IN THE listRecipes ARRAY
		}
		$currentRecipe = array();
		while($value["recipe_id"] != $idRecipe){ //in case there is some IDs of recipe that have no recipe associated (recipe deleted)
			$idRecipe++;
		}
	}
	array_push($currentRecipe, $value["food_id"]);
}
if(!empty($currentRecipe))
	$listRecipes[$value["recipe_id"]] = $currentRecipe;//TO ADD THE LAST RECIPE IN THE listRecipes ARRAY

//I PUT THE RECIPES THAT I CAN DO WITH MY LIST OF INGREDIENTS IN ANOTHER ARRAY
$myDoableRecipes = array();
foreach ($listRecipes as $k => $v) {
	$ingredientsPossessed = true;
	foreach ($v as $key => $value) {
		if(!in_array($value, $allMyFoodIds))
			$ingredientsPossessed = false;
	}
	if($ingredientsPossessed == true)
		// $myDoableRecipes[$k] = $v; //$k = id of the recipe, $v = array containing all IDs of different ingredients of the recipe
		array_push($myDoableRecipes,$k); //myDoableRecipes : array containing all IDs of doable recipes with my current ingredients
}

$_SESSION["recipesToShow"] = array(); //creating an array that will contains informations about the recipes shown, depending on the criterias (with ingredients, maximum cook time, etc)
if (isset($_POST['findByIngredientsPage'])) { //if the user is coming from the page "my ingredients"
	foreach ($allRecipes as $key => $value) {
		if(in_array($value["id"], $myDoableRecipes))
			array_push($_SESSION["recipesToShow"], $value);
	}
    header("Location: ../find_recipe.php");
    exit(); 
}elseif(isset($_POST['findByRecipePage'])) { //if the user is using the form from the page "find a recipe" and its criterias directly


	$searched_type_recipe = mysqli_real_escape_string($conn,$_POST['inputSelectRecipeType']);
	$searched_time_recipe = mysqli_real_escape_string($conn,$_POST['inputSelectTime']);
	if(isset($_POST['nameRecipe']))
		$searched_name_recipe = strtolower(mysqli_real_escape_string($conn,$_POST['nameRecipe'])); //if this input is checked, the previous variable is equal to "on"
	else
		$searched_name_recipe ="";//if this input is unchecked, the previous variable is equal to "off"

	if(isset($_POST['myIngredientsCheck']))
		$is_using_ingredients = mysqli_real_escape_string($conn,$_POST['myIngredientsCheck']); //if this input is checked, the previous variable is equal to "on"
	else
		$is_using_ingredients ="off";//if this input is unchecked, the previous variable is equal to "off"


	$recipesToShow = array();
	foreach ($allRecipes as $key => $value) { //for each recipe, I check if the name, type, time and using of ingredients corresponds
		$totalTime = $value["recipe_prep_time"]+$value["recipe_cook_time"];
		$nameRecipe = strtolower($value["recipe_name"]);

		if($totalTime<=$searched_time_recipe){ //if the recipe is short enough
			if($value["recipe_type"] == $searched_type_recipe || $searched_type_recipe == "Type"){ //if the type is good (or if no type is specified)
				if(!empty($searched_name_recipe)){ //if the user put something in the search input
					if(is_int(strpos($nameRecipe, $searched_name_recipe))) //if this input is in the name of the current recipe
						array_push($recipesToShow, $value);
				}else{
					array_push($recipesToShow, $value);
				}
			}
		}	
	}
	if($is_using_ingredients == "on"){ //selection of only the recipes that contain the ingredients of the current user
		foreach ($recipesToShow as $key => $value) {
			if(in_array($value["id"], $myDoableRecipes))
				array_push($_SESSION["recipesToShow"], $value);
		}
	}else{ 
		$_SESSION["recipesToShow"] = $recipesToShow;
	}


    header("Location: ../find_recipe.php");
    exit(); 

}else{
	header("Location: ../404.php");
	exit();
}