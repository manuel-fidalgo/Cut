<?php 
/**
* Data trasport between movdel view controller.
*/
class Timetable 
{
	$commerceUsername;
	$opentime;
	$closeTime;
	$dayofweenclosed;

	function __construct($commerceUsername,$opentime,$closeTime,$dayofweenclosed)
	{
		$this->commerceUsername = $commerceUsername;
		$this->opentime = $opentime;
		$this->closeTime = $closeTime;
		$this->dayofweenclosed = $dayofweenclosed;
	}
}
?>