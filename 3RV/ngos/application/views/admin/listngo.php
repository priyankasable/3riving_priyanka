<!-- main header end -->
<?php  $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>
<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>NGOs</h1>
            <!--<span class="uk-text-muted uk-text-upper uk-text-small">SM-G925TZKFTMB</span>-->
        </div>
        <div id="page_content_inner">
	
		<br />
		
			<?php if($this->session->flashdata('message') != '' ) { ?>
					<span class="text-center"><?php echo flash_message(); ?></span>
	    		<?php } ?>

           <!-- <h4 class="heading_a uk-margin-bottom">Show/hide columns</h4>-->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_colVis" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>NGOs Name</th>
							<th>Mobile Number</th>
                            <th>Email</th>
							<th>Location</th>
							<th>Field of work</th>
					    </tr>
                        </thead>
 
                        <tbody>
						<?php $j=1; foreach($rsngo->result() as $row) 
						{
								$id=$row->id;
								$name=$row->name;
								$field_of_work=$row->field_of_work;
								$mobileno = $row->mobile_no;
								$email=$row->email;
								$location=$row->location;
								
						?>
							<tr id="<?php echo $id;?>">
                            <td><?php echo $j;?></td>
                            <td><?php echo ucwords($name);?></td>
							<td><?php echo $mobileno;?></td>
							<td><?php echo $email;?></td>
							<td><?php echo ucfirst($location);?></td>
							<td><?php echo ucfirst($field_of_work);?></td>
                         </tr>
                      <?php  $j++;} ?>
                      
                   	 </tbody>
                    </table>
                </div>
            </div>
       </div>
    </div>

	<div class="uk-modal" id="modal_header_footer">
			<div class="uk-modal-dialog">
				<div class="uk-modal-header">
					<h3 class="uk-modal-title" align="center">Other Details</h3>
				</div>
				   
				   <p id="view_more_data"></p>
				
				<div class="uk-modal-footer uk-text-right">
					<button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
				</div>
			</div>
   </div>
<?php $this->load->view('include/footer');?><!-- page specific plugins -->
  
<script>

$("input:checkbox").change(function() {
		var str1=$(this).val();

		$.ajax({
					   	url:'<?php echo base_url();?>index.php/common/update_status',
						type: 'POST',
						cache:false,
						async: false,
						crossDomain: true,
						data:{str:str1,table_name:'tbl_vendor'},
						dataType: 'json',
					    success: function(resp)
						{
					 
							 if(resp.success==1)
							{
								//UIkit.modal.alert(resp.msg);
								setTimeout( function() 
								  {
									window.location.reload();
								  }, 0001); 
							window.location.reload();
							}
							else if(resp.error==1)
							{
								UIkit.modal.alert(resp.error);
							}
					    
					   }
					    
				 });

});

function delete_record(pk)
{
	var res = confirm("You want to Delete this Record.....?");
	if(res)
	{		 
				 
		$.ajax({
					url:'<?php  echo base_url();?>index.php/vendor/delete_vendor_master',
					type: 'POST',
					cache:false,
					async: false,
					crossDomain: true,
					data:{pk:pk},
					dataType: 'json',
					success:function(data)
					{
						alert(data.msg);
						
						if(data.resp==1)
						{
							location.reload(); 
						}
					}
		   });
	}
	else
	{
		return false;
	}

}

function approve_status(pk)
{	

	$.ajax({
				url:'<?php echo base_url();?>index.php/vendor/approve_vendor',
				type: 'POST',
				cache:false,
				async: false,
				crossDomain: true,
				data:{pk:pk},
				dataType: 'json',
				success: function(resp)
				{			 
					if(resp.success==1)
					{
						UIkit.modal.alert(resp.msg);
						window.location.reload();
					}
					else if(resp.error==1)
					{
						UIkit.modal.alert(resp.error);
					}
			   }
		 });
}


</script>
    <!-- page specific plugins -->
    <!-- datatables -->
    <script src="<?php echo base_url();?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- datatables colVis-->
    <script src="<?php echo base_url();?>bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
    <!-- datatables tableTools-->
    <script src="<?php echo base_url();?>bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
    <!-- datatables custom integration -->
    <script src="<?php echo base_url();?>assets/js/custom/datatables_uikit.min.js"></script>

    <!--  datatables functions -->
    <script src="<?php echo base_url();?>assets/js/pages/plugins_datatables.min.js"></script>
    
 