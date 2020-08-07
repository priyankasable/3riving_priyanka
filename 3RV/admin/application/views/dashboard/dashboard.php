<!-- main header end -->
<?php $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
		
		 <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Ngos</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a><?php echo $ngocnt;?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Interns</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a><?php echo $interncnt;?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Tasks</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a><?php echo $taskcnt;?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Completed Task</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a><?php echo "upcoming";?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
				
		  </div>
	<hr/>
	
	</div>
	
</div>

    <!-- secondary sidebar -->
   <?php $this->load->view('include/secondary_sidebar');?>
   <!-- secondary sidebar end -->
   <?php $this->load->view('include/footer');?>
    