<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2015 19:43:45 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-32x32.png" sizes="32x32">

    <title>Intern Login Page</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/login_page.min.css" />

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
				<?php if($this->session->flashdata('message') != '' ) { ?>
					<span class="text-center"><?php echo flash_message(); ?></span>
	    		<?php } ?>
                <form method="post" action="<?php echo base_url()?>index.php/login/validate_login" id="form_validation">
                    <div class="uk-form-row">
                        <label for="login_username">Username</label>
                        <input class="md-input" type="text" id="login_username" name="login_username" required />
                    </div>
                    <div class="uk-form-row">
                        <label for="login_password">Password</label>
                        <input class="md-input" type="password" id="login_password" name="login_password" required/>
                    </div>
                   
					 <div class="uk-margin-medium-top">
               		 <input type="submit" class="md-btn md-btn-primary md-btn-block" value="Sign In">
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index-2.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding" id="register_form" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="register_username">Username</label>
                        <input class="md-input" type="text" id="register_username" name="register_username" required/>
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password">Password</label>
                        <input class="md-input" type="password" id="register_password" name="register_password" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_password_repeat">Repeat Password</label>
                        <input class="md-input" type="password" id="register_password_repeat" name="register_password_repeat" />
                    </div>
                    <div class="uk-form-row">
                        <label for="register_email">E-mail</label>
                        <input class="md-input" type="text" id="register_email" name="register_email" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index-2.html" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
        <!--<div class="uk-margin-top uk-text-center">
            <a href="#" id="signup_form_show">Create an account</a>
        </div>-->
    </div>

    <!-- common functions -->
    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- altair core functions -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="<?php echo base_url();?>assets/js/pages/login.min.js"></script>
	
	 <!--  forms validation functions -->
    <script src="<?php echo base_url();?>assets/js/pages/forms_validation.min.js"></script>

</body>

<!-- Mirrored from altair_html.tzdthemes.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2015 19:43:47 GMT -->
</html>