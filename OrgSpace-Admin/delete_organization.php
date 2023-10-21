<?php

include 'config.php';

$uid = 0;
if(isset($_POST['uID'])){
$uid=$_POST['uID'];
}
if($uid > 0){
	
		$checkRecord = mysqli_query($conn,"SELECT * FROM organization WHERE Org_ID=".$uid);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM organization WHERE Org_ID=".$uid;
    mysqli_query($conn,$query);
    echo 1;
    exit;
  }else{
    echo 0;
    exit;
  }

echo 0;
exit;
          
		

}
?>