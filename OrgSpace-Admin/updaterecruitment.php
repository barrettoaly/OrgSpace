<?php
session_start();
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "orgspace";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}

if(isset($_POST['submit'])){

    
    $file = $_FILES['file'];

    $num_of_imgs = count($file['name']); //Number of images

    for ($i=0; $i < $num_of_imgs; $i++) { 
    	
    	
    	$image_name = $file['name'][$i];
    	$tmp_name   = $file['tmp_name'][$i];        //get the image info and store them in var
    	$error      = $file['error'][$i];

    	                                            //if there is not error occurred while uploading
    	if ($error === 0) {
    		
    		
    	$img_ex = pathinfo($image_name, PATHINFO_EXTENSION); //get image extension store it in var

			$img_ex_lc = strtolower($img_ex); //convert the image extension into lower case and store it in var 
        
			$allowed_exs = array('jpg', 'jpeg', 'png'); // crating array that stores allowed to upload image extensions.

			/* 
			check if the the image extension 
			is present in $allowed_exs array
			**/

			if (in_array($img_ex_lc, $allowed_exs)) {
				
				$new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc; //renaming the imgs
                
                //crating upload path on root directory
        $img_upload_path = 'logo_uploads/'.$new_img_name;
        $recid = $_POST['rec_id'];            
        $CName = $_POST['ClusterName'];
        $OrgName = $_POST['OrgName'];
        $RDescription = $_POST['recdescrip'];
        $position = $_POST['position'];
        $status = $_POST['status'];
               


         $sql = "UPDATE recruitment_detail SET Cluster_Name = '$CName', Organization_Name = '$OrgName', Recruitment_Descrip = '$RDescription', 
         Position = '$position', R_Status = '$status',  R_Status = '$status', OrgPic = ? WHERE recruitment_ID = $recid ";

               

         $stmt = $conn->prepare($sql);
         $stmt->execute([$new_img_name]);

         //move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);

		    	//redirect to 'organizations.php'
	            header("Location: clusters.php");
                

            

			}else {
				# error message
    	     	$em = "You can't upload files of this type";

	    		/*
		    	redirect to 'organizations.php' and 
		    	passing the error message
		        */

	            header("Location: clusters.php?error=$em");
			}

   
    	}else {
    		# error message
    		$em = "Unknown Error Occurred while uploading";

    		/*
	    	redirect to 'organizations.php' and 
	    	passing the error message
	        */

	        header("Location: clusters.php?error=$em");
    	}
    }	
}

?>






	
		