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



    $sql1= mysqli_query($conn,"SELECT * FROM cluster");

    if(isset($_POST['search']))
    {
    $searchKey = $_POST['search'];
    // search in all table columns
    // using concat mysql function
    $query =  mysqli_query($conn,"SELECT * FROM organization INNER JOIN cluster ON organization.Cluster_ID = cluster.Cluster_ID WHERE organization.Org_Name LIKE '%$searchKey%' OR cluster.Cluster_Name LIKE '%$searchKey%' limit $start_from,$num_per_page");
    }
    else{$query= mysqli_query($conn,"SELECT * FROM organization INNER JOIN cluster ON organization.Cluster_ID = cluster.Cluster_ID limit $start_from,$num_per_page");
   $searchKey =" ";
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
          <form action="organizations.php" method="POST">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
  
              <input type="text" name="search"  class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search" value = "<?php echo $searchKey; ?>">

            </div>
          </li>
                      </form>
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
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>-->
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
                  <h3 class="font-weight-bold"> List of Accredited Organizations
                    </h3>
                  <h6 class="font-weight-normal mb-0">Academic Year 2021-2022 <span class="text-primary"></span></h6>
                </div>
                  
   <div class="container-fluid" >
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Organizations</b></h2>
					</div>
					<div class="col-sm-6">
            <!--<a href="#deleteOrganizationModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>-->  
						<a href="#addOrganizationModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Organization</span></a>
					
					</div>
				</div>
			</div>

     
			<table class="table table-striped table-hover" >
				<thead>
					<tr>
						<!--<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>-->
          
						<th>Cluster Name</th>
						<th>Name</th>
            <th>Description</th>
						<th>Other Details</th>
            <th>Logo</th>
						<th>Actions</th>

					</tr>
				</thead>    
      <?php
                    
                    require 'config.php';

                    
                 
                    $check_query = mysqli_num_rows ($query) > 0;

                    $i=0;
                    
                    if($check_query){
                        while ($row = mysqli_fetch_array($query))
                        {
                            ?>

              <tr>
              
         
            
              <td> <?php echo $row['Cluster_Name'] ?> </td>
              <td> <?php echo $row['Org_Name'] ?> </td>
              <td> <button type ="button" class= "btn btn-primary btn-sm viewdescrip" Org_descrip="<?php echo $row["Org_ID"]; ?>"> View Description</button> </td>
              <td> <button type ="button" class= "btn btn-primary btn-sm viewmodandoff" Org_viewmodandoff="<?php echo $row["Org_ID"]; ?>"> View Details</button> </td>
              

              <td> <?php echo '<img src="logo_uploads/'.$row['Org_Logo'].'"width="100px;" height="100px;" alt="Image">'?> </td>
              
              <td> <button type ="button" class= "btn btn-success editbtn" Org_id="<?php echo $row["Org_ID"]; ?>"> <i class= "material-icons" data-toggle= "tooltip" title="Edit">&#xE254;</i></button>
                  
              <button type ="button" class= "btn btn-danger deletebtn" Org_id="<?php echo $row["Org_ID"]; ?>" > <i class= "material-icons" data-toggle= "tooltip" title="Delete">&#xE872;</i></button>
            
              </td>
             
              


              <?php
                             
                $i++;
                        }

                    }else{


                        echo "No results found!";
                    }


                ?>
            </tr>

          
</table> 
<?php 
        
                $pr_query = "SELECT * FROM organization INNER JOIN cluster ON cluster.Cluster_ID = organization.Cluster_ID ";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);


                $row = mysqli_num_rows($pr_result);

                echo "<br>"."<br>";
                echo "<div class='clearfix'>";
                echo "<div class='hint-text'>Showing <b>".$i."</b> out of <b>".$total_record."</b> entries</div>";
                echo "<ul class='pagination'>";

                if($page>1)
                {
                  
               
                         
                          echo "<li class='page-item'><a href='organizations.php?page=".($page-1)."' class='page-link'>Previous</a></li>
                         

                          ";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "
                           
                   <li class='page-item'><a href='organizations.php?page=".$i."' class='page-link'>".$i."</a></li>
                            
                          
                          ";
                }

                if($i>$page)
                {
                 
                    echo "
                          
                         
                          <li class='page-item'><a href='organizations.php?page=".($page+1)."' class='page-link'>Next</a></li>
                          
                          
                          
                          
                          ";
                  
                }
                echo "</ul>";
              echo "</div>";
               
         
        
        ?>

    </div>

				<!--<tbody>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>Thomas Hardy</td>
						<td>thomashardy@mail.com</td>
						<td>89 Chiaroscuro Rd, Portland, USA</td>
						<td>(171) 555-2222</td>
						<td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr> -->
					<!--
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
	</div>        -->
