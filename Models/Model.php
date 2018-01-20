<?php

include_once 'DBEndPoint.php';

class Model{
	
	protected $db;

	function __construct()
	{
		$this->db = new DBEndPoint();

	}
	function Model()
	{
		
	}

}
?>