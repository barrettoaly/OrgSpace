<?php
    session_start();
    include 'config.php';    
    $ID= $_SESSION['admin_ID'];
    $sql=mysqli_query($conn,"SELECT * FROM user_admin where admin_ID='$ID' ");
    $row  = mysqli_fetch_array($sql);

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num_per_page = 07;
    $start_from = ($page-1)*07;
  
    $sql2= mysqli_query($conn,"SELECT * FROM featured_organization"); 
    $ORG_NAME= mysqli_query($conn,"SELECT Org_Name FROM organization");
    $sql1= mysqli_query($conn,"SELECT * FROM user_registration WHERE user_status=0 limit $start_from,$num_per_page "); 

    
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
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/page-style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="odcss.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="..\OrgSpace_LOGO_Final.png" />
</head>
<body>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand"><img src="OrgSpace_LOGO_Final_Admin.png" style ="width: 150px; height: 150px;" alt="logo"/></a>
       
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
              
                </span>
              </div>
              
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/user.png" style="height:30px; width:30px; " alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">EVENTS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">

            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="orgspaceadmin.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clusters.php" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Clusters</span>
             
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="organizations.php" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Organizations</span>
             
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="events.php" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Events</span>
            
            </a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="regverification.php" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Registration Verification </span>
         
            </a>
            
          </li>
          

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
                <div class="page-header">
                  <h3 class="font-weight-bold"> List of Registration
                    </h3>
                  <h6 class="font-weight-normal mb-0">Academic Year 2021-2022 <span class="text-primary"></span></h6>
                </div>
                  
   <div class="container-fluid" >
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2><b>Users For Verification</b></h2>
					</div>



				</div>
			</div>
      <?php
                      $i=0;
        if (mysqli_num_rows($sql1) > 0) {
        ?>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
			
         
            <!-- AGE, GENDER, COURSE, YEAR, ID PIC -->
	
						<th>First Name</th>
						<th>Last Name</th>
            <th>Details</th>
            <th>Status </th>
						<th>Actions</th>

					</tr>
				</thead>    
               
        <?php
              while($row = $sql1-> fetch_assoc()){ 
              $check_stat=$row['user_status'];
                if($check_stat== 0){
                    $status="Pending";
                  
             ?>
              <tr>

                <td> <?php echo $row['first_name'] ?> </td>
                <td> <?php echo $row['last_name'] ?> </td>
                <td> <button type ="button" class= "btn btn-primary btn-sm viewdetails" user_details="<?php echo $row["ID"]; ?>"> View Details</button> </td>
                <td>  <button type ="button" class= "btn btn-success editbtn" user_id="<?php echo $row["ID"]; ?>"><?php echo $status ?> </button></td>
                <td>
                <button type ="button" class= "btn btn-success editbtn" user_id="<?php echo $row["ID"]; ?>"> Approve </button>
                    
                <button type ="button" class= "btn btn-danger deletebtn" user_id="<?php echo $row["ID"]; ?>"> Decline </button>
                  
                </td>
   
              <?php
                $i++;
                }
			        }
			        ?>
            </tr>
          
 <?php
}
else
{
    echo "No result found";
}
?>
</table> 

<?php 
        
                $pr_query = "SELECT * FROM user_registration WHERE user_status=0";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);

                echo "<br>"."<br>
                <div class='clearfix'>
                <div class='hint-text'>Showing <b>".$i."</b> out of <b>".$total_record."</b> entries</div>
                <ul class='pagination'>";

                if($page>1)
                {
                  
                    echo "
                         
                          <li class='page-item'><a href='regverification.php?page=".($page-1)."' class='page-link'>Previous</a></li>
                         

                          ";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "
                           
                   <li class='page-item'><a href='regverification.php?page=".$i."' class='page-link'>".$i."</a></li>
                            
                          
                          ";
                }

                if($i>$page)
                {
                 
                    echo "
                          
                         
                          <li class='page-item'><a href='regverification.php?page=".($page+1)."'class='page-link'>Next</a></li>
                          

                          
                          
                          
                          ";
                  
                }
                        echo "</ul>
              </div>";
         
        
        ?>

    </div>

              </div>

	    
<!-- END PENDING USER REGISTRATION TABLE -->

