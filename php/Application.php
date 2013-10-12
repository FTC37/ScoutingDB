<?php
	require_once "ref/pref.php";

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

		public function getTeamColor() {
			return isset($this->config['team']['team_color']) ? $this->config['team']['team_color'] : false;
		}
		
		public function getTeamName() {
			return isset($this->config['team']['team_name']) ? $this->config['team']['team_name'] : false;
		}
		
		public function copy() {
			return "&copy; Copyright 2013-2014 &sdot; Taylor Blau &amp; Jack Townsend <br/>All Rights Reserved";

		}

	}
	
?>