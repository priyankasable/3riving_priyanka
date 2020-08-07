<!-- main header end -->
<?php $this->load->view('include/header');?>
	
	<style>
	.uk-modal-dialog
	 {
		  width: 80%;
		  height: 80%;
		  padding: 0;
	 }
	.modal-content 
	{
	  height:97%;
	  border-radius: 0; 
	  width:97%;
	}
</style>
<!-- main header end --><!--  created by kirtik on 4jan 2016 for add  slider images--->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->
<?php 

	foreach($rsdata->result() as $data)
	{
		 $pk=$data->pk;
		 $name=$data->name;
		 $password = $data->password;
		 $city=$data->city;
		 $imagename=$data->resume;
		 $location=$data->location;
		 $email=$data->email;
		 $mobileno=$data->mobileno;
	}
?>
<div id="page_content">
	<div id="page_heading">
	<h1>Edit My Profile</h1>
	<span class="uk-text-muted uk-text-upper uk-text-small">
	</span>
	</div>
  <div id="page_content_inner">
       <div class="md-card">
		<div class="md-card-content">
		<div class="uk-grid" data-uk-grid-margin >
		
				<div class="uk-width-medium-1-1">
				
				<?php  if($this->session->flashdata('message')){
				    echo flash_message(); }
				 ?>
					
        			<form method="post" id="our_service"  name="our_service"  enctype="multipart/form-data" action="<?php echo $saveaction;?>">
					<input type="hidden" name="pk" id="pk" value="<?php echo $pk;?>" />
					 <br/>	
					
					<div class="uk-form-row">
					<label>Intern Name <span class="req">*</span></label> <br />
     				<input class="md-input" type="text" name="sname" id="sname" value="<?php echo $name;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('name');?></span> 
					<br />
					
					<div class="uk-form-row">
					<label>Email ID <span class="req">*</span></label> <br />
     				<input class="md-input" type="text" name="email" id="email" value="<?php echo $email;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('email');?></span> 
					<br />

					<div class="uk-form-row">
					<label>Password <span class="req">*</span></label> <br />
     				<input class="md-input" type="password" name="password" id="password" value="<?php echo $password;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('password');?></span> 
					<br />

					<div class="uk-form-row">
					<label>Mobile Number <span class="req">*</span></label> <br />
     				<input class="md-input" type="text" name="mobileno" id="mobileno" value="<?php echo $mobileno;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('mobileno');?></span> 
					<br />
					
					
					<div class="uk-form-row">
					<label>Location <span class="req">*</span></label> <br />
     				<input class="md-input" type="text" name="location" id="location" value="<?php echo $location;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('location');?></span> 
					<br />

					<div class="uk-form-row">
					<label>City <span class="req">*</span></label> <br />
     				<input class="md-input" type="text" name="city" id="city" value="<?php echo $city;?>" />
					</div>
					 <span class="uk-text-danger"><?php echo form_error('city');?></span> 
					<br />

					<div class="uk-form-row">
					<label>Resume <span class="req">*</span></label> <br />
     				<!--<input type="file"  name="image"  class="md-input" />-->
					<div class="uk-form-file md-btn md-btn-primary">
                    Select
					<input type="file" name="image" id="form-file" />	
								
                    </div><?php if($imagename!=""){?>
					<input type="hidden" name="old_image" value="<?php echo $imagename;?>" />
					<?php $url= $imagepath."resume/". $imagename; ?>
 <a href="<?php echo $url;?>">view Resume</a>
			
					<?php } ?>
					</div>
					<br/>
					<span class="uk-text-danger"><?php echo form_error('image');?></span> 
					<br />
					
					
					<div class="uk-form-row" >
     				<button type="submit" id="submit_service" class="md-btn md-btn-primary">Submit</button>
					</div>
					</form>
				</div>  
		  </div><!--uk-grid--->
       </div><!--mdcardcontente--->
   </div>
</div>
</div>
    <!-- secondary sidebar -->
 <?php //$this->load->view('include/secondary_sidebar');?>
   <!-- secondary sidebar end -->
 <?php $this->load->view('include/footer');?><!-- page specific plugins -->
 

 