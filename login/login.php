<?php 

$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "orgspace";

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user_registration WHERE username='$username' AND user_password='$password'";

	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: ../../index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>OrgSpace Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          </div>
         
 
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/login_draw.svg" class="image" alt="" />
        </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
