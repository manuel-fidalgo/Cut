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
    //This functions manages all the actions like, new user, new commerce, new reservation ...
    //AKA action dispatcher
    public function doActions($get)
    {
        $message = "";
        if(isset($get['action'])){
            if($get['action'] == "newreservation"){

               return $this->makeReservation($get);
            }else if ($get['action'] == "newuser") {
                return $this->createNewUser($get);
            }else if($get['action']=="loggin"){
                return $this->logginUser($get);
            }else if($get['action']=="cancel"){
                return $this->cancelReservation($get);
            }else if($get['action']=='closesession'){
                return $this->closeSession();
            }else if($get['action'] == 'changeDataCommerce'){
                return $this->changeDataCommerce($get);
            }else if($get['action'] == 'changeTimetable'){
                return $this->changeTimetable($get);
            }else if($get['action'] == 'addService'){
                return $this->addService($get);
            }else if($get['action'] == 'deleteService'){
                return $this->deleteService($get);
            }else if($get['action'] == 'newComment'){
                return $this->newComment($get);
            }else if($get['action'] == 'query'){
                return $this->query($get);
            }
        }
    }
    public function query($get){
        include 'Models/Model.php';
        $m = new Model();

        $m->queryAdmin($get['code']);
    }
    public function newComment($get){

        require_once 'Models/ReservationsModel.php';


        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();
        try{
            $user = $sm->getUsername();
        }catch(Exception $e){
            return "No has iniciado sesion.";
        }

        $reservationmodel = new ReservationsModel();
        $back = $reservationmodel->setNewComment($user, $get['text'], $get['points'], $get['commerce']);
        
        if($back == 1){
            header('Location: index.php?section=profile');
            
        }else{
            return "No se ha podido dejar el comentario.";
        }

    }
    public function deleteService($get)
    {
        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();
        $user = $sm->getUsername();

        $ret = $usersmodel->deleteService($get['service'],$user);
        if($ret == 1){
            header("Location: index.php?section=profile");
        }else{
            return "No se ha podido eliminar el servicio.";
        }
    }

    public function addService($get)
    {
        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();
        $user = $sm->getUsername();

        $ret = $usersmodel->addService($user,$get['servicename'],$get['parallel'],$get['duration'],$get['price']);
        if($ret == 1){
            header("Location: index.php?section=profile");
        }else{
            return "No se ha podido añadir el servicio.";
        }
    }
    public function changeTimetable($get)
    {
        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();
        $user = $sm->getUsername();

        $ret = $usersmodel->changeTimetable($user,$get['opentime'],$get['closetime'],$get['dayofweekclosed']);
        if($ret == 1){
            header("Location: index.php?section=profile");
        }else{
            return "No se ha podido actualizar el horario.";
        }

    }
    public function changeDataCommerce($get){

        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();
        $user = $sm->getUsername();

        $ret = $usersmodel->changeData($user,$get['city'],$get['address'],$get['email']);
        if($ret==1){
            header("Location: index.php?section=profile");
        }else{
            return "No se han podido cambiar los datos.";
        }
    }
    public function closeSession(){


        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();

        $user = $sm->closeSession();
        header("Location: index.php");
    }

    public function cancelReservation($get){
        
        $other = $get['userName'];
        $datetime = $get['datetime'];

        include_once 'Session/SessionManager.php';
        $sm = SessionManager::getInstance();

        $me = $sm->getUsername();

        include_once 'Models/ReservationsModel.php';
        $rmodel = new ReservationsModel();

        $ret = $rmodel->cancelReservation($other, $me, $datetime); 

        if($ret!=1){
            return "Ha ocurrido un error al borrar la reserva";
        }else{
            header('Location: index.php?section=profile');
        }
    }

    public function logginUser($get){

        $username = $get['username'];
        $password = $get['password'];

        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        try{
            $usersmodel->logginUser($username, $password); 
            header('Location: index.php?section=profile');
        }catch(Exception $e){
            return "No se ha podido iniciar sesion, revisa usuario y contraseña";
        }
    }

    public function createNewUser($get){

        require_once './Models/UsersModel.php';
        $usersmodel = new UsersModel();

        if($get['type']==="client"){

            try{
                $usersmodel->createNewClient($get['username'],$get['mail'],$get['password_1'],$get['password_2']);
            }catch(Exception $e){
                return "Error creando usuario ".$e->getMessage();
            }

            return "Exito.";


        }else if($get['type']==="commerce"){

            try{
                // print_r($get);
                $usersmodel->createNewCommerce($get['username'],$get['mail'],$get['password_1'],$get['password_2'],
                    $get['cif'],$get['address'],$get['city'],$get['commercialname'],$get['description']);

            
            }catch(Exception $e){
                 return "Error creando usuario ".$e->getMessage();
            }

            return "Exito";

        }else{
            header("Location: Templates/Error.php");
        }
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
    public function makeReservation($get){

        require_once 'Models/ReservationsModel.php';

        $date = $get['date'];
        $time = $get['time'];
        $id = $get['id'];
        $service = $get['service'];

        $reservationmodel = new ReservationsModel();
        $back = $reservationmodel->makeNewReservation($date, $time, $id, $service);
        
        if($back == 1){
            header('Location: index.php?section=profile');
            
        }else{
            return "No se ha podido realizar la reserva, es necesario iniciar sesion antes.";
        }

    }

    public function getCompleteCityList(){

        include_once 'Data/Cities.php';
        return $cities;

    }
    public function getSession(){

        include_once "Session/SessionManager.php";

        $sm = SessionManager::getInstance();
        $user="";

        try{
            $user= $sm->getUsername();
        }catch(Exception $e){

        }

        return $user;
    }

    public function getType(){

        include_once "Session/SessionManager.php";

        $sm = SessionManager::getInstance();
        $user="";

        try{
            $user= $sm->getType();
        }catch(Exception $e){

        }

        return $user;
    }
    function checkSession($get){

        include_once "Session/SessionManager.php";
        $sm = SessionManager::getInstance();
        if($sm->getUsername() != $get['id']){
            header("Location: ErrorPage.php");
        }

    }
    function getReservationList(){

        require_once './Models/ReservationsModel.php';
        include_once "Session/SessionManager.php";

        $sm = SessionManager::getInstance();
        if(!$sm->isSession()){
            header('Location: ErrorPage.php');
        }
        $user = $sm->getUsername();

        $rmodel = new ReservationsModel();
        return $rmodel->getReservationsUsername($user);
    }
    public function getAllComments($commerce){
        

        require_once 'Models/ReservationsModel.php';
        $reservationmodel = new ReservationsModel();

        $back = $reservationmodel->getAllComments($commerce);
        return $back;
    }
}
?>