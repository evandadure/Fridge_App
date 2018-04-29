<?php
  
  include_once('header.php');

  if (!isset($_SESSION['u_id']))
  {
    header("Location: signin.php");
    exit();
  }else{

    if(isset($_GET['recipe']))
    {
      $idRecipe = $_GET['recipe'];
      $sql = "SELECT * FROM recipe WHERE id=".$idRecipe; //I select all the recipes
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result); //if the id in the URL doesnt correspond to any recipe ID, the user is redirected to the 404
      if ($resultCheck<1) {
        header("Location: 404.php");
        exit();
      }
      $recipe = mysqli_fetch_all($result,MYSQLI_ASSOC)[0];


      $sql = "SELECT * FROM involves WHERE recipe_id=".$idRecipe; //I get all the ingredients involved in the recipe
      $result = mysqli_query($conn,$sql);
      $ingredients = mysqli_fetch_all($result,MYSQLI_ASSOC);

      $listIngredients = array();

      foreach ($ingredients as $key => $value) {
        $sql = "SELECT * FROM food WHERE id=".$value["food_id"]; //I get all the ingredients involved in the recipe
        $result = mysqli_query($conn,$sql);
        $ingredients = mysqli_fetch_assoc($result);
        array_push($listIngredients,$ingredients["food_name"]);
      }
      $recipe["ingredients"] = $listIngredients;


    }else{
      header("Location: 404.php");
      exit();
    }
  }
?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-8">
          <p class="float-right hidden-md-up">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Show my ingredients</button>
          </p>
          <div class="jumbotron" style="background-color: #7efff5">
            <h1><?php echo $recipe['recipe_name'];?></h1>
            <p><?php echo $recipe['recipe_description'];?></p>
          </div>
          <h4>Type of meal : <span style="color:blue"> <?php echo $recipe['recipe_type'];?></span></h4>
          <h4>Preparation time : <span style="color:green"> <?php echo $recipe['recipe_prep_time'];?></span> minutes</h4>
          <h4>Cooking time : <span style="color:green"> <?php echo $recipe['recipe_cook_time'];?></span> minutes</h4>

          <h2>List of ingredients :</h2>
          <ul class="list-group">
<?php
  foreach($recipe['ingredients'] as $key => $value)
    echo '<li class="list-group-item">'.$value.'</li>'
?> 
          </ul>




<?php
  include_once('footer.php');


?>