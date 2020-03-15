<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php foreach ($userinfo as $row) { ?>
	<title><?=$row['fullname']?> | Dashboard - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>

	<script>
	$('select[name=business_ownership]').change(function () {
	    if ($(this).val() == 'other') {
	        $('#bussinessOwnershipOther').show();
	    } else {
	        $('#bussinessOwnershipOther').hide();
	    }
	});
	</script>
	<script>
	var html = $('span').html();
	html = html.replace(/((\w+\W+){5})/, '$1<br/>');
	$('div').html(html);
	</script>
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/vendors/core/core.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/dashboard/css/demo_1/style.css">
	<link rel="shortcut icon" href="<?=base_url()?>assets/front/images/icon.png">
	<style>
		#bussinessOwnershipOther{display:none;}
	</style>

</head>

<body>
	<div class="main-wrapper">

		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="#" class="sidebar-brand">
					IEDC<span>TKMCE</span>
				</a>
				<div class="sidebar-toggler not-active">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar-body">
				<ul class="nav">
					<li class="nav-item nav-category">Main</li>
					<li class="nav-item">
						<a href="<?=base_url()?>user/dashboard" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
							<span class="link-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item nav-category">TOOLS</li>
					<li class="nav-item">
						<a href="<?=base_url()?>user/dashboard/maker-library" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
								<span class="link-title">Maker Library</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>user/dashboard" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
								<span class="link-title">Project Proposal</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>user/dashboard" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>
								<span class="link-title">Server Accsess</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>user/dashboard/incubation-application" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="link-title">Incubation Application</span>
						</a>
					</li>
					<hr>
					<?php if($admin==TRUE){ ?>
					<li class="nav-item nav-category">ADMIN TOOLS</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/dashboard/ai-ml" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="link-title">AI & ML Workshop</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/dashboard/innovate-4-tkm" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="link-title">Innovate 4 TKM</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/dashboard/add-user" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="link-title">Add User</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url()?>admin/dashboard/maker-library" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
							<span class="link-title">Maker library</span>
						</a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</nav>

	<?php } ?>
