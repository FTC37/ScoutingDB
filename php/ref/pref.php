<?php
	
	class Preferences {
		private $pref =
			'{
			   "team": {
		          "team_name":"Team Name",
		          "team_color":"#FFFFFF"
			   },
			   "database": {
			      "user":"db_username",
			      "pass":"db_pass",
			      "addr":"localhost",
			      "db_name":"robotics",
			      "charset":"utf8"
			   },
			   "misc": {
			   	  "setup_completed":false
			   }
			}';

		public function getPreferencesAsJSON() {
			return $this->pref;
		}

		public function getPreferences() {
			return json_decode($this->pref, true);
		}
	}
?>
