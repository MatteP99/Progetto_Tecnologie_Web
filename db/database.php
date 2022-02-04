<?php
//Class used to interrogate the db
class DatabaseHelper {
	private $db;
	
	//Connection db
	public function __construct($servername, $username, $password, $dbname, $port) {
		$this->db = new mysqli($servername, $username, $password, $dbname, $port);
		if($this->db->connect_error) {
			die("Connection failed!");
		}
	}
	
	//Function get foods types
	public function getFoodTypes() {
		$statement = $this->db->prepare("SELECT types.* FROM types");
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function get foods
	public function getFood() {
		$statement = $this->db->prepare("SELECT food.* FROM food");
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//------Functions for admin------
	//Function modifyFood
	public function modifyFood($idFood, $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity) {
		$statement = $this->db->prepare("UPDATE food
										SET food.name = ?, food.description = ?, food.price = ?, food.img = ?, food.type = ?, food.quantity = ?
										WHERE food.id_food = ?");
		$statement->bind_param("issfsii", $idFood, $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function deleteFood
	public function deleteFood($idFood) {
		$statement = $this->db->prepare("DELETE FROM food WHERE food.id_food = ?");
		$statement->bind_param("i", $idFood);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function addFood
	public function addFood($foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity) {
		$statement = $this->db->prepare("INSERT INTO food (name, description, price, img, type_fodd, quantity)
										VALUES (?, ?, ?, ?, ?, ?)");
		$statement->bind_param("ssfsii", $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function login
	public function login($username, $password) {
		$statement = $this->db->prepare("SELECT users.id_user, users.username, users.password FROM users 
										WHERE users.username = ? AND users.password = ?");
		$statement->bind_param("ss", $username, $password);
		$statement->execute();
		$result = $statement->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?> 