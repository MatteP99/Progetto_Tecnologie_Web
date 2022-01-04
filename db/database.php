<?php
	//Classe per creazione db e interrogazione
	class DatabaseHelper {
		private $db;
		
		public function __construct($servername, $username, $password, $dbname, $port) {
			//Connessione al db
			$this->db = new mysqli($servername, $username, $password, $dbname, $port);
			//Controllo connessione riuscita
			if($this->db->connect_error) {
				die("Connection failed!");
			}
		}
		//Funzione provvisoria
		public function getSedeUniversitaria() {
			$statement = $this->db->prepare("SELECT nome, indirizzo, cap
			FROM sede_universitaria");
			//Assegnamento parametri alla query $statement->bind_param("s", variabile);
			$statement->execute();
			$result = $statement->get_result();
			
			return $result->fetch_all(MYSQLI_ASSOC);
		}
	}
?> 