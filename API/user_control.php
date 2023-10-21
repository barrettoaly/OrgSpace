<?php

include_once 'connection.php';
	
	class User {
		
		private $db;
		private $connection;
		
		function __construct() {
			$this -> db = new DB_Connection();
			$this -> connection = $this->db->getConnection();
		}
		
		public function does_user_exist($username,$password)
		{
			$query = "SELECT * FROM user_registration WHERE username='$username' AND user_password='$password'";
			$result = mysqli_query($this->connection, $query);

			if(mysqli_num_rows($result)>0){
				$json['success'] = ' Welcome '.$username;
				echo json_encode($json);
				mysqli_close($this -> connection);

			} 
            
            else
            {
                $json['error'] = 'Incorrect Username or Password';
                echo json_encode($json);   
		} 


        
    }
		
	}
	
	
	$user = new User();
	if(isset($_POST['username'],$_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(!empty($username) && !empty($password)){
			
			$encrypted_password = md5($password);
			$user -> does_user_exist($username,$password);
			
		}else{
            $json['error'] = 'You must fill both fields';
            echo json_encode($json);
		}
		
	}














?>