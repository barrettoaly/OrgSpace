

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
.border {
  height: 2px;
  margin: 20px auto 20px;
  position: relative;
  width: 80px;
  background: #060297;

}

.title h2 {
  font-weight: 600;
  font-size: 35px;
  color: #232323;

}
.title p {
  color: #848484;
  width: 50%;
  margin: 0 auto;
  font-family:Enriqueta,arial,serif;
}
.about h5{
  font-weight: 400;
  font-size: 20px;
  color: #232323;  
}
.about p{
  color: #848484;
}


.card {border: none;}
.card:hover{box-shadow: 0px 10px 10px #060297;}
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 20%;margin-top: -25px;margin-left: 300px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}

</style>
    	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="OrgSpace_LOGO_Final_White.png" style="width:50px; height: 50px;" alt="OrgSpace">Join Organizations</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
			
			</div>
		</nav>
        <body>
<section class="about" id="about">
<div class="container py-5">
	  <div class="row">

            <div class="title text-center"  >
				<h2>About this recruitment</p> 
				<p>Explore. Expand your horizons.Learn about the different clusters and organizations in AdZU. Join organizations now and experience the Org traditions! </p>
				<div class="border"></div>
			</div>

              <button class="arrow left"> <a href ="applyfororganizations_out.php">
                        <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                        45.63,75.8 0.375,38.087 45.63,0.375 "/> 
                       
                        </svg>   </a> 
                        </button>

            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "orgspace";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $id = (isset($_GET['id']) ? $_GET['id'] : '');

            $query = mysqli_query($conn,"SELECT * FROM recruitment_detail where recruitment_ID = '".$id."'" );

            $check_recruitment = mysqli_num_rows ($query) > 0;

            if($check_recruitment){
                while ($row = mysqli_fetch_array($query))
                {
                    ?>
                    
             <div class ="col-md-6">
                   
                    
                <img src = "officer_dashboard/orgpic/<?php echo $row['Org_Pic']; ?>" class="img-fluid"width="650px" height="500px" alt= "Org Picture">
                        
             </div>

                            
            <div class= "col-md-5 ">               
                <h6  style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 15px; font-weight: bold; color: #848484;'> <?php echo $row['Cluster_Name'];?> <h6>
                           
                <h5  style ='text-align:Center;  line-height: 1.25; margin: 0 0 10px; font-size: 20px; font-weight: 600;'> <?php echo $row['Organization_Name'];?> </h2>
                           
                <p  style ='text-align:justify; text-justify:inter-word; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 14px; font-weight: normal; color: #848484;'> <?php echo $row['Recruitment_Descrip'];?> </p>
                           
                <p  style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 15px; font-weight: normal; color: #848484;'> <?php echo $row['Position'];?> </p>
                      
                 
                        
                <a href="registration.php?id=<?php echo $row['recruitment_ID'] ?>" role="button" style="position: absolute;right:0; bottom:0;" class="align-self-end btn btn-secondary btn-block">Apply Organization</a>
                </div>
                     
                  
            
              


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
