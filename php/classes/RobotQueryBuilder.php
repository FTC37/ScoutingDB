<?php

	class RobotQueryBuilder extends QueryBuilder {
	
		PDO $pdo;

		function __construct(PDO $pdo) {
			$this->pdo = $pdo;
		}

		function __destruct() {
			$this->pdo = null;
		}

		function prepareRobotQuery(Robot $robot, $populateQuery = false) {

			$query = "INSERT INTO robots ( " . gatherTeamCols($robot->getAbilities(), false) . " ) VALUES( " . gatherTeamCols($team->getAbilities(), true). " )";

			$statement = $this->pdo->prepare($query);

			if($populateQuery) { 
				foreach (json_decode($robot->getAbilities()) as $key => $value) {
					$statement->bindValue(":".$key, $value);
				}
			}
			
			return $statement;

		}

		function gatherRobotCols($abilities, $useColons) {

			$buffer = "";

			$skipFirst = false;

			foreach (json_decode($abilities) as $key => $value) {
				if($skipFirst == FALSE) {
					$buffer .= $useColons ? "':$key'" : "'$key'";
					$skipFirst = true;
				} else {
					$buffer .= $useColons ? ", '$:key'", ", '$key'";					
				}
			}

			return $buffer;
		}

	}

?>