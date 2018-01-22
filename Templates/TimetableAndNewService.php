<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	<h2 class="cursive-font primary-color">Horario & Nuevo servicio</h2>

</div>
</div>
<div class="row">

	<div class="col-md-5">

		<form action="" method="POST">
			<div class="row form-group">
				<input type="hidden" name="action" value="changeTimetable">
				<div class="row form-group">
					<div class="col-md-12">
						<label for="date-start">Apertura</label>
						<input type="text" name="opentime" class="form-control" id="opentimePicker">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label for="date-start">Cierre</label>
						<input type="text" name="closetime" class="form-control" id="closetimePicker">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<label for="activities">Cerramos los ...</label>
						<select name="dayofweekclosed" id="activities" class="form-control" >
							<?php $dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");?>
							<?php foreach ($dias as $key => $value) { ?>
							<option class="force_black" value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php } ?>

						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12" style="margin-top:20px;">
						<input type="submit" class="btn btn-primary btn-block" value="Cambiar">
					</div>
				</div>
			</div>
		</form>	
	</div>
	<div class="col-md-5 col-md-offset-2 ">

		<form action="" method="POST">
			<div class="row form-group">
				<input type="hidden" name="action" value="addService">
				<div class="row form-group">
					<div class="col-md-12">
						<label for="date-start">Servicio</label>
						<input type="text" name="servicename" class="form-control">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<label for="activities">Capacidad al mismo tiempo</label>
						<select name="parallel" id="" class="form-control" >
							<?php for ($i=1; $i < 15 ; $i++){ ?>
							<option class="force_black" value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						<label for="activities">Duración (Minutos)</label>
						<select name="duration" id="activities" class="form-control" >
							<?php for ($i=5; $i <= 120 ; $i+=5){ ?>
							<option class="force_black" value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="activities">Precio (€)</label>
						<select name="price" id="activities" class="form-control" >
							<?php for ($i=1; $i <= 30 ; $i++){ ?>
								<option class="force_black" value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12" style="margin-top:20px;">
						<input type="submit" class="btn btn-primary btn-block" value="Añadir">
					</div>
				</div>
			</div>
		</form>	
	</div> 


	<script type="text/javascript">

	$(document).ready(function() {

		$('#opentimePicker').datetimepicker({
			format: 'HH:mm',
			widgetPositioning: {
            	horizontal: 'left',
            	vertical: 'top',
        	},
        	stepping: "15",
		});

		$('#closetimePicker').datetimepicker({
			format: 'HH:mm',
			widgetPositioning: {
            	horizontal: 'left',
            	vertical: 'top',
        	},
        	stepping: "15",
		});
	});

</script>