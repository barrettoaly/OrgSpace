<?php
session_start();
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "orgspace";



try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}


if(isset($_POST['submit'])){

    
    $file = $_FILES['file'];

    $num_of_imgs = count($file['name']); //Number of images

    for ($i=0; $i < $num_of_imgs; $i++) { 
      
      
      $image_name = $file['name'][$i];
      $tmp_name   = $file['tmp_name'][$i];        //get the image info and store them in var
      $error      = $file['error'][$i];

                                                  //if there is not error occurred while uploading
      if ($error === 0) {
        
        
        $img_ex = pathinfo($image_name, PATHINFO_EXTENSION); //get image extension store it in var

      $img_ex_lc = strtolower($img_ex); //convert the image extension into lower case and store it in var 
        
      $allowed_exs = array('jpg', 'jpeg', 'png'); // crating array that stores allowed to upload image extensions.

      /* 
      check if the the image extension 
      is present in $allowed_exs array
      **/

      if (in_array($img_ex_lc, $allowed_exs)) {
        
        $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc; //renaming the imgs
                
                //creating upload path on root directory
                $img_upload_path = 'uploads/'.$new_img_name;

               //inserting imge name into database
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $user_email = $_POST['user_email'];
                $gender = $_POST['gender'];
                $course = $_POST['course'];
                $course_year = $_POST['course_year'];
                $studentorgofficer = $_POST['whatareyou'];
                $orgname = $_POST['orgname'];
                $orgposition = $_POST['orgposition'];
                $username = $_POST['username'];
                $user_password = $_POST['password'];
                $user_password = md5($user_password);


                $sql = "INSERT INTO user_registration(first_name, last_name, email_add, gender, course, course_year, studentorgofficer, OrgID, orgposition, username, user_password, form_and_id, user_status) 
                VALUES ('$first_name', '$last_name', '$user_email', '$gender', '$course','$course_year', '$studentorgofficer','$orgname','$orgposition','$username','$user_password', ?, 0)";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_img_name]);

                //move uploaded image to 'uploads' folder
                move_uploaded_file($tmp_name, $img_upload_path);

                //redirect to 'login.php'
                
                header("Location:login.php");
                      
              

            

      }else {
        # error message
            $em = "You can't upload files of this type";

          /*
          redirect to 'registration.php' and 
          passing the error message
            */

              header("Location: registration.php?error=$em");
      }

   
      }else {
        # error message
        $em = "Unknown Error Occurred while uploading";

        /*
        redirect to 'registration.php' and 
        passing the error message
          */

          header("Location: registration.php?error=$em");
      }
    } 
}


