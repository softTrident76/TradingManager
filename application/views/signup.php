<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/flag.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>css/sign.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>plugins/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>styles/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEBSITE_ASSETS_ROOT ?>styles/components.min.css" id="style_components" />

<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/jquery-3.2.1.min.js"></script>
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/styles/bootstrap4/popper.js"></script>
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/common.js" type="text/javascript"></script>
<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/signup.js" type="text/javascript"></script>
<div class="Modal-inner ModalLoginSignup-inner ModalLoginSignup--asPage">
    <div class="Modal-dialog">
        <div class="Modal-content Card">
            <div class="Modal-header">
                <div class="ModalLoginSignup-header-logo">
                    <img src="<?php echo WEBSITE_ASSETS_ROOT ?>images/logo.png" />
                </div>
            </div>
            <div class="Modal-body">
                <div class="ModalLoginSignup-body-heading" style="font-size: 20px;"><?php echo get_langdata($lang, 'welcome');?>!!!</div>
                <form action="<?php echo site_url('signup/submit')?>" name="frm" id="frm" method="post" class="user-login-form fl-form large-form responsive-form" enctype="multipart/form-data">
                    <input type="hidden" name="lang" id="lang" value="<?php echo $lang; ?>" />
                    <ol>
                        <li class="form-step username-step">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                <input id="username" name="username" type="text" class="large-input" placeholder="<?php echo get_langdata($lang, 'username');?>" required="required">
                            </div>
                            <!-- <div class="input-icon input-xlarge">
                                <i class="fa fa-user"></i>
                                <input id="username" name="username" type="text" class="large-input" placeholder="<?php echo get_langdata($lang, 'username');?>" required="required">
                            </div> -->
                            <!-- <input id="username" name="username" type="text" placeholder="<?php echo get_langdata($lang, 'username');?>" maxlength="150" class="large-input" required="required"> -->
                        </li>
                        <li class="form-step password-step">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock fa-fw"></i>
                                </span>
                                <input id="password" name="password" type="password" class="large-input" placeholder="<?php echo get_langdata($lang, 'password');?>" required="required">
                            </div>
                        </li>
                        <li class="form-step password-step">
                            <label id="missPass" for="confirm" class="is-accessibly-hidden"><font color="red">Password doesn't match</font> </label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <input id="confirm" name="confirm" type="password" class="large-input" placeholder="<?php echo get_langdata($lang, 'confirmpassword');?>" required="required">
                            </div>
                        </li>
                        <li class="form-step password-step">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input id="fullname" name="fullname" type="text" class="large-input" placeholder="<?php echo get_langdata($lang, 'fullname');?>" required="required">
                            </div>
                        </li>
                        <li class="form-step password-step">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input id="email" name="email" type="email" class="large-input" placeholder="<?php echo get_langdata($lang, 'email');?>" required="required">
                            </div>
                        </li>
                        <li class="form-step password-step">
                            <label id="missEmail" for="email" class="is-accessibly-hidden"><font color="red"><?php echo get_langdata($lang, 'invalidemail');?></font></label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </span>
                                <input id="phone" name="phone" type="text" class="large-input" placeholder="<?php echo get_langdata($lang, 'phonenumber');?>" required="required">
                            </div>
                        </li>
                        <li class="form-step has-label login-form-options">
                            <a onclick="javascript:doSendSmsCode();" style="font-size: 16px;"><?php echo get_langdata($lang, 'sendcode');?></a>
<!--                            <label id="codeResult" for="email"><font color="red"></font></label>-->
                            <input id="code" name="code" type="text" placeholder="<?php echo get_langdata($lang, 'verifycode');?>" maxlength="150" class="large-input" required="required">
                        </li>
                        <li class="form-step has-label login-form-options">
                            <div class="thumbnail login-form-forgot forgot-password" style="width: 150px; height: 150px; background-position: center; background-size:cover;">
                                <input id="upload" name="upload" type="file" style="opacity: 0.0; position: inherit; top: 0; left: 0; bottom: 0; right: 0; width: 100%; height:100%;" onchange="javascript:onSelectUserImage(this);">
                            </div>
                        </li>
                        <li class="form-step">
                            <button id="login_btn" type="button" class="btn btn-info btn-large btn-submit ModalLoginSignup-loginForm-submitBtn" style="font-size: 20px;" onclick="javascript:onSignUp();">
                                <?php echo get_langdata($lang, 'signup');?>
                            </button>
                        </li>
                    </ol>
                </form>
                <span class="ModalLoginSignup-switchLoginSignupType">
                    <table width="100%">
                        <tr>
                            <td width="100">
                                <a href="#" class="dropdown-menu-toggle" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <?php
                                    if ($lang == 0) {?>
                                        <img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-kp" alt="조선어"> 조선어
                                    <?php } elseif ($lang == 1) {?>
                                        <img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-cn" alt="中國語"> 中國語
                                    <?php } else {?>
                                        <img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-us" alt="ENGLISH"> ENGLISH
                                    <?php }?>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguage">
                                    <li><a href="javascript:setLang('kor', 'signup')"><img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-kp" alt="조선어"> 조선어</a></li>
                                    <li><a href="javascript:setLang('chn', 'signup')"><img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-cn" alt="中國語"> 中國語</a></li>
                                    <li><a href="javascript:setLang('eng', 'signup')"><img src="<?php echo WEBSITE_ASSETS_ROOT.'images/blank.gif'; ?>" class="flag flag-us" alt="ENGLISH"> ENGLISH</a></li>
                                </ul>
                            </td>
                            <td align="right"><a href="<?php echo site_url('signin'); ?>" style="font-size: 16px;"><?php echo get_langdata($lang, 'signin');?></a></td>
                        </tr>
                    </table>
                </span>
            </div>
        </div>
    </div>
</div>