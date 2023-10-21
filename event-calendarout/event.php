<?php
include_once("db_connect.php");
session_start();
$sqlEvents = "SELECT * FROM event LIMIT 20";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	date_default_timezone_set('Asia/Manila');
	$start = strtotime($rows['Event_SDnT']) * 1000;
	$end = strtotime($rows['Event_EDnT']) * 1000;
	$id=$rows['Event_ID'];	
	$_SESSION['Event_ID']=$id;
	$calendar[] = array(
        'id' =>$_SESSION['Event_ID'],
        'title' => $rows['Event_Name'],
        'url' => 'viewevents.php?eventID='.$rows['Event_ID'],
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$_SESSION['event']=$calendar;
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>