?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="regstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="shortcut icon" href="OrgSpace_LOGO_Final.png" />
     <title>OrgSpace Register</title>
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <label class="details">First Name<span aria-hidden="true" style = "color:red">*</span> </label> 
            <input type="text" name="first_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
          </div>
           <div class="input-box">
            <label class="details">Last Name <span aria-hidden="true" style = "color:red">*</span></label>
            <input type="text" name="last_name" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required>
          </div>
           <div class="input-box">
            <label class="details">Email Address<span aria-hidden="true" style = "color:red">*</span></label>
            <input type="email" name="user_email" required>
          </div>
            <div class="input-box">
             <label class="details">Course <span aria-hidden="true" style = "color:red">*</span> </label>
             <div class="select">
                              <select name="course">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>BA Communications</option>
                                            <option>BA Economics</option>
                                            <option>BA English Language Studies</option>
                                            <option>BA Interdisciplinary Studies</option>
                                            <option>BA International Studies</option>
                                            <option>BA Philosophy</option>
                                            <option>BS Psychology</option>
                                            <option>BS in Nursing</option>
                                            <option>BS Bio Medical Engineering</option>
                                            <option>BS Computer Science</option>
                                            <option>BS Computer Engineering</option>
                                            <option>BS Electronics Communication Engineering</option>
                                            <option>BS Information Technology</option>
                                            <option>BS New Media & Computer Animation</option>
                                            <option>Associate in Electronics Engineering Technology</option>
                                            <option>BS Electronics Communication Engineering</option>
                                            <option>BS Biology</option>
                                            <option>BS Mathematics</option>
                                            <option>BS Statistics</option>
                                            <option>Bachelor of Elementary Education</option>
                                            <option>Bachelor Early Childhood Education</option>
                                            <option>Bachelor of Physical Education</option>
                                            <option>Bachelor of Secondary Education</option>
                                            <option>BS Management Accounting</option>
                                            <option>BS Accountancy</option>
                                            <option>BS Business Administration</option>
                                            <option>BS Office Administration</option>
                                            <option>BS Internal Auditing</option>
                                          
                               </select>
                         </div>
          </div>
          <div class="input-box">
            <label class="details" required> Year <span aria-hidden="true" style = "color:red">*</span> </label>
            <div class="select">
            <select name="course_year">
                                         
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>1st Year</option>
                                            <option>2nd Year</option>
                                            <option>3rd Year</option>
                                            <option>4th Year</option>
                                            <option>5th Year</option>
                                        </select>
                                      </div>
          </div>
          <div class="input-box">
            <label class="details" required> What are you? <span aria-hidden="true" style = "color:red">*</span> </label>
            <div class="select">
            <select name="whatareyou" id="whatareyou" onChange="checkOption(this)" >
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option value ="student">Student</option>
                                            <option value ="orgofficer">Organization Officer</option>
                                            
                                        </select>
                                      </div>

          </div>
          <div class="input-box">
            <label class="details">Name of Organization  </label>
            <div class="select">
                  <select name="orgname" id="orgname">

                    <?php 
                    
                    include 'config.php';

                    $ORG_NAME= mysqli_query($conn,"SELECT * FROM organization ORDER BY Org_Name ASC");

                    foreach($ORG_NAME as $key => $value){ ?>
                     <option value="<?= $value['Org_ID'];?>"><?= $value['Org_Name']; ?></option> 
                   <?php } ?>
   
                  </select>
                    </div>
          </div>
          <div class="input-box">
            <label class="details">Position</label>
            <div class="select">
            <select name="orgposition" id="orgposition" >
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option >President</option>
                                            <option >Vice-President</option>
                                            
                                        </select>
                                      </div>

        
          </div>
          <div class="input-box">
            <label class="details">Username<span aria-hidden="true" style = "color:red">*</span> </label>
            <input type="text" name="username"  required>
          </div>
          <div class="input-box">
            <label class="details">Password <span aria-hidden="true" style = "color:red">*</span> </label>
            <input type="password" name="password" id="psw" pattern="(?=.*\d).{8,}" title="Must contain at least one number and at least 8 or more characters" required>
            <input type="checkbox" style="width:20px; height: 16px; margin-top: 15px; margin-right: 5px;"onclick="myFunction()"><span style="font-size:14px; color:#696969; padding: 3px;">Show Password</span>
            <div id="message">
			       <h6>Password must contain the following:</h6>
			       <p id="number" class="invalid">A <b>number</b></p>
			       <p id="length" class="invalid">Minimum <b>8 characters</b></p>
			     </div>
          </div>
        </div>
        <div class="input-box">
          <input type="radio" name="gender" value="Male" id="dot-1">
          <input type="radio" name="gender" value="Female" id="dot-2">
          <input type="radio" name="gender" value="Prefer not to say" id="dot-3">
          <label class="details">Gender <span aria-hidden="true" style = "color:red">*</span> </label>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span style="color:#414a4c;">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span style="color:#414a4c;">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span style="color:#414a4c;">Prefer not to say</span>
            </label>
          </div>
        </div>
        <br>
        <div class="input-box">
                                    <label class="details">Please upload a photo of your Student ID <span aria-hidden="true" style = "color:red">*</span>    </label>
                                    <input type="file" name="file[]" multiple /> 
                              
        </div>
        <div class="button">
          <input type="submit" name="submit" class ="" value="Register">
          <div><span style="color: red; font-size:13.5px; font-style: bold;"><?php echo $message="***Please wait for your account to be confirmed before logging in. Thank you!***"; ?></span></div>
        </div>
    </div>
    <br>
    <div class="login">
      <p>Already have an account? Log in <a href="login.php">here</a></p>
    </div>
  </form>
  
  
  <script>

    function checkOption(obj) {
            var input = document.getElementById("orgname");
            var input1= document.getElementById ("orgposition");
            input.disabled = obj.value == "student" ;
            input1.disabled = obj.value == "student" ;
    } 

		var myInput = document.getElementById("psw");
		var letter = document.getElementById("letter");
		var capital = document.getElementById("capital");
		var number = document.getElementById("number");
		var length = document.getElementById("length");

		// When the user clicks on the password field, show the message box
		myInput.onfocus = function() {
		  document.getElementById("message").style.display = "block";
		}

		// When the user clicks outside of the password field, hide the message box
		myInput.onblur = function() {
		  document.getElementById("message").style.display = "none";
		}

		// When the user starts to type something inside the password field
		myInput.onkeyup = function() {

		  // Validate numbers
		  var numbers = /[0-9]/g;
		  if(myInput.value.match(numbers)) {
		    number.classList.remove("invalid");
		    number.classList.add("valid");
		  } else {
		    number.classList.remove("valid");
		    number.classList.add("invalid");
		  }

		  // Validate length
		  if(myInput.value.length >= 8) {
		    length.classList.remove("invalid");
		    length.classList.add("valid");
		  } else {
		    length.classList.remove("valid");
		    length.classList.add("invalid");
		  }
		}

    function myFunction() {
      var x = document.getElementById("psw");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

</script>
</body>
</html>
