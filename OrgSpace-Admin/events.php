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


  
    $sql2= mysqli_query($conn, "SELECT * FROM ((event INNER JOIN user_registration ON event.OrgOfficer_ID=user_registration.ID) INNER JOIN organization ON event.OrgID=organization.Org_ID) WHERE event.Event_Status=0 limit $start_from,$num_per_page"); 

    
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
  <link rel="shortcut icon" href="OrgSpace_LOGO_Final.png" />
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
                  <h3 class="font-weight-bold"> List of Events
                    </h3>
                  <h6 class="font-weight-normal mb-0">Academic Year 2021-2022 <span class="text-primary"></span></h6>
                </div>
                  
   <div class="container-fluid" >
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Pending <b>Events</b></h2>
					</div>
				</div>
			</div>

			<table class="table table-striped table-hover">
				   
                <!-- INSERT EVENT BACK-END PROGRAM -->

              <?php
              $count=0;
              if (mysqli_num_rows($sql2) > 0) {
              echo "  <thead>
          <tr>
         

            <th>Organization</th>
            <th>Details</th>
            <th>Officer</th>
            <th> Status</th>
            <th>Actions</th>

          </tr>
        </thead>"; 
                while($row = $sql2->fetch_assoc()){
                  $count++;
                $id= $row['Event_ID'];
                $check_stat=$row['Event_Status'];

                if($check_stat== 0){
                    $status="Pending";
                  };
              echo"<tr id='decline'",$id,">";


              echo "<td>".$row['Org_Name']."</td>";
              echo "<td>"."<a href=../event-calendar/vieweventsout.php?eventID=",$id,"><button class='btn btn-primary btn-sm'>View Details</button></a>"."</td>";
              echo "<td>".$row['first_name']. "&nbsp" .$row['last_name']."</td>";
               echo "<td>"."<button type ='button' class='btn btn-success' eID='",$id,"'>".$status."</button>"."</td>";
              echo "<td>"."<button type ='button' class='btn btn-success editbtn' eID='",$id,"'>"."Approve"."</button>"
                          ."&nbsp"."<button type ='button' class='btn btn-danger deletebtn' eID='",$id,"'>"."Decline"."</button>"."</td>";
            echo"</tr>";
$count++;}

}
else
{
    echo "No Pending Events....";
}
?>
</table>



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

					
			<?php 
        
                $pr_query = "SELECT * FROM event WHERE Event_Status=0 ";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);


                $row = mysqli_num_rows($pr_result);


                echo "<br>"."<br>";
                echo "<div class='clearfix'>";
                echo "<div class='hint-text'>Showing <b>".$count."</b> out of <b>".$row."</b> entries</div>";
                echo "<ul class='pagination'>";

                if($page>1)
                {
                  
               
                         
                          echo "<li class='page-item'><a href='events.php?page=".($page-1)."' class='page-link'>Previous</a></li>
                         

                          ";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "
                           
                   <li class='page-item'><a href='events.php?page=".$i."' class='page-link'>".$i."</a></li>
                            
                          
                          ";
                }

                if($i>$page)
                {
                 
                    echo "
                          
                         
                          <li class='page-item'><a href='events.php?page=".($page+1)."' class='page-link'>Next</a></li>
                          
                          
                          
                          
                          ";
                  
                }
                echo "</ul>";
              echo "</div>";
               
         
        
        ?>


		</div>
	</div>        

  <div class="table-responsive">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-6">
            <h2>Approved <b>Events</b></h2>
          </div>
        </div>
      </div>

      <table class="table table-striped table-hover">   
                <!-- INSERT EVENT BACK-END PROGRAM -->

              <?php
              $sql3= mysqli_query($conn,"SELECT * FROM ((event INNER JOIN user_registration ON event.OrgOfficer_ID=user_registration.ID) INNER JOIN organization ON event.OrgID=organization.Org_ID) WHERE event.Event_Status=1 limit $start_from,$num_per_page"); 
              $count=0;
              if (mysqli_num_rows($sql3) > 0) {
                echo "<thead>
          <tr>

         
            <th>Name</th>
            <th>Description</th>
            <th>Organization</th>
            <th>Officer</th>
            <th> Status</th>

          </tr>
        </thead> ";
                while($row = $sql3->fetch_assoc()){
                $id= $row['Event_ID'];
                $check_stat=$row['Event_Status'];

                if($check_stat== 1){
                    $status="Approved";
                  };

              echo"<tr id='decline'",$id,">";


              echo "<td>".$row['Event_Name']. "</td>";
              echo "<td>"."<a href=../event-calendar/vieweventsout.php?eventID=",$id,"><button class='btn btn-primary'>See Details</button></a>"."</td>";
              echo "<td>".$row['Org_Name']."</td>";
              echo "<td>".$row['first_name']. "&nbsp" .$row['last_name']."</td>";

              echo "<td>"."<button type ='button' class='btn btn-success' eID='",$id,"'>".$status."</button>"."</td>";
            echo"</tr>";

              $count++;

                            
}


}
else
{
    echo "No result found";
}
?>
</table>
          
        <?php 
        
                $pr_query = "SELECT * FROM event WHERE Event_Status=1 ";
                $pr_result = mysqli_query($conn,$pr_query);
                $total_record = mysqli_num_rows($pr_result );
                
                $total_page = ceil($total_record/$num_per_page);


                $row = mysqli_num_rows($pr_result);

                echo "<br>"."<br>";
                echo "<div class='clearfix'>";
                echo "<div class='hint-text'>Showing <b>".$count."</b> out of <b>".$row."</b> entries</div>";
                echo "<ul class='pagination'>";

                if($page>1)
                {
                  
               
                         
                          echo "<li class='page-item'><a href='events.php?page=".($page-1)."' class='page-link'>Previous</a></li>
                         

                          ";

                }

                
                for($i=1;$i<$total_page;$i++)
                {
                    echo "
                           
                   <li class='page-item'><a href='events.php?page=".$i."' class='page-link'>".$i."</a></li>
                            
                          
                          ";
                }

                if($i>$page)
                {
                 
                    echo "
                          
                         
                          <li class='page-item'><a href='events.php?page=".($page+1)."' class='page-link'>Next</a></li>
                          
                          
                          
                          
                          ";
                  
                }
                echo "</ul>";
              echo "</div>";
               
         
        
        ?>



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
</div>
        



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
  $(document).ready(function(){
        $('.editbtn').click(function(){
         var el = this;
          var eID=$(this).attr("eID");
      $.ajax({
         url: 'status_process.php',
        type: 'POST',
        data: {eID:eID },
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


    $('.deletebtn').click(function(){
         var el = this;
          var eID=$(this).attr("eID");
       var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
      $.ajax({
         url: 'decline_process.php',
        type: 'POST',
        data: {eID:eID },
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
  });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/query.min.js"></script>
</body>

</html>


