<?php
  include_once('header.php');
  try {
      if (isset($_GET['login'])) {//try if a connexion has been made by looking the URL
          if ($_GET['login'] == 'success' && isset($_SESSION['u_id'])) {
              
          }
          elseif ($_GET['login'] == 'empty') {
              $emptySigninInfos = true;
              // echo "Please fill all the fields";
          }
          elseif ($_GET['login'] == 'errorauth') {
              // echo "invalid username or password";
              $badSigninInfos = true;
              // if( isset($_GET['id']) && $_GET['id']=="a"){
              //   echo "<br> get ok";
              // }
          }else{
            header("Location: 404.php");
            exit(); 
          }
      }
      if (isset($_GET['signup'])) {
          if ($_GET['signup'] == 'empty') {
              $emptySignupInfos = true;
              // echo "Please fill all the fields";
          }elseif ($_GET['signup'] == 'invalidinput') {
              // echo "invalid username or password";
              $badSignupInfos = true;
              // if( isset($_GET['id']) && $_GET['id']=="a"){
              //   echo "<br> get ok";
              // }
          }elseif ($_GET['signup'] == 'usertaken') {
              // echo "invalid username or password";
              $userTaken = true;
              // if( isset($_GET['id']) && $_GET['id']=="a"){
              //   echo "<br> get ok";
              // }
          }else{
            header("Location: 404.php");
            exit(); 
          }
      }      
  }
  catch(Exception $e) {
      echo '<br>Erreur : ' . $e->getMessage();
  }

?>

<div class="container">
  <div class="row">
  	<div class="col-md-6">



<!-- <form action="includes/login.php" method ="POST">
  <input type="text" name="uid" placeholder="User ID">
  <input type="password" name="pwd" placeholder="password">
  <button type="submit" name="submit">submit</button>
</form> -->


<div class="main-login main-center">
          <form class="form-horizontal" action="DB/signin.php" method ="POST">

            <h2>Please sign in here</h2>
            
            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="uid" id="uid"  placeholder="Enter your Username"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>
<?php
if (isset($emptySigninInfos))
  echo '<div style="color:red">Please fill all the fields to sign in.</div>';
if (isset($badSigninInfos))
  echo '<div style="color:red">Invalid Username or Password.</div>';
?>
            <div class="form-group ">
              <button type="submit" name="submitLogin" class="btn btn-success btn-lg btn-block login-button">Sign in</button>
            </div>
        </div>
      </form>


  </div>

  <div class="col-6">



<!-- <form action="includes/login.php" method ="POST">
  <input type="text" name="uid" placeholder="User ID">
  <input type="password" name="pwd" placeholder="password">
  <button type="submit" name="submit">submit</button>
</form> -->


<div class="main-login main-center">
          <form class="form-horizontal" action="DB/signup.php" method ="POST">

            <h2>Or sign up here if you don't have an account</h2>
            
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Your Name</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Name"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="uid" id="uid"  placeholder="Enter your Username"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="pwd" id="pwd"  placeholder="Enter your Password"/>
                </div>
              </div>
            </div>
<?php
if (isset($emptySignupInfos))
  echo '<div style="color:red">Please fill all the fields to sign up.</div>';
if (isset($badSignupInfos))
  echo '<div style="color:red">Only letters and white spaces allowed for the Name.</br>Only letters allowed for the Username.</div>';
if (isset($userTaken))
  echo '<div style="color:red">This Username is already taken.</div>';
?>
            <div class="form-group ">
              <button type="submit" name="submitSignup" class="btn btn-primary btn-lg btn-block login-button">Sign up</button>
            </div>
        </div>
      </form>

    </div>
  </div>

    <?php
  include_once('footer.php');


?>
