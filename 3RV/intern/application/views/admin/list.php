<!-- main header end -->
<?php  $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>

<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>Tasks</h1>
            <!--<span class="uk-text-muted uk-text-upper uk-text-small">SM-G925TZKFTMB</span>-->
        </div>
        <div id="page_content_inner">
	
		
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
							<td>Name</td>
                            <th>Subject </th>
							<th>Description</th>
                            <th>Duration</th>
							<th>Format</th>
                            <th>Apply to task</th>
					    </tr>
                        </thead>
 
                        <tbody>
						<?php $j=1;$url=''; foreach($rstask->result() as $row) 
						{
								$pk=$row->pk;
								$name  = $row->name;
								$ngoid =$row->ngoid;
								$subject=$row->subject;
								$description=$row->description;
								$formate = $row->formate;
								$deadline=$row->deadline;
						?>
							<tr id="<?php echo $pk;?>">
                            <td><?php echo $j;?></td>
						    <td><?php echo ucwords($name);?></td>
                            <td><?php echo ucwords($subject);?></td>
							<td><?php echo $description;?></td>
							<td> <?php echo $deadline;?>  </td>
							<td class="uk-text-nowrap"> <?php $url= $imagepath."tasks/".$formate; ?>
 <a href="<?php echo $url;?>">view format</a>
							</td>
							<td>
							<?php 
				//call to helper function for getting apply status of task
							$sid = $this->session->userdata('intern_id');
							$useinfo = get_apply_status($sid,$ngoid,$pk);
							?>
							
<input type="hidden" name="ngoid" id="ngoid" value="<?php echo $ngoid; ?>" />
<?php if($useinfo==0)
{?>
<input type="button" class="md-btn md-btn-primary uk-margin-small-top" value="Apply" onclick="apply_task(<?php echo $pk; ?>)"/> <?php } else { echo "Applied" ; } ?>							
							</td>
							</tr>
                      <?php  $j++;} ?>
                      
                   	 </tbody>
                    </table>
                </div>
            </div>
       </div>
    </div>
<?php $this->load->view('include/footer');?><!-- page specific plugins -->
  
<script>

function apply_task(pk)
{

	var ngoid = $("#ngoid").val();
	var res = confirm("You want to Apply this Task.....?");
	if(res)
	{		 
				 
		$.ajax({
					url:'<?php  echo base_url();?>index.php/internadmin/applytask',
					type: 'POST',
					cache:false,
					async: false,
					crossDomain: true,
					data:{pk:pk,ngoid:ngoid},
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
    
 