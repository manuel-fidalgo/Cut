<?php
class SessionManager {

	private static $instance = null;

	private function __construct(){}

	public static function getInstance()
	{
		if (self::$instance == null){
			self::$instance = new SessionManager();
		}

		return self::$instance;
	}
	
	public function createNewSession($user,$type){

		session_start();
		$_SESSION['username'] = $user;
		$_SESSION['type'] = $type;

	}

	public function getUsername(){

		session_start();
		$name = $_SESSION['username'];
		if(strlen($name) === 0){
			throw new Exception("No session");
		}else{
			return $name;
		}
	}

	public function isSession(){

		session_start();
		$name = $_SESSION['username'];

		if(strlen($name) === 0){
			return false;
		}else{
			return true;
		}
	}
}
?>