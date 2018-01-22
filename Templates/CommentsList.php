<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	<h2 class="cursive-font primary-color">Comentarios</h2>

	<?php
	if(count($comments)===0){
		echo "<p>Actualmente no tienen ningun comentario.</p>";
	}else{
		echo "<p>Te mostramos los comentarios de esta peluqueria.</p>";
	}
	?>

</div>
</div>
<div class="row">
	<?php
	foreach ($comments as $comment) {
	?>
	<div class="col-md-4">
		<div class="feature-center animate-box fadeIn animated-fast" data-animate-effect="fadeIn" style="color: #000;">
			<span class="icon">
				<i class="ti-comment"></i>
			</span>
			<h3><?php echo $comment['clientUsername']; ?><?php echo "  ".$comment['value']."/5"?></h3>
			<p><?php echo $comment['text']; ?></p>
		</div>
	</div>

	<?php
	?>

	<?php
	}
	?>
	<div class="col-md-12">

			<form action="" method="POST">
				<div class="row form-group">
					<input type="hidden" name="action" value="newComment">
					<input type="hidden" name="commerce" value="<?php echo $commerce['username']; ?>">
					<div class="row form-group">

						<div class="col-md-1">
							<select name="points" id="activities" class="form-control" >
								<option class="force_black" value="1">1</option>
								<option class="force_black" value="2">2</option>
								<option class="force_black" value="3">3</option>
								<option class="force_black" value="4">4</option>
								<option class="force_black" value="5">5</option>
							</select>
						</div>

						<div class="col-md-8">
							<input type="text" name="text" class="form-control" id="opentimePicker" placeholder="Deja aqui tu comentario.">
						</div>
						<div class="col-md-3">
							<input type="submit" class="btn btn-primary btn-block" value="Enviar">
						</div>
					</div>
				</div>
			</form>	
		</div>
