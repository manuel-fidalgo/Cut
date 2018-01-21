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

	function createNewCommerce($username,$email,$password_1,$password_2,$cif,$address,$city,$comercialname,$description){


		$sql = "INSERT INTO commerces (username, password, email, adress, CIF, comercialname, city, description) 
				VALUES (:username, :password, :email, :adress, :CIF, :comercialname, :city, :description)";

		if($password_1 == $password_2)
			$password = $password_1;
		else
			throw new Exception("No password match");
			

		$res = $this->db->queryCount($sql, array(':username'=>$username, ':password'=>$password, 
			':email'=>$email, ':adress'=>$adress, ':CIF'=>$cif, ':comercialname'=>$comercialname, 
			':city'=>$city, ':description'=>$description));

		if($res == 0)
			throw new Exception("UserExists");
		else
			return "Success";
			
	}

	function createNewClient($username,$email,$password_1,$password_2){

		$sql = "INSERT INTO clients (username,email,password) VALUES (:username, :email, :password)";

		if($password_1 == $password_2)
			$password = $password_1;
		else
			throw new Exception("No password match");

		$res = $this->db->queryCount($sql, array(':username'=>$username, ':password'=>$password,':email'=>$email));

		if($res == 0)
			throw new Exception("UserExists");
		else
			return "Success";

	}

	function logginUser($username, $password){

		include 'Session/SessionManager.php';
		$sm = SessionManager::getInstance();


		$types = array('clients' => 'client' , 'commerces'=>'commerce' );

		foreach ($types as $key => $value) {

			$sql = "SELECT * FROM ".$key." WHERE username=:username AND password=:password";
			$user = $this->db->query($sql,array(':username' => $username, ':password' => $password));

			if(count($user) != 0){
				$sm->createNewSession($user[0]['username'],$value);
				return;
			} 

		}
		
		throw new Exception("No user found");
			
		

	}
	

}
?>