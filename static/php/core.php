<?php
	include "ref/pref.php";

	function connect($path_to_config) {
		$config = json_decode(getPreferencesAsJSON());

		$username = $config['database']['user'];
		$password = $config['database']['pass'];
		$address = $config['database']['addr'];
		$db_name = $config['database']['db_name'];
		$charset = $config['database']['charset'];
	
		try { 
			$db = new PDO("mysql:host=" . $address . ";dbname=" . $db_name . ";charset=" . $charset, $username, $password);
			return $db;
		} catch(PDOException $e) {
			return false;
		}
	}

	
?>