<?php

include_once 'Model.php';

class UsersModel extends Model{
	
	function __construct()
	{
		parent::__construct();
	}

	function getCommercesMatch($city="",$name=""){

		$name = $name.".*"; //get mnore matches
		
		$sql = "SELECT * FROM commerces WHERE city=:city AND comercialname REGEXP :name";
		$commerce_list = $this->db->query($sql,array(':city' => $city,':name' => $name));

		foreach ($commerce_list as $key => $commerce) {
            $newCommerce = $commerce;
            $newCommerce['price'] = $this->getCommerceAveragePrice($commerce['username']);
            $commerce_list[$key] = $newCommerce;
        }

        return $commerce_list;
	}

	function getCommerceAveragePrice($username){

		$sql = "SELECT price FROM services WHERE commerceUsername=:username";
		$prices_list = $this->db->query($sql,array(':username' => $username));

		$average_price = 0;
		$counter = 0;

		foreach ($prices_list as $value) {
			$average_price = $average_price + $value['price'];
			$counter++;
		}

		return $average_price/$counter;

	}

	//Gets the commerce with the services and with the timetable.
	//TODO-> Transform this into a object based structure.

	function getCommerceId($id)
	{

		$sql = "SELECT * FROM commerces WHERE username=:id";
		$commerce = $this->db->query($sql,array(':id' => $id));
		$commerce = $commerce[0];

		$sql = "SELECT * FROM services WHERE commerceUsername=:id";
		$services = $this->db->query($sql, array(':id'=> $id));

		$commerce['services'] = $services;

		$sql = "SELECT * FROM timetable WHERE commerceUsername=:id";
		$timetable = $this->db->query($sql, array(':id'=> $id));

		$commerce['timetable'] = $timetable[0];

		return $commerce;

	}

}
?>