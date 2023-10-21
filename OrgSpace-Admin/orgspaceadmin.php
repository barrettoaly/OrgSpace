<?php
    session_start();
    include 'config.php';    
    $ID= $_SESSION['admin_ID'];
    $sql=mysqli_query($conn,"SELECT * FROM user_admin where admin_ID='$ID' ");
    $row  = mysqli_fetch_array($sql);
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
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome
                    <?php echo $row['admin_Username'];?>
                    !</h3>
                  <h6 class="font-weight-normal mb-0"><span class="text-primary"></span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <!--<div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>-->
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <?php
                        $query = "SELECT Cluster_ID FROM cluster ORDER BY Cluster_ID";  
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<p class="mb-4">Number of Clusters</p> 
                        <p class="fs-30 mb-2">'.$row.'</p>';
                        
                      ?>  
                      

                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                    <?php
                        $query = "SELECT Org_ID FROM organization ORDER BY Org_ID";  
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<p class="mb-4">Number of Organizations</p> 
                        <p class="fs-30 mb-2">'.$row.'</p>';
                        
                      ?>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                    <?php
                        $query = "SELECT ID FROM user_registration WHERE user_status=0";  
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<p class="mb-4">Pending Users</p> 
                        <p class="fs-30 mb-2">'.$row.'</p>';
                        
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                    <?php
                        $query = "SELECT Event_ID FROM event WHERE Event_Status=0";  
                        $query_run = mysqli_query($conn, $query);
                        $row = mysqli_num_rows($query_run);
                        echo '<p class="mb-4">Pending Events</p> 
                        <p class="fs-30 mb-2">'.$row.'</p>';
                        
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <!--<div class="d-flex">
                     
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
            
          </div>

<div class="col-md-12 grid-margin">
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
                <td>  <button type ="button" class= "btn btn-success" user_id="<?php echo $row["ID"]; ?>"><?php echo $status ?> </button></td>
                <td>
                <button type ="button" class= "btn btn-success editbtnU" user_id="<?php echo $row["ID"]; ?>"> Approve </button>
                    
                <button type ="button" class= "btn btn-danger deletebtnU" user_id="<?php echo $row["ID"]; ?>"> Decline </button>
                  
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




          <?php
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


  
    $sql2= "SELECT * FROM ((event INNER JOIN user_registration ON event.OrgOfficer_ID=user_registration.ID) INNER JOIN organization ON event.OrgID=organization.Org_ID) WHERE event.Event_Status=0 limit $start_from,$num_per_page"; 

    
?>
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
              
              $res = $conn->query($sql2);
              $count=0;
              if($res->num_rows>0){
                echo " <thead>
          <tr>

            <th>Organization</th>
            <th>Details</th>
            <th>Officer</th>
            <th> Status</th>
            <th>Actions</th>

          </tr>
        </thead>"; 
                while($row = $res->fetch_assoc()){
                $id= $row['Event_ID'];
                $check_stat=$row['Event_Status'];

                if($check_stat== 0){
                    $status="Pending";
                  };
              echo"<tr id='decline'",$id,">";

              echo "<td>".$row['Org_Name']."</td>";
              echo "<td>"."<a href=../event-calendar/vieweventsout.php?eventID=",$id,"><button class='btn btn-primary btn-sm'>See Details</button></a>"."</td>";
              echo "<td>".$row['first_name']. "&nbsp" .$row['last_name']."</td>";
               echo "<td>"."<button type ='button' class='btn btn-success' eID='",$id,"'>".$status."</button>"."</td>";
              echo "<td>"."<button type ='button' class='btn btn-success editbtnE' eID='",$id,"'>"."Approve"."</button>"
                          ."&nbsp"."<button type ='button' class='btn btn-danger deletebtnE' eID='",$id,"'>"."Decline"."</button>"."</td>";
            echo"</tr>";
$count++;}

}
else
{
    echo "No Pending Events....";
}
?>
</table>

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
</div>
</div>

<!--modals -->
<div id="viewdetailsModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action = "" method= "POST" enctype="multipart/form-data">
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
   <!-- USER VERIFICATION-->
   <script>
     $('.deletebtnU').click(function(){
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
        $('.editbtnU').click(function(){
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

<!-- EVENTS -->

<script>
  $(document).ready(function(){
        $('.editbtnE').click(function(){
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


    $('.deletebtnE').click(function(){
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


