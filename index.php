<?php
require_once 'backend/includes/_db.php';
global $db;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Agro Harvest | Inicio</title>
<!-- resoluciones mov -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Agro Harvest Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
	
	<!-- css  -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!--  estilos css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css -->
	
	<link href="css/css_slider.css" type="text/css" rel="stylesheet" media="all">

	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Thasadith:400,400i,700,700i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
	<!-- //google fonts -->
	
</head>
<body>

<!-- header -->
<header>
	<div class="container">
		<!-- nav -->
		<nav class="py-4 d-lg-flex">
			<div id="logo">
				<h1> <a href="index.html"><span class="fa fa-leaf"></span> Agro Harvest</a></h1>
			</div>
			<label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
			<input type="checkbox" id="drop" />
			<ul class="menu mt-md-2 ml-auto">
				<li class="mr-lg-4 mr-2 active"><a href="index.php">Inicio</a></li>
				<li class="mr-lg-4 mr-2"><a href="about.php">Acerca De</a></li>
				<li class="mr-lg-4 mr-2"><a href="services.php">Servicios</a></li>
				<li class="mr-lg-4 mr-2"><a href="gallery.php">Galeria</a></li>
				<li class="mr-lg-4 mr-2"><a href="contact.php">Contacto</a></li>
				<li class="mr-lg-4 mr-2"><a href="backend/index.html">Entrar</a></li>
				<li class="mr-lg-4 mr-2"><span><span class="fa fa-phone"></span> +12 345 6789</span></li>
			</ul>
		</nav>
		<!-- //nav -->
	</div>
</header>
<!-- //header -->

<!-- banner -->
<section class="banner_w3lspvt" id="home">
	<div class="csslider infinity" id="slider1">
		<input type="radio" name="slides" checked="checked" id="slides_1" />
		<input type="radio" name="slides" id="slides_2" />
		<input type="radio" name="slides" id="slides_3" />
		<input type="radio" name="slides" id="slides_4" />
		<ul>
			<li>
				<div class="banner-top">
					<div class="overlay">
						<div class="container">
							<div class="w3layouts-banner-info text-center">
								<h3 class="text-wh">Cosecha</h3>
								<h4 class="text-wh mx-auto my-4">Cultivando nuevos cultivos para que los agricultores aumenten las ganancias</h4>
								<p class="text-li mx-auto mt-2">Ut enim ad minim quis nostrud exerci sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua nostrud exerci sed.</p>
								<a href="about.html" class="button-style mt-sm-5 mt-4">Lee mas</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="banner-top1">
					<div class="overlay1">
						<div class="container">
							<div class="w3layouts-banner-info text-center">
								<h3 class="text-wh">Agricultura</h3>
								<h4 class="text-wh mx-auto my-4">Cultivando nuevos cultivos para que los agricultores aumenten sus ganancias.</h4>
								<p class="text-li mx-auto mt-2">Ut enim ad minim quis nostrud exerci sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua nostrud exerci sed.</p>
								<a href="about.html" class="button-style mt-sm-5 mt-4">Lee mas</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="banner-top2">
					<div class="overlay">
						<div class="container">
							<div class="w3layouts-banner-info text-center">
								<h3 class="text-wh">Cultivando</h3>
								<h4 class="text-wh mx-auto my-4">Cultivando nuevos cultivos para que los agricultores aumenten sus ganancias.</h4>
								<p class="text-li mx-auto mt-2">Ut enim ad minim quis nostrud exerci sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua nostrud exerci sed.</p>
								<a href="about.html" class="button-style mt-sm-5 mt-4">Lee mas</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="banner-top3">
					<div class="overlay1">
						<div class="container">
							<div class="w3layouts-banner-info text-center">
								<h3 class="text-wh">Cosecha</h3>
								<h4 class="text-wh mx-auto my-4">
									Cultivando nuevos cultivos para que los agricultores aumenten sus ganancias.</h4>
								<p class="text-li mx-auto mt-2">Ut enim ad minim quis nostrud exerci sed do eiusmod tempor incididunt ut
									labore et dolore magna aliqua nostrud exerci sed.</p>
								<a href="about.html" class="button-style mt-sm-5 mt-4">Lee mas</a>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="arrows">
			<label for="slides_1"></label>
			<label for="slides_2"></label>
			<label for="slides_3"></label>
			<label for="slides_4"></label>
		</div>
	</div>
