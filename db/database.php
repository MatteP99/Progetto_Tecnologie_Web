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
		
		return $statement->insert_id;
	}
	
	//-----Functions for Login and Registration-----
	//Function getUser from Id
	public function getUser($idUser) {
		$statement = $this->db->prepare("SELECT users.* FROM users WHERE users.id_user = ?");
		$statement->bind_param("i", $idUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function getUser from username
	public function getUserFromName($usernameUser) {
		$statement = $this->db->prepare("SELECT users.username FROM users WHERE users.username = ?");
		$statement->bind_param("s", $usernameUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function getUser from username
	public function getUserFromMail($mailUser) {
		$statement = $this->db->prepare("SELECT users.email FROM users WHERE users.email = ?");
		$statement->bind_param("s", $mailUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function login
	public function login($username, $password) {
		$statement = $this->db->prepare("SELECT users.id_user, users.username, users.password, users.user_status FROM users 
										WHERE users.username = ? AND users.password = ?");
		$statement->bind_param("ss", $username, $password);
		$statement->execute();
		$result = $statement->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
    }
	
	//Function register
	public function register($name, $username, $password, $email, $phone, $address) {
		$statement = $this->db->prepare("INSERT INTO users (name, username, password, email, phone_num, address, email_uni, user_status)
										VALUES (?, ?, ?, ?, ?, ?, NULL, 'Cliente')");
		$statement->bind_param("ssssss", $name, $username, $password, $email, $phone, $address);
		$statement->execute();

		return $statement->insert_id;
    }
	
	//Function register student
	public function registerStudent($name, $username, $password, $email, $phone, $address, $unimail) {
		$statement = $this->db->prepare("INSERT INTO users (name, username, password, email, phone_num, address, email_uni, user_status)
										VALUES (?, ?, ?, ?, ?, ?, ?, 'Cliente-Studente')");
		$statement->bind_param("sssssss", $name, $username, $password, $email, $phone, $address, $unimail);
		$statement->execute();

		return $statement->insert_id;
    }
}
?> 