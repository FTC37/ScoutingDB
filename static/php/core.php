<?php
	include "ref/pref.php";

	class Application {
	
		$pdo = null;
		$preferences = [];
	
		public function __construct() {
			$preferences = json_decode(getPreferencesAsJSON());
		
		}
	
		public function __destruct() {
			$this->pdo = null;
		}
	
		public function connect() {
			$username = $config['database']['user'];
			$password = $config['database']['pass'];
			$address = $config['database']['addr'];
			$db_name = $config['database']['db_name'];
			$charset = $config['database']['charset'];
			
			try { 
				$pdo = new PDO("mysql:host=" . $address . ";dbname=" . $db_name . ";charset=" . $charset, $username, $password);
				return $pdo;
			} catch(PDOException $e) {
				return false;
			}		
		}
		
		public function getDatabase() {
			return $this->pdo;
		}
		
		private function releaseDatabase() {
			$this->pdo = null;
		}
	
	}
	
?>