</section>
<!-- //banner -->

<!-- acerca -->
<section class="about py-5">
	<div class="container py-md-4">
		<h3 class="heading text-center mb-4">Mejor empresa de agricultura y cosecha</h3>
		<p class="about-text mx-auto text-center">El resultado de nuestro trabajo es recolectado siempre pensando en ti. Por eso nos comprometemos a cuidar y seleccionar, el fruto de tu trabajo como si fuera el nuestro.</p>
		<div class="feature-grids row mt-5 text-center">
			<?php
				$cosecha = $db->select("cosecha",["cosecha.cos_nom", "cosecha.cos_ico", "cosecha.cos_desc"]);
				foreach($cosecha as $key => $cos){
			?>
			<div class="col-lg-4 col-md-6 ">
				<div class="bottom-gd px-2 text-center">
					<div class="f-icon">
						<span class="<?php echo $cos["cos_ico"];?>" aria-hidden="true"></span>
					</div>
					<h3 class="mt-4"> <?php echo $cos["cos_nom"];?></h3>
					<p class="mt-3"><?php echo $cos["cos_desc"];?>.</p>
				</div>
			</div>
			<?php
				}
			/*<div class="col-lg-4 col-md-6 mt-md-0 mt-4">
				<div class="bottom-gd px-2 text-center">
					<div class="f-icon">
						<span class="fa fa-apple" aria-hidden="true"></span>
					</div>
					<h3 class="mt-4"> Frutas</h3>
					<p class="mt-3">Integer sit amet mattis quam, sit amet ul tricies velit. Praesent ullam corper dui turpis dolor sit amet quam.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
				<div class="bottom-gd px-2 text-center">
					<div class="f-icon">
						<span class="fa fa-pagelines" aria-hidden="true"></span>
					</div>
					<h3 class="mt-4">Vegetales</h3>
					<p class="mt-3">Integer sit amet mattis quam, sit amet ul tricies velit. Praesent ullam corper dui turpis dolor sit amet quam.</p>
				</div>
			</div>
			*/?>
		</div>
	</div>
</section>
<!-- //acerca -->

<!-- porque nosotrso -->
<section class="serives-agile py-5" id="works">
	<div class="container py-md-5">
		<h3 class="heading mb-5 text-center">¿Por qué elegirnos?</h3>
		<div class="welcome-bottom text-center">
			<?php
				$caracteristicas = $db->select("caracteristicas",["caracteristicas.car_nom", "caracteristicas.car_desc", "caracteristicas.car_ico"]);
				foreach($caracteristicas as $key => $car){
			?>
			<div class="welcome-grid">
				<span class="<?php echo $car["car_ico"];?>"></span>
				<h4 class="my-3"><?php echo $car["car_nom"];?></h4>
				<p><?php echo $car["car_desc"];?></p>
			</div>
			<?php
				} 
			/*<div class="welcome-grid">
				<span class="fa fa-skyatlas"></span>
				<h4 class="my-3">Rasgos de la semilla</h4>
				<p>quis nostrum ullamet corporis suscipit.</p>
			</div>

			<div class="welcome-grid mt-md-0 mt-5">
				<span class="fa fa-yelp"></span>
				<h4 class="my-3">La seguridad</h4>
				<p>quis nostrum ullamet corporis suscipit.</p>
			</div>
			<div class="welcome-grid mt-lg-0 mt-md-4 mt-5">
				<span class="fa fa-viadeo"></span>
				<h4 class="my-3">Cultivo</h4>
				<p>quis nostrum ullamet corporis suscipit.</p>
			</div>
			<div class="welcome-grid mt-lg-0 mt-md-4 mt-5">
				<span class="fa fa-pagelines"></span>
				<h4 class="my-3">Ambiente</h4>
				<p>quis nostrum ullamet corporis suscipit.</p>
			</div>
			*/?>
			<div class="clearfix"></div>
			
		</div>
	</div>
