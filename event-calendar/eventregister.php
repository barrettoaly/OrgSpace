<?php
include ('db_connect.php');
session_start();

$uid=$_SESSION['ID'];
$eid=0;
$ename=" ";
if(isset($_POST['eID'])){
	$eid=$_POST['eID'];
	$oid=$_POST['oID'];
	$ename=$_POST['eName'];

$sql1="SELECT * FROM participant WHERE Event_ID='$eid' AND User_ID='$uid'";
$result=mysqli_query($conn, $sql1);

		if(mysqli_num_rows($result)>0){
			echo 1;
			exit;
		}
		else{
			 $sql=mysqli_query($conn,"SELECT Org_Name FROM organization where Org_ID='$oid' ");
  			$row  = mysqli_fetch_array($sql);
  				$orgname=$row['Org_Name'];
				$query = "INSERT INTO participant(Event_ID,Event_Name, OrgID, Org_Name, User_ID, Status) VALUES ('$eid','$ename','$oid','$orgname' ,'$uid', '0')";
    			$results=mysqli_query($conn,$query);
    			echo 0;
    			exit;

		}
}
  echo 0;
  echo "errpr;";
  exit;

?>