<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:index.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />

    <!-- Style -->
    <link rel="stylesheet" href="style.css">

    <title>Blog</title>
  </head>
  <body>
 <div class="content" style="background-color:#FFFBF2;">
    <div class="container">
      <div class="row vh-100 d-flex align-items-center justify-content-center">
        <div class="col-md-6 h-100">
          <img src="./assets/img/img.png" alt="Image" class="img-responsive h-100 p-5">
        </div>
        <div class="col-md-6">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Connexion:</h3>
            </div>
            <form action="./controllers/login.php" method="post">
              <div class="form-group first">
                <label for="username">Email:</label>
                <input name="email" type="text" class="Regular shadow success
                form-control success" id="username">

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password:</label>
                <input name="password" type="password" class="Regular shadow success
                 form-control success" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="login" value="Connectez" class="btn Regular shadow"style="background-color:#ABEE94;">
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>





  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>