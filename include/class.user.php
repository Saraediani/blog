<?php 
	include "db_config.php";

	class User extends DB_con {
		// protected $db;
		// public function __construct(){
		// 	$this->db = new DB_con();
		// 	$this->db = $this->db->ret_obj();
		// }
		
		/*** for registration process ***/
		
		public function reg_user($name,$username,$password,$email){
			//echo "k";
			
			$password = md5($password);

			//checking if the username or email is available in db
			$query = "SELECT * FROM users WHERE uname='$username' OR uemail='$email'";
			
			$result = $this->db->query($query) or die($this->db->error);
			
			$count_row = $result->num_rows;
			
			//if the username is not in db then insert to the table
			
			if($count_row == 0){
				$query = "INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
				
				$result = $this->db->query($query) or die($this->db->error);
				
				return true;
			}
			else{
				return false;
			}
			
		}
			
			
	/*** for login process ***/
	public function check_login($emailusername, $password){
        $password = md5($password);
		
		$query = "SELECT id from users WHERE email='$emailusername' and password='$password'";
		
		$result = $this->db->query($query) or die($this->db->error);

		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		$count_row = $result->num_rows;
		
		if ($count_row == 1) {
			session_start();
	            $_SESSION['login'] = true; // this login var will use for the session thing
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
			
		else{
			return false;
		}
		
	}
	
	
	public function get_fullname($uid){
		$query = "SELECT fullname FROM users WHERE uid = $uid";
		
		$result = $this->db->query($query) or die($this->db->error);
		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		echo $user_data['fullname'];
		
	}
	
	/*** starting the session ***/
	public function get_session(){
	    if(isset($_SESSION['login'])){
			return $_SESSION['login'];
		}else{
			return false;
		}
	}

	public function user_logout() {
		session_start();
	    $_SESSION['login'] = FALSE;
		unset($_SESSION);
	    session_destroy();
		return true;
	}
	
	
	
	
	
	
	
	
	
}