<?php
session_start();


$servername = "localhost";
$username = "orgspace";
$password = "orgspace_2022";
$dbname = "orgspace";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset ($_POST['submit'])){
	
	$phonenumber = $_POST['phonenumber'];
	$reasons = $_POST['reasons'];
    $hobbiesskills = $_POST['hobbiesskills'];
	$affilorgs = $_POST['affilorgs'];
    $listaffil = $_POST['listaffil'];
    $id = $_SESSION['ID'];
    $recid = $_GET['id'];
    $oid = $_GET['oid'];
    $position = $_GET['p'];

    $sql=mysqli_query($conn,"SELECT Org_Name FROM organization where Org_ID='$oid' ");
        $row  = mysqli_fetch_array($sql);
          $orgname=$row['Org_Name'];
	
		$sql = "INSERT INTO applicant(Recruit_ID, R_phonenumber, R_reasons,R_hobbiesskils, R_affilorgs, R_listaffil,R_Position,ID, OrgID, Org_Name, Status)
        VALUES ('$recid', '$phonenumber', '$reasons','$hobbiesskills','$affilorgs','$listaffil', '$position','$id', '$oid','$orgname' , 0)";
		if ($conn->query($sql) === TRUE) {
            header("location: applyfororganizations.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
		

}


?>


<html lang="en">

<head>
<!-- Required meta tags --> 
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>OrgSpace</title>
        
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
		<link rel="stylesheet" href="vendors/owl.carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="vendors/owl.carousel/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendors/aos/css/aos.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendors/jquery-flipster/css/jquery.flipster.css">
		<link rel="stylesheet" href="css/style.css">
        
		<link rel="shortcut icon" href="images/OrgSpace_LOGO_Final.png" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
       
    </head>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 100px;
 
}
mark{

background-color: white;
color: #060297;
font-weight: bold;
}
.mark1{
    background-color: white;
color: #7fa1e8;
font-weight: bold;
}
.container-form{
  width: 100%;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);

}
.container-form .title{
  font-size: 18px;
  font-weight: 500;
  position: relative;
}
.container-form .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 50px;
  border-radius: 5px;
  background: linear-gradient(135deg,  #060297, #7fa1e8);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box label.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.texthere{
  height: 80px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;


}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 40%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #060297, #7fa1e8);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #060297, #7fa1e8);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}
.card {border: none;}
.card:hover{box-shadow: 0px 10px 10px #060297;}
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 100%;margin-top: -45px;margin-left: -35px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}


  </style>


	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		
<section>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

$conn = mysqli_connect($servername, $username, $password, $dbname);

    $oid=$_GET['oid'];
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$_SESSION['id']=$id;
$_SESSION['oid']=$oid;
$query = mysqli_query($conn,"SELECT * FROM recruitment_detail where recruitment_ID = '".$id."'" );

$check_recruitment = mysqli_num_rows ($query) > 0;

if($check_recruitment){
    while ($row = mysqli_fetch_array($query))
    {
        ?>
     <div class= "col-md-12">   
     <button class="arrow left"> <a href ="index_in.php#organizations">
                        <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                        45.63,75.8 0.375,38.087 45.63,0.375 "/>
                        </svg>  </a>
                        </button>
                         <h3 class ="text-center" style = "color:#060297;  font-weight: bold;"><?php echo $row['Position']; ?> Application Form </h3>
                      </div>

    <div class="container-form">

    <div class="title text-center"> You are applying to <mark> <?php echo $row['Organization_Name']; ?> </mark>
    
        <p> <mark class= mark1> Hello,<?php echo $_SESSION['username']; ?>! </mark> Please READ CAREFULLY before filling up this form. <br>
        1. This form must be accomplished by an applicant/aspirant. <br>
        2. It must be answered TRUTHFULLY and COMPLETELY.</p>
        <p class= "text-center"> Persuant to Data Privacy Act 2012, all information will be kept confidential.</p>
    </div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <label class="details">Phone Number <span aria-hidden="true" style = "color:red">*</span></label>
            <input type="number" name= "phonenumber" required>
          </div>

          <div class="input-box">
            <label class="details">Reasons of joining this organization:<span aria-hidden="true" style = "color:red">*</span></label>
            <textarea class= "texthere" name= "reasons" required> </textarea>
          </div>
          <div class="input-box">
            <label class="details">List your hobbies/skills:<span aria-hidden="true" style = "color:red">*</span></label>
            <textarea class= "texthere" name="hobbiesskills" required> </textarea>
          </div>
        <div class="input-box">
          <input type="radio" name="affilorgs" id="dot-1" value='yes'>
          <input type="radio" name="affilorgs" id="dot-2" value='no'>
          <label class="details" required>Are you affiliated with other organizations?<span aria-hidden="true" style = "color:red">*</span></label>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Yes</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">No</span>
        </label>
        </div>
        </div>
      </div>
        <div class="input-box">
            <label class="details">If yes, list your affiliated organizations:</label>
            <textarea class= "texthere" name="listaffil"> </textarea>
          </div>
        <div class="button">
          <input type="submit" name= submit value="Register">
        </div>
      </form>
      
      <?php
                     

                    }
    
                }else{
    
    
                    echo "No Recruitment at this moment!";
                }
    
    
            ?>
    </div>
  </div>
</section>
           

            
                  
        <!--
           
        View Details 
        <div id="viewdetailsModal" class="modal fade"   role="dialog" >
            <div class="modal-dialog">
             
                
                
           Modal content
                <div class="modal-content">
                <span class="close">&times;</span>
                    <div class="modal-body" id="load_data">

                            load view details here 

                    </div>

                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" >Close</button>
                        </div>
                         

                </div>
            </div>
        </div>
                </form>
       

      <script>
      $(document).ready(function(){  
      $('.viewdetailsbtn').click(function(){  
        $("#viewdetailsModal").modal({backdrop: false});
           var recruitment_ID = $(this).attr("recruitment_ID");  
           $.ajax({  
                url:"load.php",  
                method:"post",  
                data:{recruitment_ID:recruitment_ID},  
                success:function(data){  
                     $('#load_data').html(data);  
                     $('#viewdetailsModal').modal("hide")
                     
                  
                }  
            
           });  
      });  
 }); 

        </script>
    -->
   <!--  <script>
                    var modal = document.getElementById("viewdetailsModal");
                    var span = document.getElementsByClassName("close")[0];

                    span.onclick = function() {
                    modal.style.display = "none";
                    }
                    window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
        </script>
            -->
		<script src="vendors/base/vendor.bundle.base.js"></script>
		<script src="vendors/owl.carousel/js/owl.carousel.js"></script>
		<script src="vendors/aos/js/aos.js"></script>
		<script src="vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
		<script src="js/template.js"></script>  
</body>
</html>
