<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php foreach ($userinfo as $row) { ?>
		<title><?= $row['fullname'] ?> | Dashboard - Innovation and Entrepreneurship Development Cell, TKM College of Engineering</title>
		<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/jquery-steps/jquery.steps.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/core/core.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/fonts/feather-font/css/iconfont.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/css/demo_1/style.css">
		<link rel="shortcut icon" href="<?= base_url() ?>assets/front/images/icon.png">
		<link rel="stylesheet" href="<?= base_url() ?>assets/dashboard/vendors/sweetalert2/sweetalert2.min.css">


</head>

<body>
	<div class="main-wrapper">

		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="<?= base_url() ?>" class="sidebar-brand">
					IEDC TKMCE
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
						<a href="<?= base_url() ?>user/dashboard" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
								<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
								<polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
								<line x1="12" y1="22.08" x2="12" y2="12"></line>
							</svg>
							<span class="link-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item nav-category">TOOLS</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/maker-library" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-anchor link-icon">
								<circle cx="12" cy="5" r="3"></circle>
								<line x1="12" y1="22" x2="12" y2="8"></line>
								<path d="M5 12H2a10 10 0 0 0 20 0h-3"></path>
							</svg>
							<span class="link-title">Maker Library</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/project-proposal" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather link-icon">
								<path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
								<line x1="16" y1="8" x2="2" y2="22"></line>
								<line x1="17.5" y1="15" x2="9" y2="15"></line>
							</svg>
							<span class="link-title">Project Proposal</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/incubation-application" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox link-icon">
								<polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
								<path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
							</svg>
							<span class="link-title">Pre Incubation</span>
						</a>
					</li>

					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/server-access" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cloud-off link-icon">
								<path d="M22.61 16.95A5 5 0 0 0 18 10h-1.26a8 8 0 0 0-7.05-6M5 5a8 8 0 0 0 4 15h9a5 5 0 0 0 1.7-.3"></path>
								<line x1="1" y1="1" x2="23" y2="23"></line>
							</svg>
							<span class="link-title">Server access</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/schedule-meeting" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar link-icon">
								<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="16" y1="2" x2="16" y2="6"></line>
								<line x1="8" y1="2" x2="8" y2="6"></line>
								<line x1="3" y1="10" x2="21" y2="10"></line>
							</svg>
							<span class="link-title">Schedule meeting</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>user/dashboard/business-model" class="nav-link">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout link-icon">
								<rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
								<line x1="3" y1="9" x2="21" y2="9"></line>
								<line x1="9" y1="21" x2="9" y2="9"></line>
							</svg>
							<span class="link-title">Business Model</span>
						</a>
					</li>
					<hr>
					<?php if ($admin == TRUE) { ?>
						<li class="nav-item nav-category">ADMIN TOOLS</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/volunteer-database" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Volunteer Database </span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/project-proposals" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Project Proposals </span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/execom-registration" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Execom Registration</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/ai-ml" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">AI & ML Workshop</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/innovate-4-tkm" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Innovate 4 TKM</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/add-user" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Add User</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/maker-library-requests" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Maker library requests</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/add-new-maker-component" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Add new maker Component </span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/edit-maker-library" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">Edit maker Library</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="<?= base_url() ?>admin/dashboard/new-membership" class="nav-link">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square link-icon">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<span class="link-title">New Membership Reg</span>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>

	<?php } ?>