<?php
session_start();
include '..\config.php';

if(isset($_POST['submit']) && isset($_FILES['o_file'])) {

    $img_name = $_FILES['o_file']['name'];
    $img_size = $_FILES['o_file']['size'];
    $tmp_name = $_FILES['o_file']['tmp_name'];
    $error = $_FILES['o_file']['error'];

    if ($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry, your file is too large.";
            header("Location: organizations.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 
                if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'logo_uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

          $orgid = $_POST['org_id']; 
          $orgname = $_POST['OrgName'];      
          $orgdescrip = $_POST['OrgDescription'];
          $orgmoderator = $_POST['OrgModerator'];
          $orgpresident = $_POST['OrgPresident'];
          $orgvicepresident = $_POST['OrgVicePresident'];
          $clusterid = $_POST['ClusterID'];
                // Insert into Database

        $sql = "UPDATE organization SET Org_Name = '$orgname', Org_Description = '$orgdescrip', Org_Moderator = '$orgmoderator', Org_President = '$orgpresident', Org_VicePresident= '$orgvicepresident', Org_Logo = '$new_img_name', Cluster_ID='$clusterid' WHERE Org_ID = $orgid ";
                mysqli_query($conn, $sql);
                header("Location: organizations.php");
                }else {
                $em = "You can't upload files of this type";
                header("Location: organizations.php?error=$em");
            }
        }
    }else {
          $orgid = $_POST['org_id']; 
          $orgname = $_POST['OrgName'];      
          $orgdescrip = $_POST['OrgDescription'];
          $orgmoderator = $_POST['OrgModerator'];
          $orgpresident = $_POST['OrgPresident'];
          $orgvicepresident = $_POST['OrgVicePresident'];
          $clusterid = $_POST['ClusterID'];
                // Insert into Database

        $sql = "UPDATE organization SET Org_Name = '$orgname', Org_Description = '$orgdescrip', Org_Moderator = '$orgmoderator', Org_President = '$orgpresident', Org_VicePresident= '$orgvicepresident', Cluster_ID='$clusterid' WHERE Org_ID = $orgid ";
                mysqli_query($conn, $sql);
                header("Location: organizations.php");
    }

}else {
            $em = "unknown error occurred!";
            die("Connection failed: " . $conn->connect_error);
}

?>