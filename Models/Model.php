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

}
?>