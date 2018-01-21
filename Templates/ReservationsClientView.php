<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	<h2 class="cursive-font primary-color">Tus reservas</h2>

	<?php
	if(count($reservationList)===0){
		echo "<p>Actualmente no dispones de ninguna reserva.</p>";
	}else{
		echo "<p>Te mostramos las reservas que tienes pendientes.</p>";
	}
	?>

</div>
</div>
<div class="row">

	<?php
	foreach ($reservationList as $reservation) {
		include './Templates/ReservationInListTemplate.php';
	}
	?>