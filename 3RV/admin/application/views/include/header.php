<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<!-- Mirrored from altair_html.tzdthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2015 19:40:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon-32x32.png" sizes="32x32">

    <title>Admin Login</title>

    <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/chartist/dist/chartist.min.css">
    
    <!-- uikit -->
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.min.css" media="all">
	
	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>bower_components/kendo-ui/styles/kendo.material.min.css"/>

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
    <![endif]-->

</head>
<body class=" sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
              <!--  <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                -->
                    
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
						<li><a href="#"><?php echo date("l").', '.date("d M Y"); ?></a></li>
					
                        <!--<li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>-->
                        <!--<li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>-->
						
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="<?php echo base_url();?>assets/img/avatars/user.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                   <!--<li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="page_settings.html">Settings</a></li>-->
                                    <li><a href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav> 
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
            </form>
        </div>
    </header>
