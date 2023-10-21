<?php
include ('db_connect.php');
session_start();

$uid=$_SESSION['ID'];
$eid=0;
if(isset($_POST['eID'])){
	$eid=$_POST['eID'];
	$oid=$_POST['oID'];

$sql1="SELECT * FROM participant WHERE Event_ID='$eid' AND User_ID='$uid'";
$result=mysqli_query($conn, $sql1);
		if(mysqli_num_rows($result)>0){
			echo 1;
			exit;
		}
		else{
			$query = "INSERT INTO participant(Event_ID,OrgID, User_ID, Status) VALUES ('$eid','$oid', '$uid', '0')";
    			$results=mysqli_query($conn,$query);
    			echo 0;
    			exit;

		}
}
  echo 0;
  exit;

?>