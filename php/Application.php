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
	
		public function connect($tryUpstream = true) {
			if($tryUpstream) {
				$username = $this->config['upstream_database']['user'];
				$password = $this->config['upstream_database']['pass'];
				$address = $this->config['upstream_database']['addr'];
				$db_name = $this->config['upstream_database']['db_name'];
				$charset = $this->config['upstream_database']['charset'];	
				
				try { 
					$pdo = new PDO("mysql:host=" . $address . ";dbname=" . $db_name . ";charset=" . $charset, $username, $password);
					return $pdo;
				} catch(PDOException $e) {
					# Don't die yet...
				}
			}

			$username = $this->config['local_database']['user'];
			$password = $this->config['local_database']['pass'];
			$address = $this->config['local_database']['addr'];
			$db_name = $this->config['local_database']['db_name'];
			$charset = $this->config['local_database']['charset'];	
			
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