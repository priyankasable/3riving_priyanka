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
                            <th>Subject </th>
							<th>Description</th>
                            <th>DeadLine</th>
							<th>Format</th>
                            <th>Action</th>
					    </tr>
                        </thead>
 
                        <tbody>
						<?php $j=1;$url=''; foreach($rstask->result() as $row) 
						{
								$pk=$row->pk;
								$subject=$row->subject;
								$description=$row->description;
								$formate = $row->formate;
								$deadline=$row->deadline;
						?>
							<tr id="<?php echo $pk;?>">
                            <td><?php echo $j;?></td>
                            <td><?php echo ucwords($subject);?></td>
							<td><?php echo $description;?></td>
							<td> <?php echo $deadline;?>  </td>
							<td class="uk-text-nowrap"> <?php $url= $imagepath."tasks/".$formate; ?>
 <a href="<?php echo $url;?>">view format</a>
							</td>
							<td>
<!-- <a href="<?php echo base_url();?>index.php/vendor/edit_vendor/<?php echo $pk;?>"><i class="material-icons md-24">&#xE150;</i></a> -->
							<a href="" onclick="delete_record(<?php echo $pk; ?>)"><i class="material-icons md-24">&#xE872;</i></a>
							</td>
 
							</tr>
                      <?php  $j++;} ?>
                      
                   	 </tbody>
                    </table>
                </div>
            </div>
       </div>
    </div>

   <div class="md-fab-wrapper">
	<a class="md-fab md-fab-accent" href="<?php echo base_url();?>index.php/ngoadmin/addtask" id="invoice_add">
		<i class="material-icons">&#xE145;</i>
	</a>
</div>
<?php $this->load->view('include/footer');?><!-- page specific plugins -->
  
<script>

function delete_record(pk)
{
	var res = confirm("You want to Delete this Record.....?");
	if(res)
	{		 
				 
		$.ajax({
					url:'<?php  echo base_url();?>index.php/ngoadmin/deletetask',
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
    
 