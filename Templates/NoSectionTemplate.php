<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgrounds/main_bg_1.jpg)" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>

	
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">

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
										<form action="index.php" method="GET">
											<input type="hidden" name="section" value="busqueda" />
											<div class="row form-group">
												<div class="col-md-12">
													<label for="activities">Ciudad</label>
													<select name="ciudad" id="activities" class="form-control">
														<?php
											//pedir al controlador las ciudades disponibles, pintarlas con una view 
														?>
														<option class="force_black" value="Leon">Leon</option>
														<option class="force_black" value="Zamora">Zamora</option>
														<option class="force_black" value="Salamanca">Salamanca</option>
														<option class="force_black" value="Palencia">Palencia</option>
														<option class="force_black" value="Soria">Soria</option>
														<option class="force_black" value="Burgos">Burgos</option>
													</select>
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">Nombre</label>
													<input type="text" class="form-control" name="nombre">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-block" value="Buscar">
												</div>
											</div>
										</form>	
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>