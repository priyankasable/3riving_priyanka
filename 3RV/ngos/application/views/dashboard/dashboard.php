<!-- main header end -->
<?php $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
		
		 <!-- statistics (small charts) -->
            

	<hr/>
	<h4>Notice Board</h4>
	
	<div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Notice From 3RV</span>		<?php $j=1;$url=''; foreach($rsnotice->result() as $row) 
						{
								$pk=$row->pk;
								$notice=$row->cms_desc;
						}
						?>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a href="<?php echo base_url();?>index.php/seasonal_booking_history/seasonal_service_listing"><?php echo $notice;?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
				
				
				
				
				
				<div>
                    
                </div>
				
				<div>
                    
                </div>
	 		  </div>
	

    <!-- secondary sidebar -->
   <?php $this->load->view('include/secondary_sidebar');?>
   <!-- secondary sidebar end -->
   <?php $this->load->view('include/footer');?>
    