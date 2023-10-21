<?php
session_start();
include 'config.php';

if (isset($_POST['save'])) {


    $uname = ($_POST['username']);
    $pass = ($_POST['password']);

        $sql = "SELECT * FROM user_admin WHERE admin_Username='$uname' AND admin_Password='$pass'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['admin_Username'] === $uname && $row['admin_Password'] === $pass) {
                $_SESSION["admin_ID"] = $row['admin_ID'];
                $_SESSION["admin_FullName"]=$row['admin_FullName'];
                
                header('Location: ../OrgSpace-Admin/orgspaceadmin.php');
                exit();
            }          
        }
    }
?>