</section>
<!-- porque nosotros -->

<!-- valores -->
<section class="core-value py-5">
	<div class="container py-md-4">
		<h3 class="heading mb-sm-5 mb-4 text-center">Nuestros valores mas importantes</h3>
		<div class="row core-grids">
			<div class="col-lg-6 core-left">	
				<img src="images/core.jpg" class="img-fliud" alt="" />
			</div>
			<div class="col-lg-6 core-right">
				<h4 class="mt-4">Mejorar la agricultura, mejorar la vida, cultivar nuevos cultivos para que los agricultores aumenten las ganancias.</h4>
				<p class="mt-3">Integer sit amet mattis quam, sit amet ultricies velit. Praesent ullam corper dui turpis dolor sit amet quam.
				Nulla commodo gravida porttitor. Aenean posuere lacus quis leo imperdiet laoreet. Proin vulputate semper odio quam. Nulla commodo 
				gravida porttitor. Aenean posuere lacus quis.</p>
			</div>
		</div>
	</div>
</section>
<!-- //valores -->
	
<!-- texto -->
<section class="background-img">
	<div class="overlay-clr py-5">
		<div class="container py-md-3">
			<div class="row core-grids">
				<div class="col-lg-4 bg-left">	
					<h4 class="">Somos innovadores en el negocio agrícola. Nuestro objetivo es llevar alimentos orgánicos saludables a todas las personas.</h4>
				</div>
				<div class="col-lg-5 col-md-7 bg-middle mt-lg-0 mt-4">	
					<p class="">Integer sit amet mattis quam, sit amet dol ultricies velit. Praesent ullam corper duits turpis dolor sit amet quam.
					Nulla comodol gravida porttitor. Aenean posuere lacusnt quis leo imperdiet laoreet. Proin vulputat.</p>
					<p class="mt-3">Integer sit ut amet mattis quam, sit amet ultricies velit. Praesent ullam corper dui turpis dolor sit amet quam.
					Nulla sed commodo gravida porttitor.</p>
				</div>
				<div class="col-lg-3 col-md-5 bg-right mt-lg-0 mt-4">	
					<ul>
						<li><span class="fa fa-pagelines"></span> Cultivo de cultivos</li>
						<li><span class="fa fa-pagelines"></span> Tierras de cultivo</li>
						<li><span class="fa fa-pagelines"></span> Cosecha de cultivos</li>
						<li><span class="fa fa-pagelines"></span> Mejorando la agricultura</li>
						<li><span class="fa fa-pagelines"></span> Innovadores en el negocio agrícola.</li>
						<li><span class="fa fa-pagelines"></span> Robots Agrícolas</li>
						<li><span class="fa fa-pagelines"></span> Granos y semillas oleaginosas</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //texto -->

