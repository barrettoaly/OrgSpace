<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['Org_ID'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql1= mysqli_query($conn,"SELECT * FROM cluster");


/*$sql = "SELECT * FROM organization WHERE Org_ID = '".$_POST["Org_ID"]."'";  */
$sql= "SELECT * FROM organization INNER JOIN cluster ON cluster.Cluster_ID = organization.Cluster_ID WHERE Org_ID = '".$_POST["Org_ID"]."'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);

    echo "
                <div class = 'user-details'>
                <input type='hidden' name='org_id' value='".$row['Org_ID']."'>  
                <div class='form-group'>
                <label>Cluster Name</label> 
                      <div class= 'select'>
                    <select name='ClusterID' id='ClusterID'>
                    <option selected='selected' value='".$row['Cluster_ID']."'>".$row['Cluster_Name']."</option>";

                    while($value=mysqli_fetch_assoc($sql1)){
                        echo "<option value='".$value['Cluster_ID']."'>". $value['Cluster_Name']."</option>";
                    }


    echo "                </select>
                    </div>
             </div>
                <div class='form-group'>
                    <label> Organization Name </label>
                    <input type='text' name='OrgName' value='".$row['Org_Name']."' class='form-control' required>
                </div>
                
                <div class='form-group'>
                    <label>Organization Description</label>
                    <textarea  name='OrgDescription' class='form-control' required> ".$row['Org_Description']."</textarea>
                </div> 
            
                
                <div class='form-group'>
                    <label>Organization Moderator</label>
                    <input type='text' name='OrgModerator' class='form-control' value='".$row['Org_Moderator']."' required>
                </div>
               
                
                <div class='form-group'>
                    <label>President</label>
                    <input type='text' name='OrgPresident' class='form-control' value='".$row['Org_President']."' required>
                </div>
                <div class='form-group'>
                    <label>Vice-President</label>
                    <input type='text' name='OrgVicePresident' class='form-control' value='".$row['Org_VicePresident']."'>
                </div> 
                <div class='form-group'>
                    <label>Organization Logo</label>
                    <img src='logo_uploads/".$row['Org_Logo']."' 
                    style='height:250px;width:250px;text-align:Center line-height: 1.25; margin: 0 0 10px;'>
                    <input type='file' name='o_file' class='form-control'>
                </div>
                </div>
               ";
   
     
    mysqli_close($conn);
}

?>

<!-- VIEW DESCRIPTION ON LIST OF ORGANIZATION -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['Org_descrip'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql1= mysqli_query($conn,"SELECT * FROM cluster");


$sql= "SELECT * FROM organization INNER JOIN cluster ON cluster.Cluster_ID = organization.Cluster_ID WHERE Org_ID = '".$_POST["Org_descrip"]."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
 
    $output .= "
                
                
                <div class='form-group'>
                    <label><b>".$row['Org_Name']." </b></label>
                    <p name='ClusterDescription' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Org_Description"]."</p>
                </div> 
            
                
              
                
               
                ";
                
        
     }
    echo $output;
   
     
    mysqli_close($conn);
}

?>

<!-- VIEW DESCRIPTION ON LIST OF CLUSTERS -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['cluster_descrip'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql= "SELECT * FROM cluster WHERE Cluster_ID = '".$_POST["cluster_descrip"]."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
 
    $output .= "
                
                
                <div class='form-group'>
                    <label><b>".$row['Cluster_Name']."</b></label>
                    <p name='ClusterDescription' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Cluster_Description"]."</p>
                </div> 
            
                
              
                
               
                ";
                
        
     }
    echo $output;
   
     
    mysqli_close($conn);
}

?>

<!-- edit clusters -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['Cluster_ID'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql= "SELECT * FROM cluster WHERE Cluster_ID = '".$_POST["Cluster_ID"]."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
 
    $output .= "
                <div class = 'user-details'> 
                <input type='hidden' name='cluster_id' value='".$row['Cluster_ID']."'>
                     
                <div class='form-group'>
                    <label>Cluster Name</label>
                    <input type='text' name='ClusterName' id='ClusterName' class='form-control' value='".$row['Cluster_Name']."' required>
                </div>

                <div class='form-group'>
                    <label>Cluster Description</label>
                    <textarea class='form-control' name='ClusterDescription' id='ClusterDescription' required> ".$row['Cluster_Description']." </textarea>
                </div>

                <div class='form-group'>
                    <label>Cluster Head</label>
                    <input type='text' name='ClusterHead'  id='ClusterHead' value='".$row['Cluster_Head']."' class='form-control' required>
                </div>

                <div class='form-group'>
                    <label>Cluster Logo</label>
                    <img src='logo_uploads/".$row['Cluster_Logo']."' 
                    style='height:250px;width:330px;text-align:Center line-height: 1.25; margin: 0 0 10px;'>
                    <span>".$row['Cluster_Logo']." </span>
                    <input type='file' name='file' class='form-control'>
                </div>
                </div>
 
                ";
                
        
     }
    echo $output;
   
     
    mysqli_close($conn);
}

