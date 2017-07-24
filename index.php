<?php
	session_start();
	if($_SESSION['denied'] == true){
		echo 'Access Denied';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SM. DUKAN | A reliable solution for all your needs</title>
	<meta name="description" content="A reliable solution for all your needs"/>
	<meta name="author" content="Ahmed Baig"/>
	<meta name="keywords" content="waqar, rehmat, sm, dukan, store, installments, gilgit, smdukan, ahmed baig, ahmed, baig"/>
	<!--STYLESHEETS-->
	<link rel="apple-touch-icon" sizes="76x76" href="dash/assets/img/apple-img.png"/>
	<link rel="shortcut icon" type="image/png" href="dash/assets/img/favicon.png"/>
	<link rel="stylesheet" href="css/login.css">
	<link rel="shortcut icon" href="favicon.png">
	<link rel="stylesheet" href="css/login.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/queries.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<!--CDN Imports-->
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]-->
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<!--[endif]-->

	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7243260-2']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
	</script>

	<style>
		body #cdawrap {
			right: auto;
			top: 15px;
			left: 15px;
			font-family: 'Helvetica Neue', 'Varela Round', Arial, sans-serif;
		}

		body #cda-remove:before {
			font-weight: 700;
			line-height: 22px;
			font-size: 14px;
		}
	</style>
