<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags --> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>OrgSpace</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
		 <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
		<link rel="stylesheet" href="vendors/owl.carousel/css/owl.carousel.css">
		<link rel="stylesheet" href="vendors/owl.carousel/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendors/aos/css/aos.css">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendors/jquery-flipster/css/jquery.flipster.css">
		 
		<link rel="stylesheet" href="css/style.css">
		
		<link rel="shortcut icon" href="images/OrgSpace_LOGO_Final.png" />
		
		<style>
		.icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 45px;
  height: 45px;
  color: #333333;
  background: #dddddd;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
}

.icon-button:active {
  background: #cccccc;
}

.icon-button__badge {
  position: absolute;
  top: -1px;
  right: 5px;
  width: 20px;
  height: 20px;
  background: red;
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}	



		</style>
	</head>





	<body data-spy="scroll" data-target=".navbar" data-offset="50">
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#"><img src="OrgSpace_LOGO_Final_White.png" style="width:50px; height: 50px;" alt="OrgSpace">OrgSpace</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					<div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
						<img src="images/logo-dark.svg" class="logo-mobile-menu" alt="logo">
						<a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
					</div>
					<ul class="navbar-nav ml-auto align-items-center">
						<li class="nav-item active">
							<a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#featuredorganizations">Featured Organizations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#organizations">Organizations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#events">Events</a>
						</li>
						<?php 
						require 'config.php';
						   $sql=mysqli_query($conn,"SELECT * FROM user_registration where ID=".$_SESSION['ID']);
    						$row  = mysqli_fetch_array($sql);

    						if($row['studentorgofficer']=='orgofficer'){
    						echo " <li class='nav-item'>
								<a class='nav-link' href='officer_dashboard/index.php'>My Dashboard</a>
								</li>";	
    						}
						
						?>
						<li class="nav-item">
							<a class="nav-link" href="applyfororganizations.php">Join Organizations</a>
						</li>

								<!-- NOTIFICATION -->
						<li class="nav-item">
							
						<ul class="navbar-nav">

				<li class="nav-item dropdown ml-3">
				<?php $sql = "SELECT * FROM notification WHERE notif_status= '0' AND ID=".$_SESSION['ID'] ;
					$res = mysqli_query($conn, $sql); 
					$totalRows=mysqli_num_rows($res);
					
					?>

				<?php if($totalRows!=0)
					{ ?>


				<a class="nav-link" href="" data-toggle="dropdown" >
					<i class="fa fa-bell"></i>
					<span class="icon-button__badge" style = "color:white">
						
						<?php 
								
										echo $totalRows;
						
						?>
				
				
				</span>
				</a>
  <?php }else{ ?>
	  <a class="nav-link" href="" data-toggle="dropdown">
	<i class="fa fa-bell"></i>
	<span>
		  
		  <?php 
					  if($totalRows!=0){

						  echo $totalRows;
					  }
		  
		  ?>
   
  </span>
  </a>
  <?php } ?>
  
  <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
	<h6 class="px-3 py-3 font-weight-semibold mb-0" style="font-size: 15px;">Notifications</h6>

	<?php
	if (mysqli_num_rows($res) > 0) {
	  foreach ($res as $item) {
	?>
	<div class="dropdown-divider"></div>
	<a class="dropdown-item preview-item" href="notification/readNotification.php?id=<?php echo $item['ID']?>" >
	  <div class="preview-thumbnail">
		
	  </div>
	  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center  style ="
                         <?php
                            if($item['notif_status']=='0'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         >
		  
		<?php 
		  if ($item["notiftype"]=='Confirmation') {
		  	   echo "<h6 style='font-size: 15px;' > Registration Confirmed!</h6>";
		
		} else if ($item["notiftype"]=='ConfirmationApplicant'){
			
			 echo "<h6 style='font-size: 15px;'> Application Confirmed!</h6>";
			
		} else if ($item["notiftype"]=='DeclineParticipant'){
			
			 echo "<h6 style='font-size: 15px;'> Registration Declined!</h6>";
			
		} else if ($item["notiftype"]=='DeclineApplicant'){
		
			 echo "<h6 style='font-size: 15px;'>Application Declined!</h6>";
			
		} 

		?>
		<p class="text-gray ellipsis mb-0" style="font-size: 10px;"> View More Details</p>
		<p class="text-gray ellipsis mb-0" style="font-size: 10px;"> <?php echo $item['notif_date']; ?> </p>
	  </div>

	</a>
	<?php }
	   }else{ ?>
		   <div class="dropdown-divider"> </div>
		  <img src = "images/empty_notif.png" height="100px" width="130px" 
		  style ="display: block; margin-left: auto;margin-right: auto; width: 70%;">
			<p class="text-danger text-center"> You don't have new notifications!</p>
	

  <div class="dropdown-divider"></div>
  	<a class="btn btn-secondary btn-sm text-center" href="event-calendar/index.php">View All New Events</a>
	  <div class="dropdown-divider"></div>
	<a class="btn btn-primary btn-sm text-center" href="notification/readNotification.php">View All Notifications</a>
  </div>
  <?php } ?>	
	   </ul>
	   </li>

						</li>


						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>

						
					</ul>
				</div>
			</div>
		</nav>
		<div class="page-body-wrapper">
			<section id="home" class="home">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div data-aos="zoom-in-up">
										<div class="banner-title">
												<h4 class="font-weight-medium"> Hello, <?php echo $_SESSION['username'];  $orgid= $_SESSION['orgid'];?> ! </h4>
												<br>
												<h3 class="font-weight-medium">Welcome to OrgSpace
											</h3>
										</div>
										<p class="mt-3">Explore. Expand your horizons. 

											<br>
											Learn about the different clusters and organizations in AdZU.
											Apply online for positions in organizations.
											Register and join events. 
										</p>
									
									</div>
									<div class="mt-5 mt-lg-0">
										<img src="images/group.png" alt="marsmello" class="img-fluid" data-aos="zoom-in-up">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="our-projects" id="featuredorganizations">
				<div class="container">
					<div class="row mb-5">
						<div class="col-sm-12">
							<div class="d-sm-flex justify-content-between align-items-center mb-2">
								<h3 class="font-weight-medium text-dark ">Featured Organizations</h3>
								
							</div>
						</div>
					</div>
				</div>
				<div class="mb-5" data-aos="fade-up">
					<div class="owl-carousel-projects owl-carousel owl-theme">
						<?php
                    
                    require 'config.php';

                    $query = mysqli_query($conn,"SELECT * FROM featured_organization");
                 
                    $check_query = mysqli_num_rows ($query) > 0;
                    
                    if($check_query){
                        while ($row = mysqli_fetch_array($query))
                        {
                            ?>

						<div class="item">
							<img src="officer_dashboard/featorgpic/<?php echo $row['FeatOrg_Photo']; ?>" alt= "Slider">
						</div>
						<?php        

							}
	
						}else{
	
	
							echo "No Featured Org at this moment!";
						}
	
	
					?>
					</div>
				</div>
				<div class="container">
					<div class="row pt-5 mt-5 pb-5 mb-5">
						<div class="col-sm-3">
							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
								<img src="images/satisfied-client.svg" alt="satisfied-client" class="mr-3">
								<div>
								<?php
									include 'config.php';
									$query = "SELECT Cluster_ID FROM cluster ORDER BY Cluster_ID";  
									$query_run = mysqli_query($conn, $query);
									$row = mysqli_num_rows($query_run);
									echo '<h4 class = "font-weight-bold text-dark mb-0">'.$row.'</h4>
									<h5 class="text-dark mb-0">Clusters</h5>';
								?>
									
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
								<img src="images/finished-project.svg" alt="satisfied-client" class="mr-3">
								<div>
								<?php
									include 'config.php';
									$query = "SELECT Org_ID FROM organization ORDER BY Org_ID";  
									$query_run = mysqli_query($conn, $query);
									$row = mysqli_num_rows($query_run);
									echo '<h4 class = "font-weight-bold text-dark mb-0">'.$row.'</h4>
									<h5 class="text-dark mb-0">Organizations</h5>';
								?>	
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-down">
								<img src="images/team-members.svg" alt="Team Members" class="mr-3">
								<div>
								<?php
									include 'config.php';
									$query = "SELECT Org_ID FROM organization ORDER BY Org_ID";  
									$query_run = mysqli_query($conn, $query);
									$row = mysqli_num_rows($query_run);
									echo '<h4 class = "font-weight-bold text-dark mb-0">'.$row.'</h4>
									<h5 class="text-dark mb-0">Organizations</h5>';
								?>	
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="d-flex py-3 my-3 my-lg-0 justify-content-center" data-aos="fade-up">
								<img src="images/our-blog-posts.svg" alt="Our Blog Posts" class="mr-3">
								<div>
								<?php
									include 'config.php';
									$query = "SELECT ID FROM user_registration";  
									$query_run = mysqli_query($conn, $query);
									$row = mysqli_num_rows($query_run);
									echo '<h4 class = "font-weight-bold text-dark mb-0">'.$row.'</h4>
									<h5 class="text-dark mb-0">Users</h5>';
								?>	
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</section>
			<section class="our-services" id="organizations">
				<div class="container">
					<div class="row">
						<div class="col-sm-11">
						<div class="d-sm-flex justify-content-between align-items-center mb-2">
							<h5 class="text-dark">Get to know the different</h5>
							<div><a href="viewallorgs.php" class="btn btn-secondary">View All Organizations</a></div>
						</div>
							<h3 class="font-weight-medium text-dark mb-5">Clusters and Organizations</h3>
						</div>
					</div>
					<div class="row" data-aos="fade-up">
						<?php
						require 'config.php';

						$query="SELECT * FROM cluster";
						$query_run=mysqli_query($conn, $query);
						$check_cluster=mysqli_num_rows($query_run) > 0;

						if($check_cluster)
						{
							while($row=mysqli_fetch_array($query_run))
							{
								?>
							<div class="col-sm-4 text-center">
							<div class="services-box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
								<?php echo '<img src="OrgSpace-Admin/logo_uploads/'.$row['Cluster_Logo'].'"width="200px;" height="200px;" alt="Image">'?>
								<h4 class="text-dark mb-3 mt-4 font-weight-medium"><?php echo $row['Cluster_Name'];?></h4>
								<h6 style="color:#060297;  font-weight: normal;"><?php echo $row['Cluster_Head'];?></h6>
								<p style="font-weight: bold;" > Cluster Head </p>

								<a href="vieworg.php?id=<?php echo $row['Cluster_ID'] ?>" role="button" style="margin-top: auto;" class="align-self-end btn btn-outline-primary ">View Organizations</a>

							</div>
							</div>

								<?php
							}
						}
						else
						{
							echo "No Cluster found";
						}
						?>
					</div>
				</div>
								<!-- The Modal -->
				<div id="myModal" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				    <span class="close1">&times;</span>
				    <p>Some text in the Modal..</p>
				  </div>

				</div>
			</section>

			<section class="contactus" id="events">
				<div class="container">
					<div class="row mb-5 pb-5">
						<div class="col-sm-5" data-aos="fade-up" data-aos-offset="-500">
							<img src="img/event.png" alt="contact" class="img-fluid">
						</div>
						<div class="col-sm-7" data-aos="fade-up" data-aos-offset="-500">
							<h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Calendar of Events</h3>
							<h5 class="text-dark mb-5">Register and Join in events!</h5>
							<form>
								<div class="row">
									<div class="col-sm-12">
										<a href="event-calendar/index.php" class="btn btn-secondary">View Calendar of Events</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<address>
								<img src="OrgSpace_LOGO_Final_White.png" style="width:30%;" alt="OrgSpace">
								<div class="d-flex align-items-center">
									<div class="social-icons">
									<a href="#"><i class="mdi mdi-email-outline"></i></a></div>
									<a href="mailto:info@yourmail.com" style="margin-top: 10px; font-size: 20px; font-weight:normal;   color: #e5e5e5;
">orgspace@gmail.com</a>
								</div>
							</address>
						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-4">
									<ul class="list-footer">
										<li><a href="#" class="footer-link">Home</a></li>
										<li><a href="#" class="footer-link">Featured Organizations</a></li>
										<li><a href="#" class="footer-link">Organizations</a></li>
										<li><a href="#" class="footer-link">Events</a></li>
										<li><a href="#" class="footer-link">Join Organizations</a></li>
									</ul>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex align-items-center">
							<p class = "mb-0 text-small pt-1" > OrgSpace </p> 
							<p class="mb-0 text-small pt-1">© 2019-2020 <a href="https://www.bootstrapdash.com" class="text-white" target="_blank">BootstrapDash</a>. All rights reserved.</p>
            
							<p class="mb-0 text-small pt-1 pl-4">Distributed By: <a href="https://www.themewagon.com" class="text-white" target="_blank">Themewagon</a></p>
						</div>
           
						<div>
							<div class="d-flex">
								<a href="#" class="text-small text-white mx-2 footer-link">Privacy Policy </a>          
								<a href="#" class="text-small text-white mx-2 footer-link">Customer Support </a>
								<a href="#" class="text-small text-white mx-2 footer-link">Careers Guide</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</footer>

	



				<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			$(document).ready(function() {
			$("#notifications").on("click", function() {
				$.ajax({
				url: "readNotifications.php",
				success: function(res) {
					console.log(res);
				}
				});
			});
			});
		</script>
				

		<script>
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("orgmodal");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close1")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			  modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
			    modal.style.display = "none";
			  }
			}

		</script>
		<script src="vendors/base/vendor.bundle.base.js"></script>
		<script src="vendors/owl.carousel/js/owl.carousel.js"></script>
		<script src="vendors/aos/js/aos.js"></script>
		<script src="vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
		<script src="js/template.js"></script>
	</body>
</html>