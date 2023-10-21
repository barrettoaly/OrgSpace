
<?php
session_start();
include 'config.php';
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql2= mysqli_query($conn,"SELECT * FROM cluster WHERE Cluster_ID = '".$id."'"); 

              $i=0;
              while($row = $sql2-> fetch_assoc()){

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
        <link rel="stylesheet" href="css/OrgSpace/arrow.css">
		<link rel="stylesheet" href="css/style.css">
       
		<link rel="shortcut icon" href="images/OrgSpace_LOGO_Final.png" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
       
    </head>
<style>
.card {border: none;}
.card:hover{ box-shadow: 0px 10px 10px #060297;}
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 50%;margin-top: -45px;margin-left: -35px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}

</style>
   
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="OrgSpace_LOGO_Final_White.png" style="width:50px; height: 50px;" alt="OrgSpace">Clusters </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
			</div>
		</nav>
        <body>
        <section class="applyorgs" id="applyfororgs">
        <div class = "container  py-5">


                    <div class= "col-md-12">

                        <button class="arrow left"> <a href ="index.php#organizations">
                            <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                            <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                            45.63,75.8 0.375,38.087 45.63,0.375 "/>
                            </svg>  </a>
                        </button>
                    
                        <!--<a href ="indexout.php#organizations" role="button"  class="align-self-end btn btn-outline-primary " style="font-size: 16px;"> < <a> -->
                        <h1 class ="text-center" style = "color:#060297;  font-weight: bold;"> <?php echo $row['Cluster_Name']; ?> </h1> 
                        <p class ="text-center" style = "color:#060297; font-size: 16px; font-weight: normal;"> <?php echo $row['Cluster_Description']; ?> </p>
                        </div>

                    <div>
                        <br>  <br>  
                    </div>

                    <?php
                $i++;
			        }
			        ?>

            <div class ="row mt-4">
            
                <?php
                    
                    require 'config.php';

                    $id = (isset($_GET['id']) ? $_GET['id'] : '');
                    
                    $query = mysqli_query($conn,"SELECT * FROM organization WHERE Cluster_ID = '".$id."' ORDER BY Org_Name ASC");
                 
                    $check_query = mysqli_num_rows ($query) > 0;
                    
                    if($check_query){
                        while ($row = mysqli_fetch_array($query))
                        {
                            ?>
             
             
             
                          <div class ="col-md-3 mt-3" >
                          <a href="viewspecificorgout.php?id=<?php echo $row['Org_ID'] ?>" >
                            <div class ="card h-100" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="250">
                            
                            <img src = "OrgSpace-Admin/logo_uploads/<?php echo $row['Org_Logo']; ?>" width="257px" height="250px" alt= "Org Picture">
                                <div class = "card-body text-center d-flex flex-column"  >
                                    
                                    
                                    <h5 class = "card-title" style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; color: black; font-size: 16px; font-weight: bold;'> <?php echo $row['Org_Name'];?> </h2>
                                   
                              
                                   
                                </div>
                            </div>
                    
                        </div>
            </a>         

                            <?php
                             

                        }

                    }else{


                        echo "No Recruitment at this moment!";
                    }


                ?>
              
          
        </div>

               
                <!--
       
        <div id="viewdetailsModal" class="modal fade"   role="dialog" >
            <div class="modal-dialog">
             
                
                
        
                <div class="modal-content">
                <span class="close">&times;</span>
                    <div class="modal-body" id="load_data">

                           

                    </div>

                        <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" >Close</button>
                        </div>
                         

                </div>
            </div>
        </div>
                
                -->
               <!--
      <script>
      $(document).ready(function(){  
      $('.viewdetailsbtn').click(function(){  
           var recruitment_ID = $(this).attr("recruitment_ID");  
           $.ajax({  
                url:"load.php",  
                method:"post",  
                data:{recruitment_ID:recruitment_ID},  
                success:function(data){  
                    
                    $('#viewdetails').load('OrgSpace/viewdetails.php'); 
                    
                     
                  
                }  
            
           });  
      });  
 }); 

        </script>
    
    <script>
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
<?php
   mysqli_close($conn);
   ?>