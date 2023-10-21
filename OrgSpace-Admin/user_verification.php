<?php
include 'config.php';
$userid = 0;
if(isset($_POST['user_id'])){
$userid=$_POST['user_id'];
}
if($userid > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM user_registration WHERE ID=".$userid);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "UPDATE  user_registration SET user_status=1 WHERE ID =".$userid;
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