<!-- START APPROVED USER REGISTRATION TABLE -->
<div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2><b>Verified Users</b></h2>
          </div>



        </div>
      </div>
      <?php
        $sql3= mysqli_query($conn,"SELECT * FROM user_registration WHERE user_status=1 limit $start_from,$num_per_page "); 
        $count=0;
        if (mysqli_num_rows($sql3) > 0) {
        ?>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
      
         
            <!-- AGE, GENDER, COURSE, YEAR, ID PIC -->
  
            <th>First Name</th>
            <th>Last Name</th>
            <th>Details</th>
            <th>Status </th>

          </tr>
        </thead>    
               
        <?php
              while($row = $sql3-> fetch_assoc()){ 
              $check_stat=$row['user_status'];
                if($check_stat== 1){
                    $status="Approved";
                  
             ?>
              <tr>

                <td> <?php echo $row['first_name'] ?> </td>
                <td> <?php echo $row['last_name'] ?> </td>
                <td> <button type ="button" class= "btn btn-primary btn-sm viewdetails" user_details="<?php echo $row["ID"]; ?>"> View Details</button> </td>
                <td>  <button type ="button" class= "btn btn-success editbtn" user_id="<?php echo $row["ID"]; ?>"><?php echo $status ?> </button></td>
                <td>
                     
              <?php
                $count++;
                }
              }
              ?>
            </tr>
          
 <?php
}
else
{
    echo "No result found";
}
?>
</table> 

<?php 
        
                $pr_query = "SELECT * FROM user_registration WHERE user_status=1";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);

                echo "<br>"."<br>
                <div class='clearfix'>
                <div class='hint-text'>Showing <b>".$count."</b> out of <b>".$total_record."</b> entries</div>
                <ul class='pagination'>";

                if($page>1)
                {
                  
                    echo "
                         
                          <li class='page-item'><a href='regverification.php?page=".($page-1)."' class='page-link'>Previous</a></li>
                         

                          ";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "
                           
                   <li class='page-item'><a href='regverification.php?page=".$i."' class='page-link'>".$i."</a></li>
                            
                          
                          ";
                }

                if($i>$page)
                {
                 
                    echo "
                          
                         
                          <li class='page-item'><a href='regverification.php?page=".($page+1)."'class='page-link'>Next</a></li>
                          

                          
                          
                          
                          ";
                  
                }
                        echo "</ul>
              </div>";
         
        
        ?>

    </div>

              </div>

<!-- START APPROVED USER REGISTRATION TABLE -->

<!--VIEW MORE USER REGISTRATION DETAILS --> 
<div id="viewdetailsModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = "add_featorganization.php" method= "POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title"><b> User Registration Details <b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
        <div class="modal-body" id="load_userdetails">	


      

            </div>
            <div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Exit">
	
				</div>
			</form>
		</div>
	</div>
</div>
       
       <!-- Edit Modal HTML 
<div id="editOrganizationModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="update_organization.php" method="post" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Cluster</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					

        <input type="hidden" name="id" id="id" class="form-control" required>

        <div class="form-group">
                <label>Featured Organization Name</label>
                <input type="text" name="FeatOrgName" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Featured Organization Description</label>
                <input type="text" name="FeatOrgDescrip" class="form-control" required>
            </div>
         
            <div class="form-group">
                <label>Featured Organization Logo</label>
                <input type="file" name="file[]" class="form-control" multiple>

            </div>
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" name="submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

-->



<div id="deleteUser" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = delete_featorg.php method= "POST">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Organization</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
          
        <input type="hidden" name="delete_id" id="delete_id" value="">  		

					<p>Are you sure you want to decline this user?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" name="submit" value="Delete">
				</div>
			</form>
		</div>
	</div>
 
                </div>


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
        


  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
  <script>
     $('.deletebtn').click(function(){
         var el = this;
          var uID=$(this).attr("user_id");
       var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
      $.ajax({
         url: 'delete_user.php',
        type: 'POST',
        data: {uID:uID },
        success:function(response){
            if(response == 1){
      // Remove row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800,function(){
         $(this).remove();
         location.reload(true);
      });
          }else{
      alert('Invalid ID.');
          }
        }

      });
    }
    });

          </script>
 
  <!-- SCRIPT FOR VIEW USER REGISTRATION DETAILS-->

<script>
$(document).ready(function(){  
$('.viewdetails').click(function(){   
   var user_details = $(this).attr("user_details");  
   $.ajax({  
        url:"load.php",  
        method:"post",  
        data:{user_details:user_details},  
        success:function(data){  
             $('#load_userdetails').html(data);  
             $('#viewdetailsModal').modal("show");
             
          
        }  
    
   });  
});  
}); 

</script>



<!--SCRIPT FOR STATUS -->

<script>
  $(document).ready(function(){
        $('.editbtn').click(function(){
         var el = this;
          var user_id=$(this).attr("user_id");
      $.ajax({
         url: 'user_verification.php',
        type: 'POST',
        data: {user_id:user_id},
        success:function(response){
            if(response == 1){
      // Remove row from HTML Table
      $(el).closest('tr').css('background','#060297');
      $(el).closest('tr').fadeOut(800,function(){
         $(this).remove();
         location.reload(true);
      });
          }else{
      alert('Invalid ID.');
          }
        }

      });
    });

  
  });

</script>


</body>

</html>


