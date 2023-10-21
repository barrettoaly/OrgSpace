<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="orgspace";

 
$conn=mysqli_connect('localhost','root','','orgspace');
mysqli_select_db($conn,$db);

$error=''; 

if(isset($_POST['submit'])){

$username= $_POST['username'];
$password= $_POST['password'];
$password = md5($password);
    
    $sql="SELECT * FROM user_registration WHERE username='".$username."' AND user_password='".$password."'";

    $result=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_assoc($result);
        $id = $row['ID'];
        $orgid=$row['OrgID'];
        $position = $row['orgposition'];
        $status=$row['user_status'];
        $_SESSION['ID'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['orgid']=$orgid;

        if($status==0)
        {
          $error="Account not yet confirmed! Please check email for account confirmation";
        }
        else
        {
            header("Location: index_in.php");
            }
    }
    else{
      $error="Incorrect Username or Password!";
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
        <link rel="shortcut icon" href="OrgSpace_LOGO_Final.png" />
    <title>OrgSpace Login</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="login.php" class="sign-in-form" method= "post">
            <h2 class="title">Sign in</h2>
            <div><span style="color: red; text-align: center;"><?php echo $error; ?></span></div>
              <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password"/>
            </div>
            <input type="submit" name="submit" value="Login" class="btn solid" />

            
          </form>
          </div>
         
 
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Sign up to join us!
            </p>
            <button class="btn transparent" id="sign-up-btn" onclick="location.href='registration.php';">
              Sign up
            </button>
          </div>
          <img src="img/login_draw.svg" class="image" alt="" />
        </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
