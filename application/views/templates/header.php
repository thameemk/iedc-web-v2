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
	<title><?php echo $page_title ?> - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Official website of Innovation and Entrepreneurship Development Cell, TKM College of Engineering.">
	<meta name="keywords" content="IEDC,IEDC TKMCE,TKMCE,TKM College of engineering,IEDC Kerala,Kerala Startup mission,KSUM">

	<link rel="shortcut icon" href="<?= base_url() ?>assets/front/images/icon.png">
	<link href="<?= base_url() ?>assets/front/css/plugins.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>assets/front/css/responsive.css" rel="stylesheet">
	<style>
		.g-recaptcha {
			margin: 0 0 25px 0;
		}

		.collapse.in {
			display: inline !important;
		}
	</style>
</head>

<body>
	<div class="body-inner">

		<header id="header">
			<div class="header-inner">
				<div class="container">

					<div id="logo">
						<a href="<?= base_url() ?>" class="logo" data-src-dark="<?= base_url() ?>assets/front/images/logo.png">
							<img src="<?= base_url() ?>assets/front/images/logo.png" alt="IEDC Logo" class="p-2"> </a>
					</div>

					<div id="mainMenu-trigger">
						<button class="lines-button x"> <span class="lines"></span> </button>
					</div>

					<div id="mainMenu">
						<div class="container">
							<nav>
								<ul>
									<li><a href="<?= base_url() ?>">Home</a></li>
									<li class="dropdown"> <a href="#">Initiatives</a>
										<ul class="dropdown-menu">
											<li> <a href="<?= base_url() ?>ircell">IR cell</a> </li>
											<li> <a href="<?= base_url() ?>ecell">E-cell</a> </li>
											<li> <a href="<?= base_url() ?>communities">Communities</a> </li>
										</ul>
									</li>
									<li class="dropdown"> <a href="#">Team</a>
										<ul class="dropdown-menu">
											<li> <a href="<?= base_url() ?>excom">Excom
												</a> </li>
											<li> <a href="<?= base_url() ?>core-team">Core team
												</a> </li>
											<li> <a href="<?= base_url() ?>web-team">Web Team</a>
											</li>
										</ul>
									</li>
									<li> <a href="<?= base_url() ?>events">Events</a></li>
									<li> <a href="<?= base_url() ?>contact">Contact</a></li>
									<?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
										<li> <a href="<?php echo $loginURL ?>">Login</a></li>
									<?php } else { ?>
										<li> <a href="<?= base_url() ?>user/dashboard">My Profile</a></li>
									<?php } ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>