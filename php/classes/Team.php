<?php

	class Team {

		private $name;
		private $ftc_ident;
		private $robots = array();
	
		public function __construct($name, $ident) {
			$this->name = $name;
			$this->ftc_ident = $ident;
		}
		
		public function addRobot(Robot $robot) {
			$this->robots[] = $robot;
		}

		public function getTeamName() {
			return $this->name;
		}
		
		public function getFTC_Ident() {
			return $this->ftc_ident;
		}
		
		public function getRobots() {
			return $this->robots;
		}
		
		public function getRobotsAsJSON() {
			return json_encode($this->robots);
		}
		
	}

?>