<?php
session_start();

include 'config.php';

 $error=''; 

if (isset($_POST['save'])) {


    $uname = ($_POST['username']);
    $pass = ($_POST['password']);
    $pass=md5($pass);
    
        $sql = "SELECT * FROM user_admin WHERE admin_Username='$uname' AND admin_Password='$pass'";

        $result = mysqli_query($conn, $sql);
         if(mysqli_num_rows($result)){
            $row= mysqli_fetch_assoc($result);

                $id=$row['admin_ID'];
                $_SESSION['admin_ID'] = $id;
                $_SESSION['admin_Username']=$uname;
                
                header('Location: ../OrgSpace-Admin/orgspaceadmin.php');
                exit();
            }
            else{
                $error="Incorrect Username or Password!";
            }         
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>OrgSpace Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="OrgSpace_LOGO_Final.png" />
</head>
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}


</style>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" > 
                <img src="OrgSpace_LOGO_Final.png" alt="logo" class="center"> 
              </div>
              <div class = "pt-3">
              <h4>Welcome to OrgSpace Admin</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <span style="color: red;"><?php echo $error; ?></span>
            </div>
              <form class="pt-3" action="#" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" id="Username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="Password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="save" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >LOG IN</button>
                </div>
                <!--<div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>-->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
