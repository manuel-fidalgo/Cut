<?php 

class ViewRender 
{
	
	function __construct($controller,$config)
	{
		
		$section_to_render = $controller->getSection($_GET);

		if($section_to_render == "busqueda"){
			$listaPeluquerias = $controller->getCommerceList($_GET);
		}
		if($section_to_render == "commerce"){
			$commerce = $controller->getCommerce($_GET);
			$comments = $controller->getAllComments($commerce['username']);
		}
		if($section_to_render == "profile"){	
			$reservationList = $controller->getReservationList();
		}

		$message_0 = $controller->doActions($_GET);
		$message_1 = $controller->doActions($_POST);

		$user=""; $type="";
		$user = $controller->getSession();
		$type = $controller->getType();
		$cities = $controller->getCompleteCityList();

		include './Templates/IndexTemplate.php';
	}

}
?>