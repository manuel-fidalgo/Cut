<?php
/**
* Data trasport between movdel view controller.
*/
class Commerce extends User{
	
	$address;
	$cif; 
	$city;
	$description;

	function __construct($username, $mail)
	{
		parent::__construct($username, $mail);
	}
}
?>