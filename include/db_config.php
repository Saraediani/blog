<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'users');

class DB_con {
	protected $db;
	public function __construct(){
		$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
		
		if ($this->db->connect_error) die('Database error -> ' . $this->db->connect_error);
		
	}

	public function __distruct(){
		$this->db->close();
	}
	
	// function ret_obj(){
	// 	return $this->connection;
	// }

}