</head>
<body id="top">
	<header id="home">
		<!--NAVIGATION -->
		<nav>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
						<nav class="pull">
							<ul class="top-nav">
								<li><a href="#intro">Introduction <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
								</li>
								<li><a href="#features">Features <span class="indicator"><i
													class="fa fa-angle-right"></i></span></a></li>
								<li><a href="#quotes">Client Responses <span class="indicator"><i
													class="fa fa-angle-right"></i></span></a></li>
								<li><a href="#portfolio">Pictures <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
								</li>
								<li><a href="#contact">Get in Touch <span class="indicator"><i
													class="fa fa-angle-right"></i></span></a></li>
								<li><a href="#datacenter">Search Records <span class="indicator"><i
													class="fa fa-angle-right"></i></span></a></li>
								<li><a href="javascript:void(0)" id="loginP" role="button" data-toggle="modal"
								       data-target=".login">Login <span class="indicator"><i class="fa fa-angle-right"></i></span></a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</nav>
		<!--/NAVIGATION-->
		<!--HERO-->
		<section class="hero" id="hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-right navicon">
						<a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center inner">
						<div class="text jumbotron">
							<h1 class="animated fadeInDown frontText page-header"><span>SM.</span>DUKAN</h1>
							<p class="animated fadeInUp delay-05s">A reliable <em>Solution</em> for all your needs</p>
							<form class="form-inline text-center">
								<div class="form-group text-center">
									<input type="text" class="form-control" size="11" id="InputID" placeholder="">
								</div>
								<div class="row  text-center">
									<div class="col-md-6 col-md-offset-3">
										<button type="submit" class="btn btn-lg search">Search records</button>
										<div class="help-Btn">
											<a tabindex="0" id="clickme" class="btn btn-lg fa fa-gears" role="button"
											   data-placement="bottom" data-toggle="popover"
											   data-trigger="click hover focus" title="Search Engine Guide"
											   data-content="You can enter any value to retrieve your data. Ex:You can enter your name or your given ID or product name to search for your data."></a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/HERO-->
	</header>
	<!--Intro-->
	<section class="intro text-center section-padding" id="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 wp1">
					<h1 class="arrow">Who are we?</h1>
					<p>We are a company that provides installments to people who have migrated
					   from their villages and are in need of basic items such as phones, laptops
					   or books for students and hostels for women to continue their lives in a
					   modern and face paced environment.</p>
				</div>
			</div>
		</div>
	</section>
	<!--/Intro-->
	<section class="akhs text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>Our nobel actions<span> leading to your <em>Comfortable lifestyle</em></span></h1>
					<a href="#features" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!--Features-->
	<section class="features text-center section-padding" id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="arrow">You are in safe hands</h1>
					<div class="features-wrapper">
						<div class="col-md-4 wp2">
							<div class="icon">
								<i class="fa fa-shield shadow"></i>
							</div>
							<h1>Security</h1>
							<p>Your installment records, data and investments are safe with us and we ensure that you can
							   get they most comfort in doing business with us.</p>
						</div>
						<div class="col-md-4 wp2 delay-05s">
							<div class="icon">
								<i class="fa fa-umbrella shadow"></i>
							</div>
							<h1>Flexibility</h1>
							<p>Our terms for payments are much flexible. With a payment date for upto 6 months, you can
							   return with ease.</p>
						</div>
						<div class="col-md-4 wp2 delay-1s">
							<div class="icon">
								<i class="fa fa-heart shadow"></i>
							</div>
							<h1>Reliability</h1>
							<p>We ensure that our customers get their needs fulfilled and get the products they desire.
							   Through us, all our worries can fade away.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Features-->
	<!--quotes-->
	<section class="text-center" id="quotes">
		<div class="container-fluid nopadding responsive-services">
			<div class="wrapper">
				<div class="people">
					<div class="wp3"></div>
				</div>
				<div class="fluid-white"></div>
			</div>
			<div class="container designs">
				<div class="row">
					<div class="col-md-5 col-md-offset-7">
						<div id="servicesSlider">
							<h1 class="arrow">Some of our satisfied customers</h1>
							<ul class="slides">
								<li>
									<blockquote>
										<p>Best deals and truly a home like environment.</p>
										<footer>Sirsyed University student<cite title="Rafat Ali Rajput"> Rafat Ali</cite>
										</footer>
									</blockquote>
									<blockquote>
										<p>I know what I want now and I know where to find it.</p>
										<footer>Skardu Immigrant<cite title="Rubina Shabir"> Rubina Shabir</cite></footer>
									</blockquote>
								</li>
								<li>
									<blockquote>
										<p>Installment terms that I can afford.</p>
										<footer>Web Developer <cite title="Ahmed Baig">Ahmed Baig</cite></footer>
									</blockquote>
									<blockquote>
										<p>Such comfort doing business with the people I know and trust.</p>
										<footer>Data analyst <cite>Afia Ahmed</cite></footer>
									</blockquote>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/quotes-->
	<section class="swag text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>Made by the people<span>You know and trust</span></h1>
					<a href="#portfolio" class="down-arrow-btn"><i class="fa fa-chevron-down"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!--Pictures-->
	<section class="portfolio text-center section-padding" id="portfolio">
		<div class="container">
			<div class="row">
				<div id="portfolioSlider">
					<h1 class="arrow">Our Gilgit, our Pictures</h1>
					<ul class="slides">
						<li>
							<div class="col-md-4 wp4">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-01.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 wp4 delay-05s">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-02.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 wp4 delay-1s">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-03.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="col-md-4 wp4">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-04.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 wp4 delay-05s">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-05.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4 wp4 delay-1s">
								<div class="overlay-effect effects clearfix">
									<div class="img">
										<img src="img/portfolio-06.jpg" alt="Gilgit Pictures">
										<div class="overlay">
											<a class="close-overlay hidden">x</a>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<div class="ignite-cta text-center">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="#contact" class="ignite-btn">Contact us today</a>
				</div>
			</div>
		</div>
	</div>
	<section class="subscribe text-center">
		<div class="container">
			<h1><i class="fa fa-paper-plane"></i><span>Subscribe to stay in the loop</span></h1>
			<form action="#">
				<input type="text" name="" value="" placeholder="" required>
				<input type="submit" name="" value="Send">
			</form>
		</div>
	</section>
	<section class="dark-bg text-center section-padding contact-wrap" id="contact">
		<a href="#top" class="up-btn"><i class="fa fa-chevron-up"></i></a>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="arrow">Drop us a line</h1>
				</div>
			</div>
			<div class="row contact-details">
				<div class="col-md-4">
					<div class="light-box box-hover">
						<h2><i class="fa fa-map-marker"></i><span>Address</span></h2>
						<p>Shop # G-6 Momin Centre, Near Fidai Hospital F.B Area Karachi</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="light-box box-hover">
						<h2><i class="fa fa-mobile"></i><span>Phone</span></h2>
						<p>0312 9923378</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="light-box box-hover">
						<h2><i class="fa fa-facebook-square"></i><span>Email</span></h2>
						<p><a href="https://www.facebook.com/smdukan/">facebook.com/smdukan/</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 credit pull-right">
					<p>Developed by <a href="https://www.linkedin.com/in/ahmedbaig1/"><em>AhmedBaig</em></a></p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Modals -->
	<section class="loginModal">
		<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="Login-modal">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/waypoints.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/onloads.js"></script>
</body>
</html>