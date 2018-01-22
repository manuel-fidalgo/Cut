
<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	<h2 class="cursive-font primary-color">Peluquerias disponibles</h2>
	<p>Te mostramos los centros mas relevantes segun tus criterios de busqueda.</p>
</div>
</div>
<div class="row">

	<?php
		if(count($listaPeluquerias)===0){
			echo "No se ha encontrado ninguna peluqueria.";
		}else{
			foreach ($listaPeluquerias as $value) {
				# code...
				include './Templates/CommerceInListTemplate.php';
			}
		}
	?>

