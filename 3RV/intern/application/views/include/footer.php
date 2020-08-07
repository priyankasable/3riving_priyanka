<!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>


	 <!-- page specific plugins -->
    <!-- ionrangeslider -->
    <script src="<?php echo base_url();?>bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <!-- <script src="<?php echo base_url();?>assets/js/uikit_htmleditor_custom.min.js"></script>-->
    <!-- inputmask-->
      <!--<script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>-->

    <!--  forms advanced functions -->
    <script src="<?php echo base_url();?>assets/js/pages/forms_advanced.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="<?php echo base_url();?>bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="<?php echo base_url();?>bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <!--<script src="<?php echo base_url();?>bower_components/chartist/dist/chartist.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url();?>bower_components/maplace.js/src/maplace-0.1.3.js"></script>-->
        <!-- peity (small charts) -->
		
		   <!-- kendo UI -->
    	<script src="<?php echo base_url();?>assets/js/kendoui_custom.min.js"></script>

    	<!--  kendoui functions -->
    	<script src="<?php echo base_url();?>assets/js/pages/kendoui.min.js"></script>
        <script src="<?php echo base_url();?>bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="<?php echo base_url();?>bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="<?php echo base_url();?>bower_components/countUp.js/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="<?php echo base_url();?>bower_components/handlebars/handlebars.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="<?php echo base_url();?>bower_components/clndr/src/clndr.js"></script>
        <!-- fitvids -->
        <script src="<?php echo base_url();?>bower_components/fitvids/jquery.fitvids.js"></script>

        <!--  dashbord functions -->
<!--        <script src="<?php echo base_url();?>assets/js/pages/dashboard.min.js"></script>
-->		
		 <!-- ckeditor -->
    <script src="<?php echo base_url(); ?>bower_components/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>bower_components/ckeditor/adapters/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/pages/forms_wysiwyg.min.js"></script>
    

    <script>
        $(function() {
            // enable hires images
            altair_helpers.retina_images();
            // fastClick (touch devices)
            if(Modernizr.touch) {
                FastClick.attach(document.body);
            }
        });
    </script>

  

    

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $body
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });


        // toggle boxed layout

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            // toggle mini sidebar
            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });


        });
    </script>
</body>

<!-- Mirrored from altair_html.tzdthemes.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Dec 2015 19:41:28 GMT -->
</html>