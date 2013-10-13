<?php
	
	class Preferences {
		private $pref =
			'{
			   "team": {
		          "team_name":"Team Name",
		          "short_name":"tname",
		          "team_color":"#48b7b9"
			   },
			   "database": {
			      "user":"root",
			      "pass":"",
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
