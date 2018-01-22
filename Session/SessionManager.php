<?php
class SessionManager {

	private static $instance = null;

	private function __construct(){
		session_start();
	}

	public static function getInstance()
	{
		if (self::$instance == null){
			self::$instance = new SessionManager();
		}

		return self::$instance;
	}
	
	public function createNewSession($user,$type){

		
		$_SESSION['username'] = $user;
		$_SESSION['type'] = $type;

	}

	public function getUsername(){

		if(!isset($_SESSION['username']) || strlen($_SESSION['username']) === 0){
			
			throw new Exception("No session");
		}else{
			return $_SESSION['username'];
		}
	}

	public function getType(){

		if(!isset($_SESSION['type']) || strlen($_SESSION['type']) === 0){
			
			throw new Exception("No session");
		}else{
			return $_SESSION['type'];
		}
	}

	public function isSession(){

		$name = $_SESSION['username'];

		if(strlen($name) === 0){
			return false;
		}else{
			return true;
		}
	}
	public function closeSession(){

		$_SESSION = array();
		session_destroy();

	}
}
?>