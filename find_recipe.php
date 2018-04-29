<?php
  include_once('header.php');
  if (!isset($_SESSION['u_id']))
  {
    header("Location: signin.php");
    exit();
  }else{
    $sql = "SELECT * FROM recipe ORDER BY recipe_name";
    $result = mysqli_query($conn,$sql);
    $allRecipes = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if(isset($_SESSION["recipesToShow"]))
      $recipesToShow = $_SESSION["recipesToShow"];
    else
      $recipesToShow = $allRecipes;
  }

?>


    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-12">
          <div class="jumbotron" style="background-color: #f3a683">
            <h1>Our recipes</h1>
            <p>This is where you will find the list of our recipes. You can search by name, by type of recipe, by preparation time, and choose, if you are connected, to use only your ingredients.</p>
          </div>


          <div class="row">

            <div class="col-md-12">

            <form action="DB/findRecipe.php" method ="POST">
                <!-- <div class="input-group col-12 col-md-12"> -->
              <input class="form-control col-12 col-md-12" type="text" name="nameRecipe" id="nameRecipe" placeholder="Search a recipe">
                  <select class="custom-select" id="inputSelectRecipeType" name="inputSelectRecipeType">
                    <option selected>Type</option>
                    <option value="starter">Starter</option>
                    <option value="main-course">Main course</option>
                    <option value="dessert">Dessert</option>
                  </select>
                  <select class="custom-select" id="inputSelectTime" name="inputSelectTime">
                    <option selected value="5000">Maximum time</option>
                    <option value="10">< 10 minutes</option>
                    <option value="20">< 20 minutes</option>
                    <option value="30">< 30 minutes</option>
                    <option value="40">< 40 minutes</option>
                    <option value="50">< 50 minutes</option>
                    <option value="60">< 60 minutes</option>
                    <option value="70">< 70 minutes</option>
                    <option value="80">< 80 minutes</option>
                    <option value="90">< 90 minutes</option>
                  </select>
                  <div class="form-check" style="margin-left: 25px">
                    <input type="checkbox" class="form-check-input" name="myIngredientsCheck" id="myIngredientsCheck">
                    <label class="form-check-label" for="myIngredientsCheck">Use only my ingredients</label>
                  </div>
                  <div class="input-group-append">
                    <button type="submit" name="findByRecipePage"  class="btn btn-primary" type="button">Search a recipe</button>
                  </div>
                <!-- </div> -->
                
              </form>

              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Recipe name</th>
                      <th>Type</th>
                      <th>Preparation time</th>
                      <th>Cooking time</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
  foreach ($recipesToShow as $key => $value) {
    echo '<tr>
            <td><a href="recipe.php?recipe='.$value["id"].'">'.$value["recipe_name"].'</a></td>
            <td>'.$value["recipe_type"].'</td>
            <td>'.$value["recipe_prep_time"].' min</td>
            <td>'.$value["recipe_cook_time"].' min</td>
            <td>'.$value["recipe_description"].'</td>
          </tr>';
  }

?><!-- 
                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>Otto</td>
                      <td>Otto</td>
                    </tr> -->

                  </tbody>
                </table>
              </div>


            </div>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

<?php
  include_once('footer.php');


?>
