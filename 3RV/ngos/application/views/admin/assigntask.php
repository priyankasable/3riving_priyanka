<!-- main header end -->
<?php  $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>

<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>Assign Students To Task</h1>
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
							<td>Student Name</td>
                            <th>Task Subject </th>
							<th>Description</th>
                            <th>Duration</th>
							<th>Student Resume</th>
                            <th>Assign Task To Students</th>
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
								$resume = $row->resume;
								$deadline=$row->deadline;
						?>
							<tr id="<?php echo $pk;?>">
                            <td><?php echo $j;?></td>
						    <td><?php echo ucwords($name);?></td>
                            <td><?php echo ucwords($subject);?></td>
							<td><?php echo $description;?></td>
							<td> <?php echo $deadline;?>  </td>
							<td class="uk-text-nowrap"> <?php $url= $imagepath."resume/".$resume; ?>
 <a href="<?php echo $url;?>">view Resume</a>
							</td>
							<td>
							<?php 
				//call to helper function for getting assign status of task
							//$sid = $this->session->userdata('intern_id');
							$useinfo = get_assign_status($pk);
							
							$row = $useinfo->row(); 
							$is_assign = $row->is_assign;
							?>
<?php if($is_assign==0)
{?>
<input type="button" class="md-btn md-btn-primary uk-margin-small-top" value="Assign" onclick="assign_task(<?php echo $pk; ?>)"/> <?php } else { echo "Assigned" ; } ?>							
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

function assign_task(pk)
{

	var res = confirm("You want to Assign Task To This Student.....?");
	if(res)
	{		 
				 
		$.ajax({
					url:'<?php  echo base_url();?>index.php/ngoadmin/assigntask',
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
    
 