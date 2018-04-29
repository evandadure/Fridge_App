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

    $sql = "SELECT `FOOD_ID` FROM `possesses` WHERE `possesses`.`user_id` = ".$_SESSION["idnumber"];
    $result = mysqli_query($conn,$sql);
    $allMyFood = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $allMyFoodIds = array();
    foreach ($allMyFood as $key => $value) //put all IDs of food that the user possesses in an array (useful later)
      array_push($allMyFoodIds,$value["FOOD_ID"]);

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
      $hasFood = false;
      if(in_array($value["id"], $allMyFoodIds))
        $hasFood = true;
      $currentFood = array();
      array_push($currentFood, $hasFood, $value["id"], $value["food_name"], $value["food_type"]);
      array_push($food[$i],$currentFood);
    }

  }
?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-8">
          <p class="float-right hidden-md-up">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Show my ingredients</button>
          </p>
          <div class="jumbotron" style="background-color: #74b9ff">
            <h1>What's in your fridge ?</h1>
            <p>Check one by one ALL ingredients you own (do not forget the flours, yeasts, spices etc ...). It is very important to learn everything in order to have the best chance of finding a recipe!</p>
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
        </div><!--/span-->

        <div class="col-12 col-md-4 sidebar-offcanvas" id="sidebar">
          <h2>My current ingredients</h2>
          <form class="form-horizontal" action="DB/saveFood.php" method ="POST" style="margin-bottom: 5px">
            <input type="hidden" name="listIngredients" id="listIngredients" value="">
            <button type="submit" name="submitList" class="btn btn-success btn-block">Save my ingredients</button>
          </form>

          <form class="form-horizontal" action="DB/findRecipe.php" method ="POST" style="margin-bottom: 5px">
            <button type="submit" name="findByIngredientsPage" class="btn btn-warning btn-block">Find a recipe</button>
          </form>
<?php 
  if(isset($_SESSION['ingredients_saved'])){
    echo '<div style="color:green">Your list of ingredients has been saved.</div>';
    unset($_SESSION['ingredients_saved']); //destroy the variable to avoid the previous message.
  }

?>
      <ul class="list-group list-group-flush" id="ingredientsListSide">
            <!-- HERE IS THE LIST OF MY CURRENT INGREDIENTS (see 'functions.js')-->
          </ul>
        </div><!--/span-->


      </div><!--/row-->

<?php
  include_once('footer.php');


?>