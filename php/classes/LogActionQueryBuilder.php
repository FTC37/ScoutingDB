<?php

	class LogActionQueryBuilder extends QueryBuilder {
		PDO $pdo;
		
		function __construct(PDO $pdo) {
			$this->pdo = $pdo;
		}
		
		function __destruct() {
			$this->pdo = null;
		}
		
		function prepareLogActionQuery() {
			# Not yet implemented...
		}

	}

?>