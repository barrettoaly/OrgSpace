<?php
include 'config.php';

$firstname=$_POST['first_name'];
$lastname=$_POST['last_name'];
$email=$_POST['Email'];
$position=$_POST['Position'];
$username=$_POST['Username'];
$password=$_POST['Password'];
$password=md5($password);

$sql = "INSERT INTO user_admin (admin_FirstName, admin_LastName, admin_Email, admin_Position, admin_Username, admin_Password)
VALUES ('$firstname','$lastname','$email', '$position', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>