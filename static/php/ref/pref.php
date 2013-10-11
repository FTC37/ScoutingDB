<?php
	$preferences =
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
		}'
	;

	function getPreferencesAsJSON() {
		return $preferences;
	}
?>