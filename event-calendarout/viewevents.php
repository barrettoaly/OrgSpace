<?php 
include('header.php');
include ('db_connect.php');
session_start();
$eID=$_GET['eventID'];

 $query = mysqli_query($conn,"SELECT * FROM event where Event_ID = '".$eID."'" );

            $check_event = mysqli_num_rows ($query) > 0;

            if($check_event){
                while ($row = mysqli_fetch_array($query))
                {
                	$_SESSION['Event_ID']=$row['Event_ID'];




?>
<title>OrgSpace</title>
<link rel="shortcut icon" href="../images/OrgSpace_LOGO_Final.png" />
<link rel="stylesheet" href="css/calendar.css">
<link rel="stylesheet" href="css/button.css">

</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top" style="background: #060297; ">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="nav navbar-nav" href="#"><img src="..\OrgSpace_LOGO_Final_White.png" style="width:80px; height: 80px;" alt="OrgSpace"></a>
        </div>
        <div class="navbar-collapse collapse" style="background: #060297; ">
          <ul class="nav navbar-nav">
            <li><a style="color:white; font-size:20px" href="index.php">Calendar of Events</a></li>
           
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
<div class="container">		
	<img src = "../officer_dashboard/event_banners/<?php echo $row['Event_Banner']; ?>" width="100%" height="315px" alt= "Event Banner">
	<div class="page-header">
		<div class="pull-right form-inline">
		</div>
		<small></small>
	</div>

	<div class="row">
		<div class="col-md-9">
			<h2 align="center"><?php echo $row['Event_Name']?></h2>
			<h6 style="  font-size: 30px;
 				font-family:'Poppins',sans-serif;
  				font-weight: 10px;">About the event</h6><p align="justify"><?php echo $row['Event_Descrip']?></p>

				<p align="justify">Nunc malesuada euismod neque, quis tincidunt magna hendrerit id. Quisque vitae tellus dolor. Donec finibus enim vel lectus tincidunt congue. Vestibulum malesuada massa augue. Curabitur egestas, purus quis auctor tincidunt, elit purus viverra eros, ac hendrerit ex arcu bibendum felis. Sed et dui fermentum, accumsan orci quis, hendrerit sapien. Sed commodo felis pulvinar justo volutpat rutrum. Nam cursus iaculis lacus vitae ultrices.</p>
  				<br>
			<h6 style="  font-size: 30px;
 				font-family:'Poppins',sans-serif;
  				font-weight: 10px;
  				padding-bottom: 5px;">Date and Time</h6>
  			<h6 style="  font-size: 20px;
 				font-family:'Poppins',sans-serif;
  				font-weight: 10px;">Starts</h6>
			<p><?php $sdateandtime=DateTime::createFromFormat('Y-m-d H:i:s', $row['Event_SDnT']); echo $sdateandtime->format('l, jS \of F Y, h:i A');?></p>
			<h6 style="  font-size: 20px;
 				font-family:'Poppins',sans-serif;
  				font-weight: 10px;">Ends</h6>
  			<p><?php $sdateandtime=DateTime::createFromFormat('Y-m-d H:i:s', $row['Event_EDnT']); echo $sdateandtime->format('l, jS \of F Y,  h:i A');?></p>
			<br>
			<h6 style="  font-size: 30px;
 				font-family:'Poppins',sans-serif;
  				font-weight: 10px;">Venue</h6>
			<p><?php echo $row['Event_Type'] ?> </p>
			<h5></h5>
			<br>
			<br>
<?php
		if($row['Event_Status']==1){
													echo	"<a href='../registration.php'><button class='btn btn-outline-primary register' style='font-size: 15px; width:100%;' name='submit' eID='",$eID,"'>"."Register"."</button></a>";
							}
							else{
									echo "This event is not receiving participants yet.";}
			echo "</div>";

                     }

            }else{


                echo "No events at this moment!";
            }


        ?>
		<div class="col-md-3">
			<h4>All Events List</h4>
			<ul id="eventlist" class="nav nav-list"></ul>
		</div>
	</div>	
	<div style="margin:50px 0px 0px 0px;">	
	</div>
</div>
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">            
          <h4 class="modal-title">Your registration is still pending..</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">          

        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" name="submit" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/query.min.js"></script>
<?php include('footer.php');?>
