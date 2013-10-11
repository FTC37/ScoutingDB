<?php
	include "../ref/pref.php";

	class Preferences {
		private $pref = "";

		public function __construct() {
			$pref = getPreferencesAsJSON();
		}

		public function getDBInfo() {
			return $this->pref['database'];
		}

		public function getTeamInfo() {
			return $this->pref['team'];
		}
	}
?>