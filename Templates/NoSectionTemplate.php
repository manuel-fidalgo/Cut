<div class="row row-mt-15em">
	<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
		<span class="intro-text-small">Bienvenidos a <a href="<?php $config->printPath(''); ?>" target="_blank">Cut!</a></span>
		<h1 class="cursive-font">Reserva ya!</h1>	
	</div>
	<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
		<div class="form-wrap">
			<div class="tab">

				<div class="tab-content">
					<div class="tab-content-inner active" data-content="signup">
						<h3 class="cursive-font">Buscar peluqueria</h3>
						<form action="<?php $config->printPath('?section=busqueda')?>" method="POST">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="activities">Ciudad</label>
									<select name="#" id="activities" class="form-control">
										<?php
											//pedir al controlador las ciudades disponibles, pintarlas con una view 
										?>
										<option class="force_black" value="">Leon</option>
										<option class="force_black" value="">Zamora</option>
										<option class="force_black" value="">Salamanca</option>
										<option class="force_black" value="">Palencia</option>
										<option class="force_black" value="">Soria</option>
										<option class="force_black" value="">Burgos</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12">
									<label for="date-start">Nombre</label>
									<input type="text" class="form-control">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<input type="submit" class="btn btn-primary btn-block" value="Reserve Now">
								</div>
							</div>
						</form>	
					</div>


				</div>
			</div>
		</div>
	</div>
</div>