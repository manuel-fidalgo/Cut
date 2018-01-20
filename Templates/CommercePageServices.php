<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	<h2 class="cursive-font primary-color">Servicios que ofrecemos.</h2>
	<!-- <p>Te mostramos los centros mas relevantes segun tus criterios de busqueda.</p> -->
</div>
</div>
<div class="row">

	<?php
		$services = $commerce['services'];

		print "<pre>";
		print_r($commerce);
		print "</pre>";

		foreach ($services as $key => $service) {
		 	
			include './Templates/ServiceTemplate.php';
		}
	?>


