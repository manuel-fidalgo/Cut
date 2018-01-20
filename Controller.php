<?php

class Controller{
    
 
    function Controller(){
        
    }

    function __construct() {
        
    }

    public function getSection($get){
    	
    	$section=""; 

    	if(array_key_exists('section',$get) && !empty(($get['section'])))
    	{
			$section = $get['section'];
    	}

    	return $section;
    }

    public function getCommerceList($get){

    	require_once './Models/UsersModel.php';

    	$usersmodel = new UsersModel();
		$city = $get['ciudad'];
		$name = $get['nombre'];

        $commerce_list = $usersmodel->getCommercesMatch($city,$name);
        return $commerce_list;

    }
    public function getCommerce($get){

        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();
        $username = $get['id'];

        
        $ret = $usersmodel->getCommerceId($username);

        return $ret;
    }
    public function makeReservation(){

    }
    public function cancelReservation(){

    }
}
?>