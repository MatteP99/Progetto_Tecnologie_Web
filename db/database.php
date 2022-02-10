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
	
	//Function get university
	public function getUni() {
		$statement = $this->db->prepare("SELECT university.* FROM university");
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function get university from user
	public function getUniUser($idUser) {
		$statement = $this->db->prepare("SELECT university.address FROM users 
										INNER JOIN university
										ON users.id_uni = university.id_uni
										WHERE users.id_user = ?");
		$statement->bind_param("i", $idUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function get users student mail
	public function getStudentMail($uniMail) {
		$statement = $this->db->prepare("SELECT users.email_uni FROM users WHERE users.email_uni = ?");
		$statement->bind_param("s", $uniMail);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function get user order
	public function getUserOrders($idUser) {
		$statement = $this->db->prepare("SELECT orders.id_order, orders.food_total_price, orders.data, orders.order_state FROM orders
										WHERE orders.id_user = ?");
		$statement->bind_param("i", $idUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function get user order list food
	public function getUserOrdersList($idUser) {
		$statement = $this->db->prepare("SELECT orders.id_order, food.name, list_food.food_quantity FROM orders
										INNER JOIN list_food
										ON orders.id_order = list_food.id_order
										INNER JOIN food
										ON list_food.id_food = food.id_food
										WHERE orders.id_user = ?");
		$statement->bind_param("i", $idUser);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function change user datas
	public function changeUserData($userId, $userPass, $userNum, $userAddress) {
		$statement = $this->db->prepare("UPDATE users
										SET users.password = ?, users.phone_num = ?, users.address = ?
										WHERE users.id_user = ?");
		$statement->bind_param("sssi", $userPass, $userNum, $userAddress, $userId);
		$statement->execute();
	}
	
	//Function remove quantity on food
	public function removeQuantityFood($idFood, $quantity) {
		$statement = $this->db->prepare("UPDATE food
										SET food.quantity = food.quantity - ?
										WHERE food.id_food = ?");
		$statement->bind_param("ii", $quantity, $idUser);
		$statement->execute();
	}
	
	//Function get quantity of a food
	public function getFoodQuantity($idFood) {
		$statement = $this->db->prepare("SELECT food.quantity WHERE food.id_food = ?");
		$statement->bind_param("i", $idFood);
		$statement->execute();
		$result = $statement->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//------Functions payment------
	//Create a new order
	public function createOrder($idUser) {
		$statement = $this->db->prepare("INSERT INTO orders (id_user) VALUES (?)");
		$statement->bind_param("i", $idUser);
		$statement->execute();
	}
	
	//Function get order id order
	public function getIdOrder() {
		$statement = $this->db->prepare("SELECT MAX(orders.id_order) FROM orders");
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function insert total price of the order
	public function insertTotalPrice($idOrder, $price) {
		$statement = $this->db->prepare("UPDATE orders
										SET orders.food_total_price = ?
										WHERE orders.id_order = ?");
		$statement->bind_param("di", $price, $idOrder);
		$statement->execute();
	}
	
	//Function get food price
	public function getFoodPrice($idFood) {
		$statement = $this->db->prepare("SELECT food.price FROM food WHERE food.id_food = ?");
		$statement->bind_param("i", $idFood);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function insert order
	public function insertListFood($orderNumber, $idFood, $foodQuantity) {
		$statement = $this->db->prepare("INSERT INTO list_food (id_order, id_food, food_quantity)
										VALUES (?, ?, ?)");
		$statement->bind_param("iii", $orderNumber, $idFood, $foodQuantity);
		$statement->execute();
	}
	
	//Function get food name
	public function getFoodName($idFood) {
		$statement = $this->db->prepare("SELECT food.name FROM food WHERE food.id_food = ?");
		$statement->bind_param("i", $idFood);
		$statement->execute();
		$result = $statement->get_result();
		
		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function change order status
	public function changeOrderStatus($idOrder) {
		$statement = $this->db->prepare("UPDATE orders
										SET orders.order_state = 'Annullato dal cliente'
										WHERE orders.id_order = ?");
		$statement->bind_param("i", $idOrder);
		$statement->execute();
	}
	
	//------Functions for admin------
	//Function modifyFood
	public function modifyFood($idFood, $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity) {
		$statement = $this->db->prepare("UPDATE food
										SET food.name = ?, food.description = ?, food.price = ?, food.img = ?, food.type_food = ?, food.quantity = ?
										WHERE food.id_food = ?");
		$statement->bind_param("ssdsiii", $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity, $idFood);
		$statement->execute();
	}
	
	//Function deleteFood
	public function deleteFood($idFood) {
		$statement = $this->db->prepare("DELETE FROM food WHERE food.id_food = ?");
		$statement->bind_param("i", $idFood);
		$statement->execute();
	}
	
	//Function addFood
	public function addFood($foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity) {
		$statement = $this->db->prepare("INSERT INTO food (name, description, price, img, type_food, quantity)
										VALUES (?, ?, ?, ?, ?, ?)");
		$statement->bind_param("ssdsii", $foodName, $foodDes, $foodPrice, $foodImg, $foodType, $foodQuantity);
		$statement->execute();
	}
	
	//Function create notify admin quantity 0
	public function createNotifyAdminQuantityFood($idFood, $nameFood) {
		$statement = $this->db->prepare("INSERT INTO notify (id_food, description)
										VALUES (?, 'Il seguente cibo: ?, ha finito la propria scorta in magazzino.')");
		$statement->bind_param("is", $idFood, $nameFood);
		$statement->execute();
	}
	
	//Function create notify admin quantity low
	public function createNotifyAdminLowQuantityFood($idFood, $nameFood) {
		$statement = $this->db->prepare("INSERT INTO notify (id_food, description)
										VALUES (?, 'Il seguente cibo: ?, sta finendo le scorte in magazzino.')");
		$statement->bind_param("is", $idFood, $nameFood);
		$statement->execute();
	}
	
	//Function create notify admin order
	public function createNotifyAdminOrder($idOrder) {
		$statement = $this->db->prepare("INSERT INTO notify (id_order, description)
										VALUES (?, 'Il seguente ordine e\' stato effettuato: ')"); //AAAAAAAAAAAA
		$statement->bind_param("i", $idOrder);
		$statement->execute();
	}
	
	//Function get notifies
	public function getNotify() {
		$statement = $this->db->prepare("SELECT notify.id_notify, notify.description, notify.data, notify.notify_state
										FROM notify");
		$statement->execute();
		$result = $statement->get_result();

		return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	//Function create notify admin order cancelled by user
	public function notifyAdminOrderCancelled($idOrder) {
		$statement = $this->db->prepare("INSERT INTO notify (id_order, description)
										VALUES (?, 'Il seguente ordine e\' stato annullato.')");
		$statement->bind_param("i", $idOrder);
		$statement->execute();
	}
	
	//-----Functions for Login and Registration-----
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
										VALUES (?, ?, ?, ?, ?, ?, NULL, '1', 'Cliente')");
		$statement->bind_param("ssssss", $name, $username, $password, $email, $phone, $address);
		$statement->execute();
    }
	
	//Function register student
	public function registerStudent($name, $username, $password, $email, $phone, $address, $unimail, $campus) {
		$statement = $this->db->prepare("INSERT INTO users (name, username, password, email, phone_num, address, email_uni, id_uni, user_status)
										VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Cliente-Studente')");
		$statement->bind_param("sssssssi", $name, $username, $password, $email, $phone, $address, $unimail, $campus);
		$statement->execute();
    }
}
?> 