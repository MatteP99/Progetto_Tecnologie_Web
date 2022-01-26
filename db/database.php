<?php
//Class used to interrogate the db
class DatabaseHelper {
	private $db;
	
	public function __construct($servername, $username, $password, $dbname, $port) {
		//Connection db
		$this->db = new mysqli($servername, $username, $password, $dbname, $port);
		//Check connection
		if($this->db->connect_error) {
			die("Connection failed!");
		}
	}
	
	public function getFood() {
		$statement = $this->db->prepare("SELECT * FROM cibo");
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
}
?> 