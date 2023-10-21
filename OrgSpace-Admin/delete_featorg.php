<?php

include 'config.php';

if(isset ($_POST['submit'])){
	
    $delete_id = $_POST['delete_id'];
	
		$sql = "UPDATE user_registration SET user_status=2 WHERE ID=".$delete_id;
        
		if ($conn->query($sql) === TRUE) {
            header("location: regverification.php");
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
		

}
?>