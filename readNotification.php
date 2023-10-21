<?php

include("config.php");

$id = (isset($_GET['id']) ? $_GET['id'] : '');

$sql = "UPDATE notification SET notif_status='1' WHERE ID = '".$id."'";

$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Notification UI Design</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<section class="section-50">
  <div class="container">
    <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>
    <div class="notification-ui_dd-content">
      <div class="notification-list notification-list--unread">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/user1.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Aryan</b> reacted to your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random1.jpg" alt="Feature image"> </div>
      </div>
      <div class="notification-list notification-list--unread">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/userr.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Raj Kumar</b> liked your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random2.jpg" alt="Feature image"> </div>
      </div>
      <div class="notification-list notification-list--read">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/userr2.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Rakesh</b> reacted to your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random3.jpg" alt="Feature image"> </div>
      </div>
      <div class="notification-list notification-list--read">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/userb.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Bittu</b> reacted to your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random4.jpg" alt="Feature image"> </div>
      </div>
      <div class="notification-list notification-list--unread">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/userp.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Prince</b> reacted to your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random3.jpg" alt="Feature image"> </div>
      </div>
      <div class="notification-list notification-list--read">
        <div class="notification-list_content">
          <div class="notification-list_img"> <img src="images/users/user1.jpg" alt="user"> </div>
          <div class="notification-list_detail">
            <p><b>Adi Shots</b> reacted to your post</p>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde, dolorem.</p>
            <p class="text-muted"><small>10 mins ago</small></p>
          </div>
        </div>
        <div class="notification-list_feature-img"> <img src="images/features/random2.jpg" alt="Feature image"> </div>
      </div>
    </div>
    <div class="text-center"> <a href="#" class="btn btn-success">Load more activity</a> </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>