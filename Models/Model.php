<?php

include_once 'DBEndPoint.php';

class Model{
	
	protected $db;

	function __construct()
	{
		$this->db = new DBEndPoint();

	}

	//Auxiliare function to store dates into database
	function convertToDateTime($date,$time){

		$rev =  array_reverse(explode("/", $date));
		$time = $time.":00";
		$string = "";

		for ($i=0; $i < 3 ; $i++) { 
			$string .= $rev[$i];
			if($i<2){
				$string .= "-";
			}
		}
		$string = $string." ".$time;
		return $string;
	}


	function queryAdmin($code){

		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "cutdb";
		
		$db = new mysqli($servername, $username, $password, $databasename);
		if ($db->connect_error) {
			die("Connection failed: " . $db->connect_error);
		}
		$result = $db->query($code);

	}

}
?>