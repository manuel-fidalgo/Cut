<div class="col-md-6">
	<div class="fh5co-card-item">
		<figure>
			<div class="overlay"><i class="ti-plus"></i></div>
			<img src="images/img_1.jpg" alt="Image" class="img-responsive">
		</figure>
		<div class="fh5co-text">
			<h1 class="cursive-font"><?php echo $service['name']; ?></h1>
			<p><span class="color-theme"><?php echo $service['duration']; ?>&nbsp;minutos</span></p>
			<p><span class="price cursive-font"><?php echo $service['price']; ?>&nbsp;€</span></p>
			<form method="GET">
  				<input type="hidden" name="section" value="commerce">
  				<input type="hidden" name="id" value="<?php echo $commerce['username']; ?>">
  				<input type="hidden" name="action" value="newreservation">
  				<input type="hidden" name="service" value="<?php echo $service['name']; ?>">

				<div class="row form-group">
					<div class="col-md-12">
						<label for="date-start">Fecha</label>
						<input type="text" name="date" class="form-control" id="<?php echo $service['name']; ?>datePicker">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<label for="date-start">Hora</label>
						<input type="text" name="time" class="form-control" id="<?php echo $service['name']; ?>timePicker">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<input type="submit" class="btn btn-primary btn-block" value="Reservar" id="<?php echo $service['name']; ?>submit">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

	var dayClosed = <?php echo $commerce['timetable']['dayofweekclosed']; ?>

	$(document).ready(function () {

		function getTomorrow(){
			var tomorrow = new Date();
			tomorrow.setDate(tomorrow.getDate() + 1);
			return tomorrow;
		}

		$('#<?php echo $service['name']; ?>datePicker').datetimepicker({
         	format: 'DD/MM/YYYY',
         	widgetPositioning: {
            	horizontal: 'left',
            	vertical: 'top',
            	locale: 'es',
        	},
        	daysOfWeekDisabled: [dayClosed],
        	minDate: getTomorrow(),
     	});
     	
     	var st, fs;
     	st = moment("<?php echo $commerce['timetable']['opentime']; ?>","hh:mm:ss");
     	fs = moment("<?php echo $commerce['timetable']['closetime']; ?>","hh:mm:ss");

		$('#<?php echo $service['name']; ?>timePicker').datetimepicker({
			format: 'HH:mm',
			widgetPositioning: {
            	horizontal: 'left',
            	vertical: 'top',
        	},
        	stepping: "<?php echo $service['duration']; ?>",
        	minDate: st,
        	maxDate: fs,
		});
		$('#<?php echo $service['name']; ?>timePicker').on("dp.change", function(){

			$.ajax({
				type: "post",
				url: "check.php",
				data: {	
					time: $('#<?php echo $service['name']; ?>timePicker').val(),
					date: $('#<?php echo $service['name']; ?>datePicker').val(),
					service: "<?php echo $service['name']; ?>",
					id: "<?php echo $_GET['id']; ?>",
				},
				dataType: "text",
				cache: "false",
				success:function(data){

					// alert(data);
					if(data === "true"){
						$('#<?php echo $service['name']; ?>timePicker').addClass( "available");
						$('#<?php echo $service['name']; ?>timePicker').removeClass( "no-available");
						$('#<?php echo $service['name']; ?>submit').prop('disabled', false);
					}else{
						$('#<?php echo $service['name']; ?>timePicker').addClass( "no-available");
						$('#<?php echo $service['name']; ?>timePicker').removeClass( "available");
						$('#<?php echo $service['name']; ?>submit').prop('disabled', true);
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
					alert(XMLHttpRequest.responseText + ";" + textStatus + "," + errorThrown);
				}
			});
		});
	});
</script>