?>



<!-- VIEW MODERATOR AND OFFICERS -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['Org_viewmodandoff'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql= "SELECT * FROM organization WHERE Org_ID = '".$_POST["Org_viewmodandoff"]."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
 
    $output .= "
   
                <div class='form-group'>
                    <label><b> Moderator </b></label>
                    <p name='ClusterDescription' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Org_Moderator"]."</p>
                </div> 
                <div class='form-group'>
                    <label><b> President </b></label>
                    <p name='OrgPresident' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Org_President"]."</p>
                </div> 
                <div class='form-group'>
                    <label><b> Vice-President </b></label>
                    <p name='OrgVicePresident' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Org_VicePresident"]."</p>
                </div> 
                <div class='form-group'>
                    <label><b> Social Media Page </b></label>
                    <p name='OrgVicePresident' style= 'text-align: justify;
                    text-justify: inter-word;'> ".$row["Org_ActiveSocMedAcc"]."</p>
                </div> 
                
              
                
               
                ";
                
        
     }
    echo $output;
   
     
    mysqli_close($conn);
}

?>

 <!-- VIEW USER REG DETAILS -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orgspace";

if (isset( $_POST['user_details'])){
$output ='';
$conn = mysqli_connect($servername, $username, $password, $dbname);


$sql= "SELECT * FROM user_registration INNER JOIN organization ON user_registration.OrgID = organization.Org_ID WHERE ID = '".$_POST["user_details"]."'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {

    if($row["studentorgofficer"]=='orgofficer'){
 
    $output .= "
                        <div class='user-details'>
                        <div class='input-box'>
                            <label class= 'details'><b> Organization Name </b></label>
                            <p name='Age' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["Org_Name"]."</p>
                        </div> 
                        <div class='input-box'>
                            <label class= 'details'><b> Position </b></label>
                            <p name='Gender' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["orgposition"]."</p>
                        </div> 
                        <div class='input-box'>
                            <label class= 'details'><b> Email Address </b></label>
                            <p name='Age' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["email_add"]."</p>
                        </div> 
                        <div class='input-box'>
                            <label class= 'details'><b> Gender </b></label>
                            <p name='Gender' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["gender"]."</p>
                        </div> 
                        <div class='input-box'>
                            <label class= 'details'><b> Course </b></label>
                            <p name='Course' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["course"]."</p>
                        </div> 
                        <div class='input-box'>
                            <label class= 'details'><b> Year </b></label>
                            <p name='OrgVicePresident' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["course_year"]."</p>
                        </div>  
                        </div>
                        <div class='input-box'>
                        <label class= 'details'> <b> ID Picture</label>
                            <img src='../uploads/".$row["form_and_id"]."' 
                            style='height:250px;width:330px;text-align:Center line-height: 1.25; margin: 0 0 10px;'>
                        </div>
              
                
               
                ";
            }
            else{

                 $output .= "

                        <div class='user-details'>
                        <div class='input-box'>
                            <label class= 'details'><b> Email Address </b></label>
                            <p name='Age' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["email_add"]."</p>
                            </div>
                        <div class='input-box'>
                            <label class= 'details'><b> Gender </b></label>
                            <p name='Gender' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["gender"]."</p>
                            </div>
                        <div class='input-box'>    
                            <label class= 'details' ><b> Course </b></label>
                            <p name='Course' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["course"]."</p>
                            </div>
                        <div class='input-box'>    
                            <label class= 'details'><b> Year </b></label>
                            <p name='OrgVicePresident' style= 'text-align: justify;
                            text-justify: inter-word;'> ".$row["course_year"]."</p>
                            </div>
                            </div>
                        <div class='input-box'>
                        <label class= 'details' > <b> ID Picture</label>
                            <img src='../uploads/".$row["form_and_id"]."' 
                            style='width:250px;text-align:Center line-height: 1.25; margin: 0 0 10px;'>
                        </div>
              ";
                
        
            }
        }
    echo $output;
   
     
    mysqli_close($conn);
}

?>

 <!-- VIEW EVENT DETAILS -->
        

                    

           
          
            

            

           

            

                    

           
          
            

            