<!-- LogginTemplate.php -->
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgrounds/main_bg_1.jpg)" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>

	
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">

				<div class="row row-mt-15em">
					<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
						<span class="intro-text-small">Bienvenidos a <a href="<?php $config->printPath(''); ?>" target="_blank">Cut!</a></span>
						<h1 class="cursive-font"><?php echo $user; ?></h1>	
					</div>
					<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">

								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
										<h3 class="cursive-font">Cambiar Datos Contacto</h3>
										<form action="" method="POST">
											
											<input type="hidden" name="action" value="changeDataCommerce">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="activities">Ciudad</label>
													<select name="city" id="activities" class="form-control" onchange="swapData();">
														
														<?php foreach ($cities as $value) { ?>
														<option class="force_black" value="<?php echo $value; ?>"><?php echo $value; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">Direccion</label>
													<input type="text" name="address" class="form-control" >
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">Email</label>
													<input type="text" name="email" class="form-control">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12" style="margin-top:20px;">
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