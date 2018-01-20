<?php

include_once 'Model.php';
class ReservationsModel extends Model{


	function __construct()
	{
		parent::__construct();
	}
	function getCommerceList(){
		
		$sql = "SELECT * FROM 'companies' WHERE 1";
		return $db->query($sql);
	}
}
?>