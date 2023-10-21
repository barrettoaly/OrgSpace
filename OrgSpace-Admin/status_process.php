<?php
include 'config.php';
$eid = 0;
if(isset($_POST['eID'])){
$eid=$_POST['eID'];
}
if($eid > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM event WHERE Event_ID=".$eid);
  $totalrows = mysqli_num_rows($checkRecord);



  if($totalrows > 0){
    // Delete record
    $query = "UPDATE event SET Event_Status=1 WHERE Event_ID=".$eid;
    mysqli_query($conn,$query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }
}

echo 0;
exit;

?>
