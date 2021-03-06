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


		$sql = "INSERT INTO commerces (username, password, email, address, CIF, comercialname, city, description) 
				VALUES (:username, :password, :email, :address, :CIF, :comercialname, :city, :description)";

		if($password_1 == $password_2)
			$password = $password_1;
		else
			throw new Exception("la contraseña no coincide");
			

		$res = $this->db->queryCount($sql, array(':username'=>$username, ':password'=>$password, 
			':email'=>$email, ':address'=>$address, ':CIF'=>$cif, ':comercialname'=>$comercialname, 
			':city'=>$city, ':description'=>$description));



		if($res != 1){

		 	throw new Exception("ya existe el usuario.");
		}else{
			
			$this->createDefaultTimetable($username);
			return "Success";
		}
			
	}

	function createNewClient($username,$email,$password_1,$password_2){

		$sql = "INSERT INTO clients (username,email,password) VALUES (:username, :email, :password)";

		if($password_1 == $password_2)
			$password = $password_1;
		else
			throw new Exception("la contraseña no coincide");

		$res = $this->db->queryCount($sql, array(':username'=>$username, ':password'=>$password,':email'=>$email));

		if($res != 1)
			throw new Exception("ya existe el usuario.");
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
	public function changeData($user,$city,$address,$email){

		$sql = "UPDATE commerces SET email=:email , address=:address, city=:city WHERE username=:username";
		$res = $this->db->queryCount($sql, array(':email'=>$email, ':address'=>$address,':city'=>$city, ':username'=>$user));
		return $res;

	}
	private function createDefaultTimetable($user){

		$sql = "INSERT INTO timetable (commerceUsername, opentime, closetime, dayofweekclosed) VALUES (:a,:b, :c, :d)";
		$res = $this->db->queryCount($sql,array(':a' => $user, ':b'=> '08:00:00', ':c'=>'21:00:00',':d' => '6' ));
		return $res;
	}

	public function changeTimetable($user, $opentime, $closetime, $dayofweekclosed){

		$sql = "UPDATE timetable SET opentime=:opentime , closetime=:closetime, dayofweekclosed=:dayofweekclosed 
				WHERE commerceUsername=:commerceUsername";

		$res = $this->db->queryCount($sql, array(':opentime'=>$opentime, ':closetime'=>$closetime,
									':dayofweekclosed'=>$dayofweekclosed, ':commerceUsername'=>$user));
		return $res;
	}

	public function addService($user, $servicename, $parallel, $duration, $price){

		$sql = "INSERT INTO services (name,commerceUsername,duration,price,parallel) VALUES (:a,:b,:c,:d,:e)";

		$res = $this->db->queryCount($sql, array(':a'=>$servicename, ':b'=>$user,':c'=>$duration, ':d'=>$price, ':e'=>$parallel));
		return $res;
	}

	public function deleteService( $servicename , $user){

		$sql = "DELETE FROM services WHERE services.name = :a AND services.commerceUsername = :b";

		$res = $this->db->queryCount($sql, array(':a'=>$servicename, ':b'=>$user));
		return $res;
	}
	

}
?>