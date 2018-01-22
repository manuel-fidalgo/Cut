<?php
/**
* Data trasport between movdel view controller.
*/
class Reservations
{
	
	$clienteUsername;
	$commerceUsername;
	$date;
	$serviceName;

	function __construct($clienteUsername,$commerceUsername,$date,$serviceName)
	{
		$this->clienteUsername = $clienteUsername;
		$this->commerceUsername = $commerceUsername;
		$this->date = $date;
		$this->serviceName = $serviceName;
	}
}
?>