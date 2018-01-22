<!-- View generator, not a class -->
<?php

include './Config.php';
include './Controller.php';
include './Views/ViewRender.php';

//Creates the controller, wich manages the user requets
$controller = new Controller();

//Define de const in proyect
$config = new Config();


$wiew = new ViewRender($controller,$config);

 
?>