<!-- ADD Modal HTML -->
<div id="addOrganizationModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = "add_organization.php" method= "POST" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title"><b> Add Organization </b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
            
        <div class="modal-body">	
        <div class ="user-details"> 
        
            <div class="form-group " >
            <label>Cluster Name</label> 
                <select class ="form-control" name="ClusterName">
    
                <?php
                    while ($row=$sql1->fetch_assoc()){
                      echo "<option value=".$row['Cluster_ID'].'>'. $row['Cluster_Name']."</option>";
                    }
                  ?> 


               </select>
             </div>

            <div class="form-group">
                <label>Organization Name</label>
                <input type="text" name="OrgName" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Organization Description</label>
              <textarea class="form-control" name="OrgDescription" id="OrgDescription" required></textarea>
					  </div>          

            <div class="form-group">
                <label>Organization Moderator</label>
                <input type="text" name="OrgModerator" class="form-control" required>
            </div>
          
            <div class="form-group">
                <label>President</label>
                <input type="text" name="OrgPresident" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Vice-President</label>
                <input type="text" name="OrgVicePresident" class="form-control">
            </div>

            <div class="form-group">
                <label>Social Media Page</label>
                <input type="text" name="OrgActiveSocMed" class="form-control" required>
            </div>          

            <div class="form-group">
                <label>Organization Logo</label>
                <input type="file" name="file[]" class="form-control" multiple>
            </div>

            </div>
                  </div>
            <div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" name="submit" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Edit Modal HTML -->
<div id="editOrganizationModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="update_organization.php" method="post" enctype="multipart/form-data">
				<div class="modal-header">						
					<h4 class="modal-title"><b>Edit Organization </b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id ="load_data">					

        
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" name="submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- view descrip -->
<div id="viewdescripModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="update_organization.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title"><b>Organization Description </b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id ="load_description">					

        
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Exit">
					
				</div>
			</form>
		</div>
	</div>
</div>

<!-- view moderator and officers -->
<div id="viewmodandoff" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="update_organization.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title"> <b> View Moderator and Officers </b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" id ="load_modandoff">					

        
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Exit">
					
				</div>
			</form>
		</div>
	</div>
</div>




<!-- Delete Modal HTML -->
<div id="deleteOrganizationModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action = delete_organization.php method= "POST">
				<div class="modal-header">						
					<h4 class="modal-title">Delete Organization</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
          
        <input type="hidden" name="delete_id" id="delete_id" value="">  		

					<p>Are you sure you want to delete this organization?</p>
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
          var uID=$(this).attr("Org_id");
       var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
      $.ajax({
         url: 'delete_organization.php',
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
 

<!-- SCRIPT FOR EDIT ORGANIZATION-->

  <script>
      $(document).ready(function(){  
      $('.editbtn').click(function(){   
           var Org_ID = $(this).attr("Org_ID");  
           $.ajax({  
                url:"load.php",  
                method:"post",  
                data:{Org_ID:Org_ID},  
                success:function(data){  
                     $('#load_data').html(data);  
                     $('#editOrganizationModal').modal("show");
                     
                  
                }  
            
           });  
      });  
 }); 

        </script>


<!-- SCRIPT FOR VIEW ORGANIZATION DESCRIP-->
        <script>
      $(document).ready(function(){  
      $('.viewdescrip').click(function(){   
           var Org_descrip = $(this).attr("Org_descrip");  
           $.ajax({  
                url:"load.php",  
                method:"post",  
                data:{Org_descrip:Org_descrip},  
                success:function(data){  
                     $('#load_description').html(data);  
                     $('#viewdescripModal').modal("show");
                     
                  
                }  
            
           });  
      });  
 }); 

        </script>
        
<!-- SCRIPT FOR VIEW MODERATOR AND OFFICERS-->

<script>
$(document).ready(function(){  
$('.viewmodandoff').click(function(){   
   var Org_viewmodandoff = $(this).attr("Org_viewmodandoff");  
   $.ajax({  
        url:"load.php",  
        method:"post",  
        data:{Org_viewmodandoff:Org_viewmodandoff},  
        success:function(data){  
             $('#load_modandoff').html(data);  
             $('#viewmodandoff').modal("show");
             
          
        }  
    
   });  
});  
}); 

</script>

</body>

</html>


