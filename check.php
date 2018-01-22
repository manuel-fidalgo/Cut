<?php 
	// Checks if the reservation requested by the fronted using ajax is available
	include 'Models/ReservationsModel.php';

	$model = new ReservationsModel();
	$bool = $model->checkDate($_POST['time'],$_POST['date'],$_POST['service'],$_POST['id']);
	echo $bool;
?>