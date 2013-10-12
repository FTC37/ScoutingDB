<?php
	require_once "ref/Preferences.php";

	class Application {
	
		private $pdo;
		private $config;

		public function __construct() {
			$this->pdo = null;
			$this->config = json_decode((new Preferences())->getPreferencesAsJSON(),true);
		}
	
		public function __destruct() { $this->pdo = null; }
	
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

		public function getTeamPreferences() {
			return $this->config['team'];
		}
		
		public function copy() {
			return "<small class='copy'><span>&copy; Copyright 2013-2014 &sdot; Taylor Blau &amp; Jack Townsend - All Rights Reserved</span></small>";
		}

	}
	
?>