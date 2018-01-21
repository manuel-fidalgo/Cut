<?php
//This class querys into database, provides an interface to connect with database
class DBEndPoint {
	
	const USERNAME="root";
	const PASSWORD="";
	const HOST="127.0.0.1";
	const DB="cutdb";

	function __construct()
	{
		
	}
	
	private function getConnection(){

		$username = self::USERNAME;
		$password = self::PASSWORD;
		$host = self::HOST;
		$db = self::DB;

		$connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);	
		return $connection;
	}

	public function query($sql,$args){

		$con = $this->getConnection();

		$statement = $con->prepare($sql);
		$statement ->execute($args);
		$ret = $statement ->fetchAll();
		// print_r($ret);	
		return $ret; 		
	}
	public function queryCount($sql,$args){

		$con = $this->getConnection();

		$statement = $con->prepare($sql);
		$statement ->execute($args);
		$ret = $statement->rowCount();
		// print_r($ret);	
		return $ret; 		
	}

	public function simplyQuery($sql){

		$con = $this->getConnection();

		$statement = $con->prepare($sql);
		$statement ->execute();
		$ret = $statement ->fetchAll();
		// print_r($ret);
		return $ret; 		
	}
}

?>