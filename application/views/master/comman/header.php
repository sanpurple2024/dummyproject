<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Sanpurple I Fast build Admin dashboard for any platform</title>
	<meta name="description" content="Sanpurple is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Sanpurple Admin, Sanpurpleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	 <link rel="stylesheet" href="<?php echo base_url();?>assets/common/css/jquery-confirm.min.css" />
	<!-- Data table CSS -->
	<link href="<?php echo base_url();?>assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo base_url();?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>assets/dist/css/style.css" rel="stylesheet" type="text/css">
	<!--<link href="<?php echo base_url();?>assets/vendors/bower_components/bootstrap/dist/css/less/dropdowns.less" rel="stylesheet" type="text/css">-->

</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="<?php echo base_url();?>">
							<!--<img class="brand-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="brand"/>-->
							
							<img style="width: 130px; height: auto;" class="brand-img" src="<?php echo base_url();?>assets/dist/img/logo.png" alt="brand"/>
							<!--<span class="brand-text">Sanpurple</span>-->
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
		
			</div>
			<!--<div id="mobile_only_nav" class="mobile-only-nav pull-right">-->
			<!--	<ul class="nav navbar-right top-nav pull-right">-->
				
			<!--		<li class="dropdown alert-drp">-->
			<!--			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>-->
			<!--			<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">-->
			<!--				<li>-->
			<!--					<div class="notification-box-head-wrap">-->
			<!--						<span class="notification-box-head pull-left inline-block">notifications</span>-->
			<!--						<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>-->
			<!--						<div class="clearfix"></div>-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--					</div>-->
			<!--				</li>-->
			<!--				<li>-->
			<!--					<div class="streamline message-nicescroll-bar">-->
			<!--						<div class="sl-item">-->
			<!--							<a href="javascript:void(0)">-->
			<!--								<div class="icon bg-green">-->
			<!--									<i class="zmdi zmdi-flag"></i>-->
			<!--								</div>-->
			<!--								<div class="sl-content">-->
			<!--									<span class="inline-block capitalize-font  pull-left truncate head-notifications">-->
			<!--									New subscription created</span>-->
			<!--									<span class="inline-block font-11  pull-right notifications-time">2pm</span>-->
			<!--									<div class="clearfix"></div>-->
			<!--									<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>-->
			<!--								</div>-->
			<!--							</a>	-->
			<!--						</div>-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--						<div class="sl-item">-->
			<!--							<a href="javascript:void(0)">-->
			<!--								<div class="icon bg-yellow">-->
			<!--									<i class="zmdi zmdi-trending-down"></i>-->
			<!--								</div>-->
			<!--								<div class="sl-content">-->
			<!--									<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>-->
			<!--									<span class="inline-block font-11 pull-right notifications-time">1pm</span>-->
			<!--									<div class="clearfix"></div>-->
			<!--									<p class="truncate">Some technical error occurred needs to be resolved.</p>-->
			<!--								</div>-->
			<!--							</a>	-->
			<!--						</div>-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--						<div class="sl-item">-->
			<!--							<a href="javascript:void(0)">-->
			<!--								<div class="icon bg-blue">-->
			<!--									<i class="zmdi zmdi-email"></i>-->
			<!--								</div>-->
			<!--								<div class="sl-content">-->
			<!--									<span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>-->
			<!--									<span class="inline-block font-11  pull-right notifications-time">4pm</span>-->
			<!--									<div class="clearfix"></div>-->
			<!--									<p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>-->
			<!--								</div>-->
			<!--							</a>	-->
			<!--						</div>-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--						<div class="sl-item">-->
			<!--							<a href="javascript:void(0)">-->
			<!--								<div class="sl-avatar">-->
			<!--									<img class="img-responsive" src="<?php echo base_url();?>assets/dist/img/avatar.jpg" alt="avatar"/>-->
			<!--								</div>-->
			<!--								<div class="sl-content">-->
			<!--									<span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>-->
			<!--									<span class="inline-block font-11  pull-right notifications-time">1pm</span>-->
			<!--									<div class="clearfix"></div>-->
			<!--									<p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>-->
			<!--								</div>-->
			<!--							</a>	-->
			<!--						</div>-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--						<div class="sl-item">-->
			<!--							<a href="javascript:void(0)">-->
			<!--								<div class="icon bg-red">-->
			<!--									<i class="zmdi zmdi-storage"></i>-->
			<!--								</div>-->
			<!--								<div class="sl-content">-->
			<!--									<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>-->
			<!--									<span class="inline-block font-11  pull-right notifications-time">1pm</span>-->
			<!--									<div class="clearfix"></div>-->
			<!--									<p class="truncate">consectetur, adipisci velit.</p>-->
			<!--								</div>-->
			<!--							</a>	-->
			<!--						</div>-->
			<!--					</div>-->
			<!--				</li>-->
			<!--				<li>-->
			<!--					<div class="notification-box-bottom-wrap">-->
			<!--						<hr class="light-grey-hr ma-0"/>-->
			<!--						<a class="block text-center read-all" href="javascript:void(0)"> read all </a>-->
			<!--						<div class="clearfix"></div>-->
			<!--					</div>-->
			<!--				</li>-->
			<!--			</ul>-->
			<!--		</li>-->
			<!--		<li class="dropdown auth-drp">-->
			<!--			<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url();?>assets/dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>-->
			<!--			<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">-->
			<!--				<li>-->
			<!--					<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>-->
			<!--				</li>-->
			<!--				<li>-->
			<!--					<a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>-->
			<!--				</li>-->
			<!--				<li>-->
			<!--					<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>-->
			<!--				</li>-->
			<!--				<li>-->
			<!--					<a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>-->
			<!--				</li>-->
			<!--				<li class="divider"></li>-->
			<!--				<li class="sub-menu show-on-hover">-->
			<!--					<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>-->
			<!--					<ul class="dropdown-menu open-left-side">-->
			<!--						<li>-->
			<!--							<a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>-->
			<!--						</li>-->
			<!--						<li>-->
			<!--							<a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>-->
			<!--						</li>-->
			<!--						<li>-->
			<!--							<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>-->
			<!--						</li>-->
			<!--					</ul>	-->
			<!--				</li>-->
			<!--				<li class="divider"></li>-->
			<!--				<li>-->
			<!--					<a href="<?php echo base_url();?>admin_logout"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>-->
			<!--				</li>-->
			<!--			</ul>-->
			<!--		</li>-->
			<!--	</ul>-->
			<!--</div>	-->
		</nav>
		<!-- /Top Menu Items -->
		