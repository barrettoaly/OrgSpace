<?php 
 

 //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'orgspace');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT * FROM cluster ");

 //imgPath
$imgPath = 'http://172.16.14.155:80/OrgSpace/OrgSpace-Admin/logo_uploads/';

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($Cluster_ID, $Cluster_Name, $Cluster_Description, $Cluster_Head, $Cluster_Logo);
 
 $clusters = array(); 
 
            //traversing through all the result 
            while($stmt->fetch()){
                    $temp = array();
                    $temp['Cluster_ID'] = $Cluster_ID; 
                    $temp['Cluster_Name'] = $Cluster_Name; 
                    $temp['Cluster_Description'] = $Cluster_Description; 
                    $temp['Cluster_Head'] = $Cluster_Head; 
                    $temp['Cluster_Logo'] = $imgPath.$Cluster_Logo; 

            array_push($clusters, $temp);
            }
            
 //displaying the result in json format 
 echo json_encode($clusters, JSON_PRETTY_PRINT);



?>