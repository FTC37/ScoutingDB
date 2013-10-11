<?php
	class Team {
		private $name;
		private $ftc_ident;
		private $abilities;
		private $score_value;
		private $projected_score;

		public function __construct($name, $ident, $abilities) {
			$this->name = $name;
			$this->ftc_ident = $ident;
			$this->abilities = $abilities;

			$this->score_value = json_decode(file_get_contents("../json/scores.json"));

			$projected_score = $this->getProjectedScore();
		}

		public function getName() {
			return $this->name;
		}	

		public function getFTCIdent() {
			return $this->ftc_ident;
		}

		public function getAbilities() {
			return $this->abilities;
		}

		public function getAbilityFor($abilitity) {
			if(isset($this->abilitities[$abilitiy])) {
				return $this->abilities[$ability];
			} else {
				return false;
			}
		}

		public function getProjectedScore() {
			foreach ($this->abilities as $key => $value) {
				if(isset($score_value[$key]) && $key != "beam_even") {
					$projectedScore += $score_value[$key];
				}
			}

			if($this->abilities['beam_even'] == true) {
				$projectedScore *= $score_value['beam_even'];
			}

			return $projectedScore;
		}

		public function populateInsertStatement(PDOStatement $statement) {
			foreach (json_decode($this->getAbilities()) as $key => $value) {
				$statement->bindValue(":".$key, $value);
			}

			return $statement;

		}
	}
?>