<!-- View generator, not a class -->
<?php

include './Config.php';
include './Controller.php';

	//Creates the controller, wich manages the user requets
$controller = new Controller();

	//Define de const in proyect
$config = new Config();

	//Get the section we have to render the User HTTP requet
$section_to_render = $controller->getSection($_GET);

if($section_to_render == "busqueda"){
	$listaPeluquerias = $controller->getCommerceList($_GET);
}
if($section_to_render == "commerce"){
	$commerce = $controller->getCommerce($_GET);
}
if($section_to_render == "profile"){	
	$reservationList = $controller->getReservationList();
}

$message_0 = $controller->doActions($_GET);
$message_1 = $controller->doActions($_POST);

$user=""; $type="";
$user = $controller->getSession();
$type = $controller->getType();
$cities = $controller->getCompleteCityList();


?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cut! &mdash; Reserva online.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Cut! reservas online" />
	<meta name="keywords" content="Peluquería, reservas, online" />
	<meta name="author" content="mfidaf01 & jgarcj00" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<?php if(strlen($message_0)!=0 || strlen($message_1)!=0): ?>
		<div class="infobar">
			<?php 
			if(strlen($message_0)!=0)
				echo $message_0;
			else
				echo $message_1;

			?>
		</div>
	<?php endif; ?>

	<div class="gtco-loader"></div>
	
	<div id="page">


		<!-- <div class="page-inner"> -->
			<nav class="gtco-nav" role="navigation">


				<div class="gtco-container">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<div id="gtco-logo">

								<?php if($user != ""){ ?>
								<a href="<?php $config->printPath(''); ?>">
									<img height="50px" width="50px" src="<?php $config->printPath('');?>/images/users/profile.png">
								</a>
								<div style="display: inline; vertical-align: middle;" >
									<span style="font-size: 12px;"> Bienvenido de nuevo<a href="index.php?section=profile"><?php echo $user; ?></a></span>
								</div>
								<?php }else{ ?>
								<a href="<?php $config->printPath(''); ?>">
									<img height="50px" width="50px" src="<?php $config->printPath('');?>/images/logo/logo_1.png">
								</a>
								<?php } ?>
								
							</div>
							
						</div>
						<div class="col-xs-8 text-right menu-1">
							<ul>
								<li><a href="<?php $config->printPath('/index.php');?>">Principal</a></li>
								<!--<li class="has-dropdown">
									<a href="services.html">Servicios</a>
									<ul class="dropdown">
										<li><a href="#">Food Catering</a></li>
										<li><a href="#">Wedding Celebration</a></li>
										<li><a href="#">Birthday's Celebration</a></li>
									</ul>
								</li> -->
								<li><a href="<?php $config->printPath('?section=singup');?>"">Registrarse</a></li>
								<li class="btn-cta">
									<?php if($user==""): ?>
										<a href="<?php $config->printPath('?section=loggin');?>"><span>Iniciar Sesión</span></a>
									<?php else: ?>
										<a href="<?php $config->printPath('?action=closesession');?>"><span>Cerrar Sesión</span></a>
									<?php endif; ?>
								</li>
							</ul>	
						</div>
					</div>
				</div>
			</nav>
			<!-- FIRST CONTAINER (CONTAINER WHERE THE BACKGROUND IS) HEADER -->

			<?php 
			if($section_to_render == "" ){
				include "./Templates/NoSectionTemplate.php";
			}else if($section_to_render == "loggin"){
				include "./Templates/LogginTemplate.php";
			}else if($section_to_render == "singup"){
				include "./Templates/SingUpTemplate.php";
			}else if($section_to_render == "commerce"){
				include "./Templates/CommercePageHeader.php";
			}elseif($section_to_render == "profile"){
				if($type=="client")
					include "./Templates/NoSectionTemplate.php";
				else
					include "./Templates/CommercePageHeaderEditable.php";
			}else{
				include "./Templates/NoSectionTemplate.php";
			}
			?>
			<!--Resultados de la busqueda en caso de que se haya realizado ya.-->

			<div id="gtco-counter" class="gtco-section">
				<div class="gtco-container">
					<div class="row">

						<?php

						if($section_to_render == "busqueda"){
							include "./Views/busqueda.php";
						}else if($section_to_render == "commerce"){
							include "./Templates/CommercePageServices.php";
						}else if($section_to_render == "profile"){
							if($type=="client"):
								include "./Templates/ReservationsClientView.php";
							else:
								include "./Templates/TimetableAndNewService.php";
								include "./Templates/ReservationsCommerceView.php";
								include "./Templates/DeleteService.php";
							endif;
						}else{
							include "./Templates/DefaultTemplate.php";
						}
						?>

					</div>
				</div>
			</div>

			<footer id="gtco-footer" role="contentinfo" style="background-image: url(images/backgrounds/main_bg_1.jpg)" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row row-pb-md">




						<div class="col-md-12 text-center">
							<div class="gtco-widget">
								<h3>Donde encontrarnos.</h3>
								<ul class="gtco-quick-contact">
									<li><a href="#"><i class="icon-phone"></i>+34 657 11 43</a></li>
									<li><a href="#"><i class="icon-mail2"></i>mfidaf01@estudiantes.unileon.es</a></li>
									<li><a href="#"><i class="icon-chat"></i>Contacta con nosotros</a></li>
								</ul>
							</div>
							<div class="gtco-widget">
								<h3>Redes sociales</h3>
								<ul class="gtco-social-icons">
									<li><a target="_blank" href="https://twitter.com"><i class="icon-twitter"></i></a></li>
									<li><a target="_blank" href="https://facebook.com"><i class="icon-facebook"></i></a></li>
									<li><a target="_blank" href="https://linkedin.com"><i class="icon-linkedin"></i></a></li>
									<li><a target="_blank" href="https://cut.com"><i class="icon-dribbble"></i></a></li>
								</ul>
							</div>
						</div>
					</div>



				</div>
			</footer>
			<!-- </div> -->

		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
		</div>


		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- countTo -->
		<script src="js/jquery.countTo.js"></script>

		<!-- Stellar Parallax -->
		<script src="js/jquery.stellar.min.js"></script>

		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/magnific-popup-options.js"></script>

		<script src="js/moment.min.js"></script>
		<script src="js/es.js"></script>
		<script src="js/bootstrap-datetimepicker.min.js"></script>


		<!-- Main -->
		<script src="js/main.js"></script>

	</body>
</html>



