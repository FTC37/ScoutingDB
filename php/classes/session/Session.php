<?php
	
	class Session {

		private $user_id;
		private $user_pass;
		# private $user_hash

		public function __construct($user_id, $user_pass, $pdo) {

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

		private function insertServerSession() {
			# Inserts the session into the table of active sessions
		}

		private function createLocalSession() {
			# Inserts cookies that validate the session
		}

		private function deleteServerSession() {
			# Delets a specific server session (not a logout-all)
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