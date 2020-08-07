<!-- main header end -->
<?php $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->

<!-- Page Content Start -->


<div id="page_content">
    <!-- Page Heading Start -->  
	<div id="page_heading">
		<h1><?php echo $page_title;?></h1>
		<span class="uk-text-muted uk-text-upper uk-text-small">
			<a href="<?php echo base_url();?>index.php/admin/resource_bank">Back to Listing</a>
		</span>
	</div>
	<!-- Page Heading End -->  
	
	<!-- Page Content Inner Start -->  
	<div id="page_content_inner">
	
	<!-- sub Service Add Form Div Start-->  
		<div class="md-card">
                <div class="md-card-content">
				<?php if($this->session->flashdata('message') != '' ) { ?>
					<span class="text-center"><?php echo flash_message(); ?></span>
	    		<?php } ?>
	<div id="divResult">
	
	</div>	
					<form method="post" action="<?php echo $save_action;?>" enctype="multipart/form-data">
                    <div class="uk-grid" data-uk-grid-margin="">						
					 <div class="uk-width-medium-3-10">
						<label for="subservicename">Reourse bank title</label>
						<input type="text" class="md-input" id="rtitle" name="rtitle"  />
						<span class="help-block" style="color: red;"><?php echo form_error('rtitle'); ?></span>
					  </div>
                       
                    </div>
					
					<div class="uk-form-row" >
							<div class="uk-grid">
							  <div class="uk-width-medium-1-1">
								<label for="vendor_type" class="inline-label">Resource Document  : </label>
								<input type="file" name="agreement_doc" id="agreement_doc" />	
								<span class="uk-text-danger"><?php echo form_error('agreement_doc');?></span>							  							 </div>
						   </div>
					   </div>
					   
					   <div class="uk-width-medium-2-10 uk-text-center">
						<input type="submit" class="md-btn md-btn-primary uk-margin-small-top" value="SAVE"/>
                        </div>
					</form>
                </div>
        </div>
	<!-- sub Service Add Form Div End-->  
	</div>
	<!-- Page Content Inner End --> 
</div>
<!-- Page Content End --> 

<!-- secondary sidebar Start -->
<?php $this->load->view('include/secondary_sidebar');?>
<!-- secondary sidebar end -->

<!-- Footer Start -->
<?php $this->load->view('include/footer');?>
<!-- Footer End -->
