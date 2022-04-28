<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Trading Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEBSITE_AVIDASSETS_ROOT?>images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/owl.carousel/dist/css/owl.carousel.min.css">
	<link href="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/flag.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/sign.css">
	
    <!-- Chartist -->
    <link rel="stylesheet" href="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/chartist/css/chartist.min.css">
	<link href="<?php echo WEBSITE_AVID_MAIN; ?>css/style.css" rel="stylesheet">
	
	
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader"><div class="spinner"><div class="spinner-a"></div><div class="spinner-b"></div></div></div>
    <!--*******************
        Preloader end
    ********************-->
    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header">
			<div class="brand-logo">
				<a href="index.html">
					<b class="logo-abbr">A </b>
					<span class="brand-title"><?php echo get_langdata($this->session->userdata('lang'), 'title'); ?></span>
				</a>
			</div>
			<div class="nav-control">
				<div class="hamburger">
					<span class="toggle-icon"><i class="icon-menu"></i></span>
				</div>
			</div>
		</div>
		
			<!--**********************************
			Nav header end
		***********************************-->

		<!--**********************************
			Header start
		***********************************-->
		<div class="header">    
			<div class="header-content clearfix">
				<div class="header-right">
					<form action="#" name="frm" id="frm" method="post">
						<input type="hidden" name="lang" id="lang" value="<?php echo $lang; ?>" />
						<span class="ModalLoginSignup-switchLoginSignupType" style="text-align:right">
							<table width="100%">
								<tr>
									<td width="100">
										<a href="#" class="dropdown-menu-toggle" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											<?php
											if ($lang == 5) {?>												
											<?php } elseif ($lang == 1) {?>
												<img src="<?php echo WEBSITE_ASSETS_ROOT.'images/chinese.png';  ?>" style="width:32px; height:18px" alt="中國語"> 中國語
											<?php } elseif ($lang == 2) {?>
												<img src="<?php echo WEBSITE_ASSETS_ROOT.'images/american.png'; ?>" style="width:32px; height:18px" alt="ENGLISH"> ENGLISH
											<?php }?>										
										</a>

										<div class="dropdown-menu dropdown-menu-right" style="position: absolute; transform: translate3d(-205px, 65px, 0px); top: 0px; left: 0px; will-change: transform;">
											<a class="dropdown-item font-weight-light lang" href="javascript:setLang('chn', '#')"  alt="中國語">
												<img src="<?php echo WEBSITE_ASSETS_ROOT.'images/chinese.png';  ?>" style="width:32px; height:18px" alt="中國語"> 中國語
											</a>
											<a class="dropdown-item font-weight-light lang" href="javascript:setLang('eng', '#')" alt="ENGLISH">
												<img src="<?php echo WEBSITE_ASSETS_ROOT.'images/american.png'; ?>" style="width:32px; height:18px" alt="ENGLISH"> ENGLISH
											</a>						
										</div>
									</td>											
								</tr>
							</table>
						</span>
					</form>
				</div>
				
				<div class="header-right">
					<ul class="clearfix">
				
						<li class="icons">
							<div class="user-img c-pointer">
								<!-- <img src="../../assets/images/users/1.jpg" height="40" width="40" alt="avatar"> -->
								<strong class="ml-2"><?php echo $this->session->userdata('name')?><span><i class="fa fa-caret-down ml-2"></i></span></strong>
							</div>
							<div class="drop-down dropdown-profile animated flipInX">
								<div class="dropdown-content-body">
									<ul>
										<li><a href="/index.php/signin/signout"><?php echo get_langdata($this->session->userdata('lang'), 'logout'); ?></a>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--**********************************
			Header end ti-comment-alt
		***********************************-->

		<!--**********************************
			Scripts
		***********************************-->
		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/common/common.min.js"></script>
		<script src="<?php echo WEBSITE_AVID_MAIN; ?>js/custom.min.js"></script>
		<script src="<?php echo WEBSITE_AVID_MAIN; ?>js/settings.js"></script>
		<script src="<?php echo WEBSITE_AVID_MAIN; ?>js/quixnav.js"></script>
		<script src="<?php echo WEBSITE_AVID_MAIN; ?>js/styleSwitcher.js"></script>

		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/highlightjs/highlight.pack.min.js"></script>
		<!-- <script>hljs.initHighlightingOnLoad();</script> -->

		<!-- ChartJS -->
		<!-- <script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/chart.js/Chart.bundle.min.js"></script> -->
		<!-- Ticker -->
		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/webticker/jquery.webticker.min.js"></script>

		<!--  flot-chart js -->
		<!-- <script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/flot/jquery.flot.js"></script>
		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/flot/jquery.flot.resize.js"></script> -->

		<!-- Counter Up -->
		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/waypoints/jquery.waypoints.min.js"></script>
		<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/jquery.counterup/jquery.counterup.min.js"></script>

		<!-- custome -->
		<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/common.js" type="text/javascript"></script>
