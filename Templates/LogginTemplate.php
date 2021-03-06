<!-- LogginTemplate.php -->
<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/backgrounds/main_bg_1.jpg)" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>

	
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">

				<div class="row row-mt-15em">
					<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
						<span class="intro-text-small">Bienvenidos a <a href="<?php $config->printPath(''); ?>" target="_blank">Cut!</a></span>
						<h1 class="cursive-font">Iniciar Sesión!</h1>	
					</div>
					<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">

								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
										<h3 class="cursive-font">Loggin</h3>
										<form action="" method="POST">
											<input type="hidden" name="action" value="loggin">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">Usuario</label>
													<input name="username" type="text" class="form-control">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="date-start">Contraseña</label>
													<input name="password" type="password" class="form-control">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-block" value="Iniciar sesión">
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