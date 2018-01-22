<?php
/**
* Data trasport between model view controller.
*/
class Client extends User{

	function __construct($username, $email)
	{
		parent::__construct($username, $email);
	}
}
?>