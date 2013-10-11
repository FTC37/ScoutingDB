<?php
	class LogAction {
	
		private $user_id;
		private $action_type;
		private $time;
		
		public function __construct($user_id, $action_type) {
			$time = time();
			
			$this->user_id = $user_id;
			$this->action_type = $action_type;
		}
		
	}
?>