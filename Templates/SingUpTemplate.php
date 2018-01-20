<!-- LogginTemplate.php -->
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgrounds/main_bg_1.jpg)" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>

	
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">

				<script type="text/javascript" src="<?php $config->printPath('/js/swapData.js'); ?>"></script>

				<div class="row">

					<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
						<h1 class="cursive-font" style="text-align: center;">Registrartrate ahora!</h1>	
					</div>

					<div class="col-md-12 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">

								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
										<form action="#">
											<div class="row form-group">
												<div class="col-md-6">
													<label for="date-start">Nombre de usuario</label>
													<input type="text" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="date-start">Correo electronico</label>
													<input type="text" class="form-control">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-6">
													<label for="date-start">Contraseña</label>
													<input type="password" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="date-start">Repetir Contraseña</label>
													<input type="password" class="form-control">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<label for="activities">Soy...</label>
													<select name="#" id="activities" class="form-control" onchange="swapData();">
														<option class="force_black" value="peluqueria">Una peluqueria</option>
														<option class="force_black" value="cliente">Un cliente</option>
													</select>
												</div>
											</div>

											<!-- Campos especiales de la peluqueria -->
											<div class="row form-group special">
												<div class="col-md-4">
													<label for="date-start">CIF</label>
													<input type="text" class="form-control">
												</div>

												<div class="col-md-4">
													<label for="date-start">Direccion</label>
													<input type="text" class="form-control">
												</div>
												<div class="col-md-4">
													<label for="activities">Ciudad</label>
													<select name="#" id="activities" class="form-control">
														<?php
														//pedir al controlador las ciudades disponibles, pintarlas con una view 
														?>
														<option class="force_black" value="leon">Leon</option>
														<option class="force_black" value="zamora">Zamora</option>
														<option class="force_black" value="salamanca">Salamanca</option>
														<option class="force_black" value="palencia">Palencia</option>
														<option class="force_black" value="soria">Soria</option>
														<option class="force_black" value="burgos">Burgos</option>

													</select>
												</div>
											</div>
											<div class="row form-group special">
												
												<div class="col-md-6">
													<label for="date-start">Nombre comercial</label>
													<input type="text" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="date-start">Descripción</label>
													<input type="text" class="form-control">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-block" value="Enviar">
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