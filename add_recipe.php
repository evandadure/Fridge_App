<?php
  
  include_once('header.php');
  if (!isset($_SESSION['u_id']))
  {
    header("Location: signin.php");
    exit();
  }else{
    $sql = "SELECT * FROM food ORDER BY food_type,food_name";
    $result = mysqli_query($conn,$sql);
    $allFood = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $food = array();
    $i = -1;
    $foodType = "";
    foreach ($allFood as $key => $value) {
      if($foodType != $value["food_type"]){ //change the type of food when it's a different one
        $foodType = $value["food_type"];
        $currentType = array();
        array_push($food, $currentType);
        $i++;
      }
      $currentFood = array();
      array_push($currentFood, false, $value["id"], $value["food_name"], $value["food_type"]);
      array_push($food[$i],$currentFood);
    }

  }
?>
 <div class="container">


<div class="col-12 col-md-8">
	<h2>Add your own recipe to our database !</h2>
<?php
	if(isset($_GET['result']))
	{
		if($_GET['result'] == 'success')
			echo '<label style="color:green">Your recipe is now part of Fridgee !</label>';
	}
?>
<form action="DB/addRecipe.php" method ="POST">
  <div class="form-group">
    <label for="inputNameRecipe">Name of your recipe</label>
    <input type="text" class="form-control" id="inputNameRecipe" name="inputNameRecipe" placeholder="Ex : Chicken salad...">
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'noname')
			echo '<label for="inputNameRecipe" style="color:red">Please choose a name for this recipe.</label>';
	}
?>
  </div>
  <div class="form-group">
    <label for="inputTypeRecipe">Type of meal</label>
    <select class="form-control" id="inputTypeRecipe" name="inputTypeRecipe">
        <option value="starter">Starter</option>
        <option value="main-course">Main course</option>
        <option value="dessert">Dessert</option>
    </select>
  </div>
  <div class="form-group form-inline">
    <label for="inputPrepTime">Preparation time : </label>
    <input type="text" class="form-control col-1" id="inputPrepTime" name="inputPrepTime" style="margin: 5px">
    <label for="inputPrepTime">minutes</label>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'wrongprep')
			echo '<label for="inputPrepTime" style="color:red">Please put a number in this field.</label>';
	}
?>
  </div>
  <div class="form-group form-inline">
    <label for="inputCookTime">Cooking time : </label>
    <input type="text" class="form-control col-1" id="inputCookTime" name="inputCookTime" style="margin: 5px">
    <label for="inputCookTime">minutes</label>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'wrongcook')
			echo '<label for="inputCookTime" style="color:red">Please put a number in this field.</label>';
	}
?>
  </div>
  <div class="form-group">
    <label for="inputDescription">Description of your recipe</label>
    <textarea class="form-control" id="inputDescription" name="inputDescription" rows="3" placeholder="Ex : This stunning seafood starter is guaranteed to impress at any dinner party - layer with beetroot, orange and tangy horseradish cream"></textarea>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'nodescription')
			echo '<label for="inputDescription" style="color:red">Please choose a description for your recipe.</label>';
	}
?>
  </div>
  <div class="form-group">
    <label>Check all ingredients needed for this recipe. <p style="font-weight: bold;">Don't forget "obvious" things like salt, olive oil...</p></label>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 'noingredients')
			echo '<label style="color:red">Please choose at least one ingredient for your recipe.</label>';
	}
?>
   </div>
          <div class="row">

          
<!-- Essentials -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseEssentials" aria-expanded="false" aria-controls="collapseEssentials">     
                  Essentials
                </button>
                <div class="collapse" id="collapseEssentials">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[3] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Vegetables -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseVegetables" aria-expanded="false" aria-controls="collapseVegetables">     
                  Vegetables
                </button>
                <div class="collapse" id="collapseVegetables">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[13] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked="checked"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Fruits -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseFruits" aria-expanded="false" aria-controls="collapseFruits">     
                  Fruits
                </button>
                <div class="collapse" id="collapseFruits">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[6] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Meats -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseMeats" aria-expanded="false" aria-controls="collapseMeats">     
                  Meats
                </button>
                <div class="collapse" id="collapseMeats">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[8] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Fishes -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseFishes" aria-expanded="false" aria-controls="collapseFishes">     
                  Fishes
                </button>
                <div class="collapse" id="collapseFishes">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[5] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Dairies -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseDairies" aria-expanded="false" aria-controls="collapseDairies">     
                  Dairies
                </button>
                <div class="collapse" id="collapseDairies">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[2] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Cereals -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseCereals" aria-expanded="false" aria-controls="collapseCereals">     
                  Cereals
                </button>
                <div class="collapse" id="collapseCereals">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[9] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Spices -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseSpices" aria-expanded="false" aria-controls="collapseSpices">     
                  Spices
                </button>
                <div class="collapse" id="collapseSpices">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[10] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Alcohols -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseAlcohols" aria-expanded="false" aria-controls="collapseAlcohols">     
                  Alcohols
                </button>
                <div class="collapse" id="collapseAlcohols">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[0] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Fat -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b ;" type="button" data-toggle="collapse" data-target="#collapseFat" aria-expanded="false" aria-controls="collapseFat">     
                  Fat
                </button>
                <div class="collapse" id="collapseFat">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[4] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Sweet -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseSweet" aria-expanded="false" aria-controls="collapseSweet">     
                  Sweet
                </button>
                <div class="collapse" id="collapseSweet">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[11] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Herbs -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseHerbs" aria-expanded="false" aria-controls="collapseHerbs">     
                  Herbs
                </button>
                <div class="collapse" id="collapseHerbs">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[7] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Condiments -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #34495e; border-color: #34495e;" type="button" data-toggle="collapse" data-target="#collapseCondiments" aria-expanded="false" aria-controls="collapseCondiments">     
                  Condiments
                </button>
                <div class="collapse" id="collapseCondiments">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[1] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>


<!-- Various -->
              <div class="col-12 col-lg-6 btnFood">
                <button class="btn btn-primary btn-block" style="background-color: #c0392b; border-color: #c0392b;" type="button" data-toggle="collapse" data-target="#collapseVarious" aria-expanded="false" aria-controls="collapseVarious">     
                  Various
                </button>
                <div class="collapse" id="collapseVarious">
                  <div class="card card-body"  style="margin-left: 40px">
<?php
  foreach($food[12] as $key => $value){
    if($value[0])
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'" checked><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>');
    else
      echo('<div class="form-check"><input type="checkbox" value="'.$value[2].'_'.$value[1].'" onchange="updateList()" class="form-check-input" id="exampleCheck'.$value[1].'"><label class="form-check-label" for="exampleCheck'.$value[1].'">'.$value[2].'</label></div>'); 
  }?>
                  </div>
                </div>
              </div>
          </div><!--/row-->
  	<input type="hidden" name="listIngredients" id="listIngredients" value="">
  	<button type="submit" name="addIngredients" class="btn btn-primary">Submit my recipe</button>
</form>



</div>


<?php
  include_once('footer.php');


?>
