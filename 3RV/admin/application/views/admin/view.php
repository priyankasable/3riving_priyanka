<!-- main header end -->
<?php  $this->load->view('include/header');?>

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

<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>
<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>View Vendors</h1>
			<span class="uk-text-muted uk-text-upper uk-text-small">
	<a href="<?php echo base_url();?>index.php/vendor/list_vendors" >  Back to Listing   </a></span>
        </div>
        <div id="page_content_inner">

           <!-- <h4 class="heading_a uk-margin-bottom">Show/hide columns</h4>-->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                   
				   
				   <?php foreach($rsvendordoc->result() as $r):

				   		$name = $r->first_name." ".$r->middle_name." ".$r->last_name;
						$address = $r->address;
						$country = $r->country_name;
						$state = $r->state_name;
						$city = $r->city_name;
						$area = $r->area;
						$vendor_type = $r->vendor_type;
						$vendor_service=$r->service_type;
						$myArray = explode(',',$vendor_service);
						$areaarr = explode(',',$area);
						$registration_doc = $r->registration_doc;
						$agreement_doc = $r->agreement_doc;
						$authorized_sign = $r->authorized_sign;
						$identity_proof = $r->identity_proof;
						$address_proof = $r->address_proof;
						$contact_numbers = $r->contact_numbers;		
						
						$other_doc = $r->other_doc;
												
						if($other_doc!='')
						{
							$other_doc = explode(',',$other_doc);
						}
						endforeach; 
				   ?>
				   
				 <p>
				 	<table class="uk-table">
						<tr>
							<td>Vendor Name</td>
							<td><?php echo ucwords($name);?></td>
						</tr>
						<tr>
							<td>Vendor Type</td>
							<td><?php if($vendor_type==1) { echo "Corporate";} else if($vendor_type==2) { echo "Individual";}?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?php echo ucwords($address.", ".$country.", ".$state.", ".$city);?></td>
						</tr>
						<tr>
							<td>Area</td>
							<td><?php for($i=0;$i<count($areaarr);$i++) {
									//this for temp fetching later will write helper function for this
							     $sql="SELECT area from tbl_area where pk='$areaarr[$i]'";
								 $res=$this->db->query($sql);
								 foreach($res->result() as $data)
								 {
								  	$areanames =$data->area;
								 }
								 
						     	if($i%2==0)
								{?>
								<span class="uk-badge uk-badge-Default"><?php echo $areanames;?></span>
								<?php } else {?>  <span class="uk-badge uk-badge-Default"><?php echo $areanames;?></span> <?php }?>
						  <?php } ?></td>
						</tr>
						<tr>
							<td>City</td>
							<td><?php echo ucwords($city);?></td>
						</tr>
						<tr>
							<td>State</td>
							<td><?php echo ucwords($state);?></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><?php echo ucwords($country);?></td>
						</tr>
						<tr>
							<td>Mobile Number</td>
							<td><?php if($r->mobileno==""){echo "-";}else { echo $r->mobileno;}?></td>
						</tr>
						<tr>
							<td>Email ID</td>
							<td><?php if($r->email==""){echo "-";}else { echo $r->email;}?></td>
						</tr>
						<tr>
						<td>Service Provided</td>
						
						<td>
								<?php for($i=0;$i<count($myArray);$i++) {
							//this for temp fetching later will write helper function for this
							     $sql="SELECT service_name from tbl_servicesale_master where pk='$myArray[$i]'";
								 $res=$this->db->query($sql);
								 foreach($res->result() as $data)
								 {
								  	$servicename=$data->service_name;
								 }
								if($i%2==0)
								{?>
								<span class="uk-badge uk-badge-success"><?php echo $servicename;?></span>
								<?php } else {?>  <span class="uk-badge uk-badge-primary"><?php echo $servicename;?></span> <?php }?>
						  <?php } ?>
						</td>
						</tr>
					</table>
				 </p>
				 
				<?php if($vendor_type==1) {?>    
		
		
			<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Registration Document</p>
                            <button class="md-btn" data-uk-modal="{target:'#reg_doc'}">Open</button>
                            <div class="uk-modal" id="reg_doc">
                                <div class="uk-modal-dialog" align="center">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $registration_doc; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			
			<hr />
			<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Authorized Signature</p>
                            <button class="md-btn" data-uk-modal="{target:'#auth_sign'}">Open</button>
                            <div class="uk-modal" id="auth_sign">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
								   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $authorized_sign; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			<hr />
				<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Agreement Document</p>
                            <button class="md-btn" data-uk-modal="{target:'#agree_doc'}">Open</button>
                            <div class="uk-modal" id="agree_doc">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $agreement_doc; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			<hr />
			<?php } ?>
			
			
			<?php if($vendor_type==2) {?>    
			
			<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Identity Proof</p>
                            <button class="md-btn" data-uk-modal="{target:'#identity_proof'}">Open</button>
                            <div class="uk-modal" id="identity_proof">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $identity_proof; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			<hr />
			
				<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Address Proof</p>
                            <button class="md-btn" data-uk-modal="{target:'#addr_proof'}">Open</button>
                            <div class="uk-modal" id="addr_proof">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $address_proof; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			<hr />
			
			<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Contact Numbers</p>
                            <button class="md-btn" data-uk-modal="{target:'#contact_no'}">Open</button>
                            <div class="uk-modal" id="contact_no">
                                <div class="uk-modal-dialog">
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $contact_numbers; ?>" class="modal-content" align="middle"></iframe>
                                </div>
                            </div>
            </div>
			
			<?php } ?>
			
			<?php 
			
			if($other_doc)
					{ ?>
					<br />
						<h3>Other Documents</h3>
					<hr />
				<?php for($i=0;$i<count($other_doc);$i++) { ?>
					<div class="uk-width-medium-1-3">
                            <p class="uk-text-large">Other Document <?php echo $i+1;?></p>
                            <button class="md-btn" data-uk-modal="{target:'#other_doc<?php echo $i;?>'}">Open</button>
                            <div class="uk-modal" id="other_doc<?php echo $i;?>">
                                <div class="uk-modal-dialog" >
                                    <button type="button" class="uk-modal-close uk-close"></button>
                                   <iframe src="<?php echo base_url();?>website_content/vendor_document/<?php echo $other_doc[$i]; ?>" class="modal-content" align="right" ></iframe>
                                </div>
                            </div>
                  </div>
					<?php } ?>	
					
					
					
				<?php 	} ?>
					
                </div>
            </div>
       </div>
    </div>
	
<?php $this->load->view('include/footer');?><!-- page specific plugins -->
  
    
 