<?php 
include('header.php');
session_start();
?>

<style>

.card {border: none;}
.card:hover{box-shadow: 0px 10px 10px #060297;}
button { -webkit-appearance: none;background: transparent;border: 0;outline:0;}
svg { padding: 5px;}
.arrow {cursor: pointer;position: absolute;top: 18%;margin-top: -55px;margin-left: 300px;width: 40px;height: 40px;}
.left {left: 5%;}
.left:hover polyline,.left:focus polyline { stroke-width: 3;}
.left:active polyline {stroke-width: 6;transition: all 100ms ease-in-out;}
polyline {transition: all 250ms ease-in-out;}

</style>


<title>OrgSpace</title>
<link rel="shortcut icon" href="../images/OrgSpace_LOGO_Final.png" />
<link rel="stylesheet" href="css/calendar.css">
<?php include('container.php');?>
<div class="container">	
						<button class="arrow left"> <a href ="../index.php#events">
                        <svg width="40px" height="40px" viewBox="0 0 50 80" xml:space="preserve">
                        <polyline fill="none" stroke="#060297" stroke-width="10" stroke-linecap="round" stroke-linejoin="round" points="
                        45.63,75.8 0.375,38.087 45.63,0.375 "/>
                        </svg>  </a>
                        </button>
					<h2> &nbsp; &nbsp; &nbsp; Calendar of Events</h2>	


	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-outline-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn btn-secondary" data-calendar-nav="today">Today</button>
				<button class="btn btn-outline-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-outline-secondary" data-calendar-view="year">Year</button>
				<button class="btn btn-secondary" data-calendar-view="month">Month</button>
				<button class="btn btn-outline-secondary" data-calendar-view="week">Week</button>
				<button class="btn btn-outline-secondary" data-calendar-view="day">Day</button>
			</div>
		</div>
		<h3></h3>
		<small></small>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div id="showEventCalendarOut"></div>
		</div>
		<div class="col-md-3">
			<h4>All Events List</h4>
			<ul id="eventlistout" class="nav nav-list"></ul>
		</div>
	</div>	
	<div style="margin:50px 0px 0px 0px;">	
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<script src="../vendors/base/vendor.bundle.base.js"></script>
<script src="../vendors/owl.carousel/js/owl.carousel.js"></script>
<script src="../vendors/aos/js/aos.js"></script>
<script src="../vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
<script src="../js/template.js"></script>  
<?php include('footer.php');?>
