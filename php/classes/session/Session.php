<?php
	
	class Session {

		private $user_id;
		private $user_pass;
		# private $user_hash

		public function __construct($user_id, $user_pass, $pdo) {

			session_start();

			$this->user_id = $user_id;
			$this->user_pass = $user_pass;

		}

		public function __destruct() { $this->pdo = null; }

		public function validateLocalSession() {
			// return hash("sha256", $this->user_pass . $this->gatherSalt()) == $this->gatherHash();
		}

		public function validateLogin($min_rank) {
			if( hash("sha256", $this->user_pass . $this->gatherSalt()) == $this->gatherHash() ) {
			
				if($this->getSessionsAlreadyExist()) { 
					$this->removeOtherSessions();
				}

				$this->insertServerSession();
				$this->createLocalSession();

				return $min_rank >= $this->getRank();

			} else {

				$this->destroyLocalSession();
				return false;
			
			}

		}

		private function gatherSalt() {
			# Returns the salt for a user_id if there is on, otherwise it returns false
		}

		private function gatherHash() {
			# Returns the hash for a user_id if there is one, else false
		}

		private function getSeverSession() {
			$sessions = [];

			$query = "SELECT * FROM session_session WHERE user_id = '" . $this->user_id . "'";

			foreach($this->pdo->query($query) as $row) {
				$sessions[] = $row;
			}

			return $sessions;
		}

		private function insertServerSession() {
			#create session ID...
			foreach($this->pdo->query("SELECT MD5(RAND()) as session_id") as $row) {
				$session_id = $row['session_id'];
			}

			$sql = "INSERT INTO session_session ('user_id','expire_time','session_hash' VALUES (':user_id',':expire_time',':session_hash'))";

			$statement = $pdo->prepare($sql);
			
			$statement->bind_param(":user_id", $this->user_id, PDO::PARAM_INT);
			$statement->bind_param(":expire_time", $this->user_id, PDO::PARAM_INT);
			$statement->bind_param(":session_hash", $this->user_id, PDO::PARAM_STR);
			
			$statement->execute();

		}

		private function deleteServerSession() {
			# Delets a specific server session (not a logout-all)
		}

		private function createLocalSession() {
			$_SESSION['user_id'] = $this->user_id;
			$_SESSION['session_hash'] = md5($this->getServerSession()['id']);
		}

		private function destroyLocalSession() {
			# Removes all cookies from the local session
		}

		private function getSessionsAlreadyExist() {
			# Returns true if the count of sessions matching $this->user_id is greater than 0
		}

		private function removeOtherSessions() {
			# Not yet implemented... will remove all other sessions that match on the basis of $this->user_id (not IP...)
		}

		public function getRank() {
			# Returns the publicly available rank for the user
		}

	}

?>