<!-- servicios -->
<section class="blog py-5">
		<div class="container py-md-5">
			<h3 class="heading mb-sm-5 mb-4 text-center"> Nuestros productos y servicios</h3>
			<div class="row blog-grids">
			<?php
				$productos = $db->select("productos",["productos.pro_nom", "productos.pro_desc", "productos.pro_img"]);
				foreach($productos as $key => $pro){
			?>
			
				<div class="col-lg-4 col-md-6 blog-left mb-lg-0 mb-sm-5 pb-lg-0 pb-5">	
					<img src="<?php echo $pro["pro_img"];?>" class="img-fliud" alt="" />
					<div class="blog-info">
						<h4><?php echo $pro["pro_nom"];?><span class="fa fa-pagelines"></span></h4>
						<p class="mt-2"><?php echo $pro["pro_desc"];?></p>
					</div>
				</div>
				<?php
				}
				/*<div class="col-lg-4 col-md-6 blog-middle mb-lg-0 mb-sm-5 pb-lg-0 pb-md-5">	
					<img src="images/s2.jpg" class="img-fliud" alt="" />
					<div class="blog-info">
						<h4>Cultivo <span class="fa fa-pagelines"></span></h4>
						<p class="mt-2">Integer sit ut amet mattis quam, sit amet ultricies velit. Praesent ullam corper dui turpis sit.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 blog-right mt-lg-0 mt-5 pt-lg-0 pt-md-5">
					<img src="images/s3.jpg" class="img-fliud" alt="" />
					<div class="blog-info">
						<h4>Cosecha <span class="fa fa-pagelines"></span></h4>
						<p class="mt-2">Integer sit ut amet mattis quam, sit amet ultricies velit. Praesent ullam corper dui turpis sit.</p>
					</div>
				</div>
				*/?>
			</div>
		</div>
	</section>
<!-- //servicios -->

<!-- texto -->
<section class="text py-5">
	<div class="container py-md-3 text-center">		
		<div class="row">
			<div class="col-12">
				<h3 class="mb-4 heading">El mejor momento para <span>Plantar un arbol</span> es ahora.</h3>
				<p>Sed ut perspiciatis unde omnis natus error dolor volup tatem ed accus antium dolor emque
				laudantium, totam rem aperiam, eaqu ipsa quae ab illo quasi architi ecto beatae vitae dicta
				sunt dolor ipsum.</p>
				<a href="services.html" class="btn mr-3"> Nuestros servicios</a>
				<a href="contact.html" class="btn btn1"> Contáctenos</a>
			</div>		
		</div>		
	</div>		
</section>
<!-- //texto -->

<!-- footer -->
<footer class="text-center py-5">
	<div class="container py-md-3">
		<!-- logo -->
		<h2 class="logo2 text-center">
			<a href="index.html">
				<span class="fa fa-leaf"></span> Agro Harvest
			</a>
		</h2>
		<!-- //logo -->
		<!-- datos -->
		<div class="contact-left-footer mt-4">
			<ul>
				<li>
					<p>
						<span class="fa fa-map-marker mr-2"></span>Agro Harvest, Cancun, Mexico
					</p>
				</li>
				<li class="mx-4">
					<p>
						<span class="fa fa-phone mr-2"></span>+12(345) 6789 111.
					</p>
				</li>
				<li>
					<p class="text-wh">
						<span class="fa fa-envelope-open mr-2"></span>
						<a href="mailto:info@example.com">Example@gmail.com</a>
					</p>
				</li>
			</ul>
		</div>
		<!-- //datos -->
		<!-- redes -->
		<div class="footercopy-social my-4">
			<ul>
				<li>
					<a href="#">
						<span class="fa fa-facebook-square"></span>
					</a>
				</li>
				<li class="mx-2">
					<a href="#">
						<span class="fa fa-twitter-square"></span>
					</a>
				</li>
				<li class="">
					<a href="#">
						<span class="fa fa-google-plus-square"></span>
					</a>
				</li>
				<li class="mx-2">
					<a href="#">
						<span class="fa fa-linkedin-square"></span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="fa fa-rss-square"></span>
					</a>
				</li>
				<li class="ml-2">
					<a href="#">
						<span class="fa fa-pinterest-square"></span>
					</a>
				</li>
			</ul>
		</div>
		<!-- //redes -->
	</div>
</footer>
<!-- //footer -->

<!-- flechita de regreso -->
<a href="#home" class="move-top text-center"></a>
<!-- //flechista de regreso -->
	
</body>
</html>
