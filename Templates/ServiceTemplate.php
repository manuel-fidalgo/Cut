<div class="col-md-6">
	<div class="fh5co-card-item">
		<figure>
			<div class="overlay"><i class="ti-plus"></i></div>
			<img src="images/img_1.jpg" alt="Image" class="img-responsive">
		</figure>
		<div class="fh5co-text">
			<h2><?php echo $service['name']; ?></h2>
			<p><span class="color-theme"><?php echo $service['duration']; ?>&nbsp;minutos</span></p>
			<p><span class="price cursive-font"><?php echo $service['price']; ?>&nbsp;€</span></p>
			<form method="GET">
  				<input type="hidden" name="section" value="commerce">
  				<input type="hidden" name="id" value="<?php echo $commerce['username']; ?>">
  				<input type="hidden" name="action" value="newreservation">

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
						<input type="submit" class="btn btn-primary btn-block" value="Reservar">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#<?php echo $service['name']; ?>datePicker').datetimepicker({
         	format: 'DD/MM/YYYY',
         	widgetPositioning: {
            	horizontal: 'left',
            	vertical: 'top'
        	},
        	daysOfWeekDisabled: [6],
        	minDate: new Date(),
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
	});
</script>