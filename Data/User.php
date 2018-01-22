<?php
/**
* Data trasport between movdel view controller.
*/
class User{

	public $username;
	public $email
	function __construct($username, $email)
	{
		$this->username = $username;
		$this->email = $email;
	}
}
?>