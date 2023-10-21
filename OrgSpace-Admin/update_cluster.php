<?php
session_start();
include '..\config.php';

if(isset($_POST['submit']) && isset($_FILES['file'])) {

    $img_name = $_FILES['file']['name'];
    $img_size = $_FILES['file']['size'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if ($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry, your file is too large.";
            header("Location: clusters.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 
                if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'logo_uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $clusterid = $_POST['cluster_id'];      
			   	$CName = $_POST['ClusterName'];
			   	$CDescription = $_POST['ClusterDescription'];
			   	$CHead = $_POST['ClusterHead'];
                // Insert into Database

 				$sql = "UPDATE cluster SET Cluster_Name = '$CName', Cluster_Description = '$CDescription', Cluster_Head = '$CHead', Cluster_Logo = '$new_img_name' WHERE Cluster_ID = $clusterid ";
                mysqli_query($conn, $sql);
                header("Location: clusters.php");
                }else {
                $em = "You can't upload files of this type";
                header("Location: clusters.php?error=$em");
            }
        }
    }else {
                $clusterid = $_POST['cluster_id'];      
			   	$CName = $_POST['ClusterName'];
			   	$CDescription = $_POST['ClusterDescription'];
			   	$CHead = $_POST['ClusterHead'];
                // Insert into Database

 				$sql = "UPDATE cluster SET Cluster_Name = '$CName', Cluster_Description = '$CDescription', Cluster_Head = '$CHead' WHERE Cluster_ID = $clusterid ";
                mysqli_query($conn, $sql);
                header("Location: clusters.php");
    }

}else {
            $em = "unknown error occurred!";
            die("Connection failed: " . $conn->connect_error);
}

?>