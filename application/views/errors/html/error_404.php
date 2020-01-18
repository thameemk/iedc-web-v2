<?php
$base_url = load_class('Config')->config['base_url'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>404 - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>

	<link rel="stylesheet" href="<?=$base_url?>assets/dashboard/vendors/core/core.css">

	<link rel="stylesheet" href="<?=$base_url?>assets/dashboard/fonts/feather-font/css/iconfont.css">

	<link rel="stylesheet" href="<?=$base_url?>assets/dashboard/css/demo_1/style.css">

	<link rel="shortcut icon" href="<?=$base_url?>assets/dashboard/images/favicon.png" />
</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
						<img src="<?=$base_url?>assets/dashboard/images/404.svg" class="img-fluid mb-2" alt="404">
						<h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">404</h1>
						<h4 class="mb-2">Page Not Found</h4>
						<h6 class="text-muted mb-3 text-center">Oopps!! The page you were looking for doesn't exist.</h6>
						<a href="<?=$base_url?>" class="btn btn-primary-muted">Back to home</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="<?=$base_url?>assets/dashboard/vendors/core/core.js"></script>

	<script src="<?=$base_url?>assets/dashboard/vendors/feather-icons/feather.min.js"></script>
	<script src="<?=$base_url?>assets/dashboard/js/template.js"></script>

</body>

</html>
