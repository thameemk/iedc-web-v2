<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128744750-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-128744750-1');
	</script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<title><?php echo $title ?> - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Official website of Innovation and Entrepreneurship Development Cell, TKM College of Engineering.">
	<meta name="keywords" content="IEDC,IEDC TKMCE,TKMCE,TKM College of engineering,IEDC Kerala,Kerala Startup mission,KSUM">

	<link rel="shortcut icon" href="<?=base_url()?>assets/front/images/icon.png">
	<link href="<?=base_url()?>assets/front/css/plugins.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/front/css/style.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/front/css/responsive.css" rel="stylesheet">
	<style>
		.g-recaptcha {
			margin: 0 0 25px 0;
		}
	</style>
</head>

<body>
	<div class="body-inner">

		<header id="header">
			<div class="header-inner">
				<div class="container">

					<div id="logo">
						<a href="<?=base_url()?>" class="logo" data-src-dark="<?=base_url()?>assets/front/images/logo.png">
							<img src="<?=base_url()?>assets/front/images/logo.png" alt="IEDC Logo"> </a>
					</div>

					<div id="mainMenu-trigger">
						<button class="lines-button x"> <span class="lines"></span> </button>
					</div>

					<div id="mainMenu">
						<div class="container">
							<nav>
								<ul>
									<li><a href="<?=base_url()?>">Home</a></li>
									<li class="dropdown"> <a href="#">Initiatives</a>
										<ul class="dropdown-menu">
											<li> <a href="<?=base_url()?>ircell">IR cell</a> </li>
											<li> <a href="<?=base_url()?>ecell">E-cell</a> </li>
											<li> <a href="<?=base_url()?>communities">Communities</a> </li>
										</ul>
									</li>
									<li class="dropdown"> <a href="#">Team</a>
										<ul class="dropdown-menu">
											<li> <a href="<?=base_url()?>execom">Execom
												</a> </li>
											<li> <a href="<?=base_url()?>web-team">Web Team</a>
											</li>
										</ul>
									</li>
									<li> <a href="<?=base_url()?>multi-stories">Stories</a></li>
									<li> <a href="<?=base_url()?>contact">Contact</a></li>								
									<li class="dropdown"> <a href="<?=base_url()?>myprofile">My Profile</a></li>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>

		<section id="page-title" data-parallax-image="<?= base_url() ?>images/parallax/5.jpg">
			<div class="container">
				<div class="page-title">
					<h1>Complete Profile</h1>

				</div>
				<div class="breadcrumb">
					<ul>
						<li><a href="<?= base_url() ?>">Home</a>
						</li>

						</li>
						<li class="active"><a href="<?= base_url() ?>profile/complete">Complete Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 center no-padding">
						<form class="form-transparent-grey" method="post">
							<div class="row">
								<div class="col-lg-12">
									<h3>Complete Profile</h3>
									<br>
								</div>
								<div class="col-lg-6 form-group">
									<label class="sr-only">Full Name</label>
									<input name="fullname" type="text" placeholder="Full Name" class="form-control">
								</div>
								<div class="col-lg-6 form-group">
									<label class="sr-only">Phone</label>
									<input name="phone" type="phone" placeholder="Phone Number" class="form-control">
								</div>
								<div class="col-lg-12 form-group">
									<div class="form-group">

										<select name="branch" class="form-control" id="exampleFormControlSelect1">
											<option value="">Branch</option>
											<option>M-Tech</option>
											<option>Architecture</option>
											<option>Chemical Engineering</option>
											<option>Civil Engineering</option>
											<option>Computer Science & Engineering</option>
											<option>Electronics & Communication Engineering</option>
											<option>Electrical & Electronics Engineering</option>
											<option>Master of Computer Application</option>
											<option>Mechanical Engineering</option>
											<option>Mechanical Production</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 form-group">
									</b><label><b>Course Duration</b></label>
									<select name="course_duration_from" class="form-control" id="exampleFormControlSelect1">
										<option value="">From</option>
										<option>2015</option>
										<option>2016</option>
										<option>2017</option>
										<option>2018</option>
										<option>2019</option>
									</select>
								</div>

								<div class="col-lg-6 form-group" style="margin-top: 27px;">
									<select name="course_duration_to" class="form-control" id="exampleFormControlSelect1">
										<option value="">To</option>
										<option>2019</option>
										<option>2020</option>
										<option>2021</option>
										<option>2022</option>
										<option>2023</option>
									</select>
								</div>
								<div class="col-lg-6 form-group">
									<label class="sr-only">Admission Number</label>
									<input name="admission_number" type="number" placeholder="Admission Number" class="form-control">
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="whyiedc" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Why IEDC ?"></textarea>
									</div>
								</div>
								<div class="col-lg-12 form-group">
									<button type="submit" class="btn" type="button">SUBMIT</button>
								</div>

		</section>

		<footer id="footer">
			<div class="footer-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="widget">
								<div class="widget-title">IEDC TKMCE</div>
								<a>About us</a>
								<p align="justify">The Innovation and Entrepreneurship Development Cell of TKMCE is an organisation that aims to promote the institutional vision....</p>
								<a href="<?=base_url()?>#about" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

							</div>
						</div>
						<div class="col-lg-7">
							<div class="row">
								<div class="col-lg-4">
									<div class="widget">
										<div class="widget-title">Discover</div>
										<ul class="list">
											<li><a href="<?=base_url()?>#about">About us</a></li>
											<li><a href="<?=base_url()?>#mission">Mission</a></li>
											<li><a href="<?=base_url()?>#vision">Vision</a></li>
											<li><a href="<?=base_url()?>profile">My profile</a></li>
											<li><a href="<?=base_url()?>stories">Stories</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="widget">
										<div class="widget-title">Pages</div>
										<ul class="list">
											<li><a href="<?=base_url()?>ircell">IR-Cell</a></li>
											<li><a href="<?=base_url()?>ecell">E-Cell</a></li>
											<li><a href="<?=base_url()?>communities">Communities</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-content">
				<div class="container">
					<div class="copyright-text text-center">&copy; 2019 IEDC TKMCE</div>
				</div>
			</div>
		</footer>

	</div>


	<a id="scrollTop"><i class="icon-chevron-up1"></i><i class="icon-chevron-up1"></i></a>

	<script src="<?=base_url()?>assets/front/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/front/js/plugins.js"></script>
	<script src="<?=base_url()?>assets/front/js/functions.js"></script>

</body>

</html>
