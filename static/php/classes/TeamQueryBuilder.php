<?php

	class TeamQueryBuilder extends QueryBuilder {
	
		PDO $pdo;

		function __construct(PDO $pdo) {
			$this->pdo = $pdo;
		}

		function __destruct() {
			$this->pdo = null;
		}

		function prepareTeamInsertQuery(Team $team, $populateQuery = false) {

			$query = "INSERT INTO teams ( " . gatherTeamCols($team->getAbilities(), false) . " ) VALUES( " . gatherTeamCols($team->getAbilities(), true). " )";

			$statement = $this->pdo->prepare($query);

			if($populateQuery) { 
				foreach (json_decode($team->getAbilities()) as $key => $value) {
					$statement->bindValue(":".$key, $value);
				}
			}
			
			return $statement;

		}

		function gatherTeamCols($abilities, $useColons) {

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