
<?php
session_start();
include 'config.php';
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$sql2= mysqli_query($conn,"SELECT * FROM cluster WHERE Cluster_ID = '".$id."'"); 
$query = mysqli_query($conn,"SELECT * FROM organization WHERE Cluster_ID = '".$id."'");
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
   
	<body  data-target=".navbar" data-offset="50" >
		<div id="mobile-menu-overlay"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<div class="container">
				<a class="navbar-brand" href="index_in.php#organizations"><img src="OrgSpace_LOGO_Final_White.png" style="width:50px; height: 50px;" alt="OrgSpace">OrgSpace</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
				</button>
			</div>
		</nav>
    <!-- -------------------------------------SPECIFIC ORGANIZATION----------------------------------------- -->
	<div class="page-body-wrapper">
			<section id="home" class="home">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div data-aos="zoom-in-up">
                  <?php
                      $i=0;
                      $id = (isset($_GET['id']) ? $_GET['id'] : '');
                    
                      $query = mysqli_query($conn,"SELECT * FROM organization WHERE Org_ID = '".$id."'");
                   
                      while($row = $query-> fetch_assoc()){
                    ?>
										<div class="banner-title">
												<h4 class="font-weight-medium"><?php echo $row['Org_Name']; ?> </h4>
										</div>
										<p class="mt-3"> <?php echo $row['Org_Description']; ?>

											<br>
										
										</p>
										<a href="<?php echo $row['Org_ActiveSocMedAcc']; ?>" class="btn btn-secondary mt-3">Learn more</a>
									</div>
									<div class="mt-5 mt-lg-0">
										<img src= "OrgSpace-Admin/logo_uploads/<?php echo $row['Org_Logo']; ?>" height="600px;" width="600px;" 
                                        id="logo" alt="marsmello" class="rounded-circle img-fluid" data-aos="zoom-in-up">
									</div>

                  <?php
                $i++;
			        }
			        ?>
			</div>
				</div>
				</div>
				</div>
				</div>				
								<!--  SHOW CASE ORG PIC -->
									<div class="container">
									<div class="row mb-5">
										<div class="col-sm-12">
											<div class="d-sm-flex justify-content-between align-items-center mb-2">
												<h3 class="font-weight-medium text-dark ">Featured Activities</h3>

											</div>
										</div>
									</div>
								</div>

								<div class="mb-5" data-aos="fade-up">
								<div class="owl-carousel-projects owl-carousel owl-theme">
								<?php
								
								require 'config.php';

								$id = (isset($_GET['id']) ? $_GET['id'] : '');
								$query = mysqli_query($conn,"SELECT * FROM featured_organization  WHERE Org_ID = '".$id."'");
							
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
				
									}

				
				
								?>
							
								</div>
								</div>	

												<!-- PRESIDENT AND VICE-PRESIDENT -->
					<div class="container">
					<div class="row">
								<div class="col-sm-11">
									<div class="d-sm-flex justify-content-between align-items-center mb-2">
										<h5 class="text-dark">Get to know your </h5>
									</div>
									<div>
										<h3 class="font-weight-medium text-dark mb-5">LEADERS</h3>
									</div>
								</div>
						<div class="row" data-aos="fade-up">
						<?php
							$i=0;
							$id = (isset($_GET['id']) ? $_GET['id'] : '');
							
							$query = mysqli_query($conn,"SELECT * FROM organization WHERE Org_ID = '".$id."'");
						
							while($row = $query-> fetch_assoc()){
							?>
							
							<div class="col-sm-2 text-center">
								<div class="services-box"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
								
									<img src="images/123.png" width="200px;" height="200px;" alt="Image">
									<h5 class="font-weight-medium" style="white-space: nowrap; padding-top:15px;">President</h5>
									<h6 class="font-weight-normal" style="white-space: nowrap; padding-top:15px;"><?php echo $row['Org_President'];?></h6>
								</div>
							</div>
								
							

							<div class="col-sm-2 " style="display: block; margin: auto;">
								<div class="services-box"  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
									
								<img src="images/123.png" width="200px;" height="200px;" alt="Image">
								<h5 class="font-weight-medium" style="white-space: nowrap; padding-top:15px;">Vice-President</h5>
								<h6 class="font-weight-normal" style=" white-space: nowrap; padding-top:15px; "><?php echo $row['Org_VicePresident'];?></h6>
									
							</div>
							<?php
                $i++;
			        }
			        ?>
					</div>


								</div>
							</div>
						</div>
			</section>
		</div>
         
	



    <!-- -------------------------------------------END SPECIFIC ORG--------------------------------------------->
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