<?php $this->load->view('include/order_header');?>
 
<style type="text/css">
.stepwizard-step p {
	margin-top: 10px;
}
.stepwizard-row {
	display: table-row;
}
.stepwizard {
	display: table;
	width: 60%;
	position: relative;
}
.stepwizard-step button[disabled] {
	opacity: 1 !important;
	filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
	top: 14px;
	bottom: 0;
	position: absolute;
	content: " ";
	width: 100%;
	height: 1px;
	background-color: #ccc;
	z-order: 0;
}
.stepwizard-step {
	display: table-cell;
	text-align: center;
	position: relative;
}
.btn-circle {
	width: 30px;
	height: 30px;
	text-align: center;
	padding: 6px 0;
	font-size: 12px;
	line-height: 1.428571429;
	border-radius: 15px;
}
</style>
  
<div class="breadcrumb-box">
  <div class="container">
    <ul class="breadcrumb">
      <li>Home</li>
      <li class="active">Regestration</li>
	  <span style="float:right;">
	  		<h6> <b>If you have an account with us, please log in.</b>
	  	  <a href="<?php echo base_url()?>index.php/book_homeservice/login" class="">Login</a></h6>
	  </span>
    </ul>	
  </div>
</div>
  
  <br />
<div class="container">
<div class="row">
  <div class="col-xs-12 box register">
      <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
       <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Your Details</p>
      </div>
	  
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Address</p>
      </div>
	  
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>Review Order</p>
      </div>
	  
	  <!--<div class="stepwizard-step">
        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>Payment</p>
      </div>-->	  
	   </div>
      </div>
	    
    <form role="form" action="<?php echo $saveaction;?>" method="post" class="form-box register-form form-validator">
    <div class="row setup-content" id="step-1">
     <!--     <div class="col-xs-6 col-md-offset-3"> -->
          <div class="col-md-8 col-md-offset-2 box register">
		  <br />
		  		  
		   <div class="form-group">
			<label>Email Address: <span class="required">*</span></label>
			<input class="form-control" name="email" id="email" type="email" required data-bv-emailaddress-message="The input is not a valid email address">
           </div>
		      
			<div class="form-group">
            <label>Password: <span class="required">*</span></label>
            <input type="password" name="password" id="password" required="required" class="form-control" data-bv-notempty="true" data-bv-notempty-message="The password is required and cannot be empty" />
          </div>
		  
		  <div class="form-group">
            <label>Mobile Number: <span class="required">*</span></label>
			 <input type="text" required="required" class="form-control" name="mobileno" id="mobileno"
				  data-bv-message="The Mobile Number is not valid"
				  required data-bv-notempty-message="The Mobile Number cannot be empty"
				  data-bv-stringlength="true"
				  data-bv-stringlength-min="10"
                  data-bv-stringlength-max="10"
                  data-bv-stringlength-message="The Mobile Number must be 10 digit long"
				  onKeyPress="javascript:return isNumber(event);"  />  	 	   
          </div>
		  
		  <div class="form-group">
            <label>First Name: <span class="required">*</span></label>
            <input type="text" required="required" class="form-control" name="first_name" id="first_name"
		     data-bv-notempty="true" data-bv-notempty-message="The First Name is required and cannot be empty" onKeyPress="javascript:return ischaracter(event);"/>
          </div>
		  
		  <div class="form-group">
            <label>Last Name: <span class="required">*</span></label>
            <input type="text" required="required" class="form-control" name="last_name" id="last_name" data-bv-notempty="true" data-bv-notempty-message="The Last Name is required and cannot be empty"  onKeyPress="javascript:return ischaracter(event);"/>
          </div>
             <button class="btn btn-danger ladda-button progress-button nextBtn pull-right" type="button">Save & Next</button>
          </div>
     <!-- </div>-->
   </div>
   
    <div class="row setup-content" id="step-2">
        <div class="col-md-12">
               <br />
			 <div class="col-md-6">
			 	<div><h6>Permanent Address</h6></div>
			   <div class="form-group">
            	<label>Address Line1:<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="address1" id="address1" data-bv-notempty="true" data-bv-notempty-message="The Location is required and cannot be empty" />
              </div>
			  
			    <div class="form-group">
            	<label>Address Line2:</label>
            	 <input type="text" class="form-control" name="address2" id="address2"/>
                </div>
			  
			   <div class="form-group">
            	<label>Location:<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="location" id="location" data-bv-notempty="true" data-bv-notempty-message="The Location is required and cannot be empty" />
              </div>
			  
			  <div class="form-group">
            	<label>City<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="city" id="city" data-bv-notempty="true" data-bv-notempty-message="The City is required and cannot be empty"/>
              </div>
			  
			  <div class="form-group">
            	<label>State<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="state" id="state" data-bv-notempty="true" data-bv-notempty-message="The State is required and cannot be empty"  />
              </div>
			  
			  <div class="form-group">
            	<label>Pin Code<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="pincode" id="pincode" data-bv-notempty="true" data-bv-notempty-message="The Pin Code is required and cannot be empty" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="The Pin Code must be 6 digit long" onKeyPress="javascript:return isNumber(event);"/>
              </div>
			
            </div>
			
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6"><h6>Service Address</h6></div>
					<div class="col-md-6"><input type="checkbox" name="as_above" id="as_above" onChange="sameAsAbove()"> As Permanent Address.</div>
				</div>
				
			 <div class="form-group">
            	<label>Address Line1:<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="saddress1" id="saddress1" data-bv-notempty="true" data-bv-notempty-message="The Location is required and cannot be empty" />
              </div>
			  
			    <div class="form-group">
            	<label>Address Line2:</label>
            	 <input type="text" class="form-control" name="saddress2" id="saddress2"/>
                </div>
			  
			   <div class="form-group">
            	<label>Location:<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="slocation" id="slocation" data-bv-notempty="true" data-bv-notempty-message="The Location is required and cannot be empty" />
              </div>
			  
			  <div class="form-group">
            	<label>City<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="scity" id="scity" data-bv-notempty="true" data-bv-notempty-message="The City is required and cannot be empty"/>
              </div>
			  
			  <div class="form-group">
            	<label>State<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="sstate" id="sstate" data-bv-notempty="true" data-bv-notempty-message="The State is required and cannot be empty"  />
              </div>
			  
			  <div class="form-group">
            	<label>Pin Code<span class="required">*</span></label>
            	 <input type="text" required="required" class="form-control" name="spincode" id="spincode" data-bv-notempty="true" data-bv-notempty-message="The Pin Code is required and cannot be empty" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="The Pin Code must be 6 digit long" onKeyPress="javascript:return isNumber(event);"/>
              </div>
			  
              <button class="btn btn-danger ladda-button progress-button nextBtn pull-right" type="button" onClick="get_address_info()">Save & Next</button>
            </div>
			
		</div>
        </div>
    <div class="row setup-content" id="step-3">
          <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
		<br />
		<div class="form-group">
			<p id="address_info"></p>
			<p id="service_address"></p>
	        </div>
		<h6 class="sub-title">Review Your Order :</h6>
			<table id="table" border="0" cellpadding="5px" cellspacing="1px" class="table table-bordered" style="background-color:#FFFFFF;">
                  <?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()): ?>
				  <thead>
                    <tr>
                        <th>#</th>
						<th>Item Name</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Amount</th>
                    </tr>
				  </thead>
                    <?php
                    $grand_total = 0;
                    $i = 1;
                    foreach($cart as $item): ?>
                        <tr>
                            <td>
                     <?php echo $i++; ?>
                            </td>
                            <td>
                     <?php echo ucwords($item['name']);?>
                            </td>
                            <td>
                                Rs. <?php echo number_format($item['price'], 2); ?>
                            </td>
							<td>  <?php echo  $item['qty']; ?> </td>
							 <td>
                                Rs.<?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                     <?php $grand_total = $grand_total + $item['subtotal']; ?>
                     <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td align="right" colspan="5"><b>Order Total: Rs.<?php 
                         //Grand Total.
                        echo number_format($grand_total, 2); ?></b></td>
                    </tr>
				<?php endif; ?>
            </table>
			<input type="submit" class="btn btn-danger ladda-button progress-button nextBtn pull-right" value="Confirm Order"/>
            <!--<button  class="btn btn-danger ladda-button progress-button nextBtn pull-right" type="button" >Next</button>-->
            </div>
      </div>
   </div>
   
   <!--<div class="row setup-content" id="step-4">
      <div class="col-xs-6 col-md-offset-3">
        <div class="col-md-12">
           <br />
	   <label class="radio"><input type="radio" name="pay">Pay by cash after the service.</label>
	   <label class="checkbox"><input type="checkbox"> I agree to the terms & conditions. </label>
	  	<input type="submit" class="btn btn-danger ladda-button progress-button nextBtn pull-right" value="Submit"/>
          </div>
      </div>
   </div>-->
  </form>
  </div>
  </div>
  </div>
  
<?php $this->load->view('include/footer');?>