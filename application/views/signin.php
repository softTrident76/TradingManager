
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>TradingManagement</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo WEBSITE_AVIDASSETS_ROOT?>images/favicon.png">
    <!-- Custom Stylesheet -->
	<link href="<?php echo WEBSITE_AVID_MAIN; ?>css/style.css" rel="stylesheet">    
	
	<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/flag.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/sign.css">
</head>

<body class="h-100">
    <div id="preloader"><div class="spinner"><div class="spinner-a"></div><div class="spinner-b"></div></div></div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100" style="margin:100px">
                <div class="col-md-5">
                    <div class="form-input-content">
                        <div class="card card-login">
                            <div class="card-header text-center d-block">
                                <a href="index.html">
                                    <h4 class="mb-0 p-2"><strong><?php echo get_langdata($lang, 'welcome');?></strong></h4>
                                </a>
                            </div>							
                            <div class="card-body">
                                <form action="#" name="frm" id="frm" method="post">
									<input type="hidden" name="lang" id="lang" value="<?php echo $lang; ?>" />
                                    <div class="form-group mb-4">										
                                        <input id="username" name="username" type="text" placeholder="<?php echo get_langdata($lang, 'emailorusername');?>" required="required" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input id="password" name="password" type="password" placeholder="<?php echo get_langdata($lang, 'password');?>" required="required" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group ml-3 mb-5">
                                        <!-- <input id="checkbox1" type="checkbox"> -->
                                        <!-- <label class="label-checkbox ml-2 mb-0" for="checkbox1">Remember Password</label> -->
                                    </div>
									<div class="form-group ml-1 mb-1">
										<label id="invalid"><font color="red"></font></label>
										<button id="login_btn" class="btn btn-primary btn-block border-0" type="button" onclick="javascript:doSignIn();"><?php echo get_langdata($lang, 'signin');?></button>
									</div>									
								</form>																
                            </div>
                            <div class="card-footer text-center border-0 pt-0">
                                <!-- <p class="mb-1">Don't have an account?</p>
								<h6><a href="page-register.html">Click me to create account</a></h6> -->
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
							</div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
	<!-- Common JS -->

	<!-- Custom script -->
	<script src="<?php echo WEBSITE_AVIDASSETS_ROOT?>plugins/common/common.min.js"></script>
    <script src="<?php echo WEBSITE_AVID_MAIN?>js/custom.min.js"></script>
    <script src="<?php echo WEBSITE_AVID_MAIN?>js/settings.js"></script>
	<script src="<?php echo WEBSITE_AVID_MAIN?>js/quixnav.js"></script>
	<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/common.js" type="text/javascript"></script>
	<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/signin.js" type="text/javascript"></script>

	<script>
		(function($){
			$('#username').focus();
			$('#username').keypress(function (e) {
				if (e.which == 13) {
					doFocusPassword(e);
				}
			});

			$('#password').keypress(function (e) {
				if (e.which == 13) {
					doReadySignIn(e);
				}
			});
		})(jQuery);
	</script>
	
</body>
</html>
