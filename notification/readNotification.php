<?php

include("../config.php");
session_start(); 

$id = (isset($_GET['id']) ? $_GET['id'] : '');

$sql = "UPDATE notification SET notif_status='1' WHERE ID = '".$id."'";

$res = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> OrgSpace Notifications</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="../OrgSpace_LOGO_Final.png" />
		
</head>

<style>
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 8%;margin-top: -30px;margin-left: 160px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}

</style>

<body>
<section class="section-50">


  <div class="container">

  <?php 

  $id = $_SESSION['ID'];
  
  $sql = "SELECT * FROM notification  WHERE notif_status= '1' AND ID= $id ORDER BY notif_date DESC";
	$res = mysqli_query($conn, $sql); 
	$totalRows=mysqli_num_rows($res);
					
					?>

          <button class="arrow left"> <a href ="../index_in.php#home">
                        <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                        45.63,75.8 0.375,38.087 45.63,0.375 "/>
                        </svg>  </a>
          </button>

          
    <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>
   
        <?php
      if (mysqli_num_rows($res) > 0) {
        foreach ($res as $item) {
      ?>
    <div class="notification-ui_dd-content">
      <div class="notification-list notification-list--unread">
        <div class="notification-list_content">

          <div class="notification-list_img"> <img src="../OrgSpace_LOGO_Final.png" alt="user"> </div>


          <div class="notification-list_detail">
          <?php 
            if ($item["notiftype"]=='Confirmation') {
            
            echo "<h6 style='font-weight:bold;'>The ".$item['Org_Name']." have confirmed your participation in the ".$item['notif_topic']."! Please wait for ".$item['Org_Name']." to contact you for further details. Thank you! </h6>";

          } else if ($item["notiftype"]=='ConfirmationApplicant'){
           
            echo "<h6 style='font-weight:bold;'> The ".$item['Org_Name']." have confirmed your ".$item['notif_topic']." application! Please wait for ".$item['Org_Name']." to contact you for further details. Thank you! </h6>";
            
          } else if ($item["notiftype"]=='DeclineParticipant'){
           
            echo "<h6 style='font-weight:bold;'> The ".$item['Org_Name']." have declined your participation in the ".$item['notif_topic']."!</h6>";
            
          } else if ($item["notiftype"]=='DeclineApplicant'){
            
            echo "<h6 style='font-weight:bold;'> The ".$item['Org_Name']." have declined your ".$item['notif_topic']."application!</h6>";
           
          } 
          ?>

		    <p class="text-gray ellipsis mb-0"> <?php echo $item['notif_date']; ?> </p>
          </div>
        </div>

        
      </div>
      <?php }?>	
      <?php }else {?>	
    
		  <img src = "../images/empty_notif.png" height="500px" width="300px" 
		  style ="display: block; margin-left: auto;margin-right: auto; width: 70%;">
      <br>
			<p class="text-danger text-center" style="font-weight:bold; font-size: 27px;" > You don't have any  notifications!</p>

      <?php }?>	
    </div>
  
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>