<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
			 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128744750-1"></script>
			 <script>
				 window.dataLayer = window.dataLayer || [];
				 function gtag(){dataLayer.push(arguments);}
				 gtag('js', new Date());

				 gtag('config', 'UA-128744750-1');
			 </script>
			 <div class="form-group">
				 <script src="https://www.google.com/recaptcha/api.js?render=6LcWbLIUAAAAAEUH--dvi0CZGWgFsa6Lj9LZjl91"></script>
				 <script>
				 grecaptcha.ready(function() {
						 grecaptcha.execute('6LcWbLIUAAAAAEUH--dvi0CZGWgFsa6Lj9LZjl91', {action: 'homepage'}).then(function(token) {
								...
						 });
				 });
				 </script>
			 </div>
	<title><?php echo $page_title ?> - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Official website of Innovation and Entrepreneurship Development Cell, TKM College of Engineering.">
	<meta name="keywords" content="IEDC,IEDC TKMCE,TKMCE,TKM College of engineering,IEDC Kerala,Kerala Startup mission,KSUM">

	<link rel="shortcut icon" href="<?=base_url()?>assets/front/images/icon.png">
	<link href="<?=base_url()?>assets/front/css/plugins.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/front/css/style.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/front/css/responsive.css" rel="stylesheet">
</head>

<body>

		<section class="fullscreen">
			<div class="container container-fullscreen">
				<div style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);">
					<div class="text-center m-b-30">
						<a href="<?=base_url()?>" class="logo">
							<img src="<?=base_url()?>/theme/images/logo.png" alt="IEDC_Logo">
						</a>
					</div>
					<div class="row">
						<div class="center p-50 background-white b-r-6">
								<div class="text-left form-group">
									<a href="<?php echo $loginURL; ?>" type="button" class="btn">Sign in with google</a>
								</div>
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

	<script src="<?=base_url()?>assets/front/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/front/js/plugins.js"></script>
	<script src="<?=base_url()?>assets/front/js/functions.js"></script>

</body>

</html>
