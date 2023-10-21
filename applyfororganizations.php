<?php
session_start();
include 'config.php';

if (isset($_POST['search'])){
    $searchKey = $_POST['search'];
    $query = mysqli_query($conn,"SELECT * FROM recruitment_detail WHERE  Organization_Name LIKE '%$searchKey%'");

}else {

    $searchKey ="";
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
.card {border: none;}
.card:hover{box-shadow: 0px 10px 10px #060297;}
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 100%;margin-top: -25px;margin-left: -60px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #060297;
  border-right: none;
  padding: 5px;
  height: 40px;
  border-radius: 10px 0 0 10px;
  outline: none;
  color: #060297;
}

.searchTerm:focus{
  color: #060297;
}

.searchButton {
  width: 40px;
  height: 40px;
  border: 1px solid #060297;
  background: #060297;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 40%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>
   
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="index_in.php  "><img src="OrgSpace_LOGO_Final_White.png" style="width:50px; height: 50px;" alt="OrgSpace">Join Organizations</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
				
			</div>
		</nav>
        <body>
        <section class="applyorgs" id="applyfororgs">
        <div class = "container  py-5">
                <div class= "col-md-12">
                <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" name="search" value = "<?php echo $searchKey; ?>" placeholder="What are you looking for?">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                    <div> <br> <br>
                    </div>  
                </div>
            </div>
                 
                <button class="arrow left"> <a href ="index_in.php">
                        <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                        45.63,75.8 0.375,38.087 45.63,0.375 "/> 
                       
                        </svg>   </a> 
                        </button>
                
                </div>

            <br> <br>

            <div class ="row mt-4">
                <?php
                    
                    require 'config.php';

                    $query = mysqli_query($conn,"SELECT * FROM recruitment_detail WHERE R_status = 1 ORDER BY Organization_Name ASC");

                    $check_recruitment = mysqli_num_rows ($query) > 0;

                    if($check_recruitment){
                        while ($row = mysqli_fetch_array($query))
                        {
                            ?>
                            
                            <div class ="col-md-3 mt-3" >
                            <div class ="card h-100">
                            
                            <img src = "officer_dashboard/orgpic/<?php echo $row['Org_Pic']; ?>" width="256px" height="200px" alt= "Org Picture">
                                <div class = "card-body text-center d-flex flex-column"  >
                                    
                                    <p class = "card-text" style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 14px; font-weight: normal;'> <?php echo $row['Cluster_Name'];?> <p>
                                    <h5 class = "card-title" style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 14px; font-weight: bold;'> <?php echo $row['Organization_Name'];?> </h2>
                                    <p class = "card-text" style ='text-align:justify; text-justify:inter-word; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 14px; font-weight: normal;'> <?php echo $row['Recruitment_Descrip'];?> </p>
                                    <p class = "card-text" style ='text-align:Center; font-family:Enriqueta,arial,serif; line-height: 1.25; margin: 0 0 10px; font-size: 14px; font-weight: normal;'> <?php echo $row['Position'];?> </p>
                              
                                    <a href="viewdetails.php?id=<?php echo $row['recruitment_ID'] ?>&amp;oid<?php echo $row['OrgID']; ?>" role="button" style="margin-top: auto;" class="align-self-end btn btn-secondary btn-block">View Details</a>
                                </div>
                            </div>
                    
                        </div>
     

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