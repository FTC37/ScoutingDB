<?php
	$preferences = json_decode(
		'{
		   "team":
              "team_name":"Team Name",
              "team_color":"#FFFFFF"
		   }
		   "database": {
		      "user":"db_username",
		      "pass":"db_pass",
		      "addr":"localhost",
		      "db_name":"robotics"
		   }
		}'
	);

	function getPreferencesAsJSON() {
		return $preferences;
	}
?>