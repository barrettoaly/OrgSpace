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
 $stmt = $conn->prepare("SELECT * FROM organization WHERE Cluster_ID = '5' ORDER BY Org_Name ASC");



 //imgPath
$imgPath = 'http://172.16.14.155:80/OrgSpace/OrgSpace-Admin/logo_uploads/';

 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($Org_ID, $Org_Name, $Org_Description, $Org_Moderator, $Org_President,$Org_VicePresident, $Org_ActiveSocMedAcc,$Org_Logo,$Cluster_ID);
 
 $organizations = array(); 
 
            //traversing through all the result 
            while($stmt->fetch()){
                    $temp = array();
                    $temp['Org_ID'] = $Org_ID; 
                    $temp['Org_Name'] = $Org_Name; 
                    $temp['Org_Description'] = $Org_Description; 
                    $temp['Org_Moderator'] = $Org_Moderator; 
                    $temp['Org_President'] = $Org_President; 
                    $temp['Org_VicePresident'] = $Org_VicePresident;
                    $temp['Org_ActiveSocMedAcc'] = $Org_ActiveSocMedAcc;
                    $temp['Org_Logo'] = $imgPath.$Org_Logo; 
                    $temp['Cluster_ID'] = $Cluster_ID;

            array_push($organizations, $temp);
            }   
            
 //displaying the result in json format 
 echo json_encode($organizations, JSON_PRETTY_PRINT);



?>