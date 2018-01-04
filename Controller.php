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
			$section= $get['section'];
    	}

    	return $section;
    }

    public function getCommerceList($post){

    	$usersmodel = new UsersModel();
		$city = $post['ciudad'];
		$name = $post['nombre'];

		return $usersmodel->getCommercesMatch($city,$name);
    }

}
?>