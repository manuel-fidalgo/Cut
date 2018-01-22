<?php

include_once 'Model.php';
class ReservationsModel extends Model{


	function __construct()
	{
		parent::__construct();
	}
	function checkDate($time, $date, $service, $id){
		

		$sql = "SELECT * FROM reservations WHERE commerceUsername=:id AND date=:date AND serviceName=:service";
		$date_complete = $this->convertToDateTime($date,$time);
		$reservations = $this->db->query($sql,array(':id' => $id, ':date'=>$date_complete, ':service'=>$service));

		$sql = "SELECT parallel FROM services WHERE commerceUsername=:id AND name=:name";
		$data = $this->db->query($sql,array(':id' => $id, ':name'=>$service));
		$parallel = $data[0]['parallel'];

		$ret = "";
		if(count($reservations) < $parallel){
			return "true";
		}else{
			return "false";
		}
	}

	function makeNewReservation($date, $time, $commerce, $service){
		
		$sql = "INSERT INTO reservations (clientUsername, commerceUsername, date, serviceName) VALUES (:user, :commerce, :datetime, :serviceName)";
		$datetime = $this->convertToDateTime($date,$time);

		include_once 'Session/SessionManager.php';
		$sm = SessionManager::getInstance();
		
		try{
			$userName = $sm->getUsername();
		}catch(Exception $e){
			return 0;
		}


		$status = $this->db->queryCount($sql, array(':user'=> $userName, ':commerce' => $commerce,
											   ':datetime' => $datetime, 'serviceName'=>$service));
		// print_r($status);

		//Returns the number of rows affected
		return $status;

	}
	//The username can be a client or a commerce
	function getReservationsUsername($username){

		$date_formated = date('Y-m-d H:i:s');
		$sql = "SELECT * FROM reservations WHERE clientUsername=:username OR commerceUsername=:username AND date > :date ORDER BY date";
		$reservations = $this->db->query($sql,array(':username' => $username, ':date'=>$date_formated));

		foreach ($reservations as $key => $value) {
			$datetime = $value['date'];

			$arr = explode(" ", $datetime);

			$reservations[$key]['date'] = $arr[0];
			$reservations[$key]['time'] = $arr[1];
			$reservations[$key]['datetime'] = $datetime;
		}

		return $reservations;

	}

	function cancelReservation($commerce, $user, $datetime){
		$sql = "DELETE FROM reservations WHERE ((clientUsername=:client AND commerceUsername=:commerce) OR (clientUsername=:commerce AND commerceUsername=:client)) AND date=:date ";
		$val = $this->db->queryCount($sql,array(':client'=>$user,':commerce'=>$commerce,':date'=>$datetime));
		return $val;
	}
	
}
?>