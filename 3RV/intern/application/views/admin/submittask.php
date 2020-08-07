<!-- main header end -->
<?php  $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>

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
<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>Submit Task</h1>
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
							<td>NGO Name</td>
                            <th>Task Subject </th>
                            <th>Duration</th>
                            <th>Submit Task</th>
					    </tr>
                        </thead>
 
                        <tbody>
						<?php $j=1;$url=''; foreach($rsatask->result() as $row) 
						{
								$pk=$row->pk;
								$name  = $row->name;
								$ngoid =$row->ngoid;
								$subject=$row->subject;
								$deadline=$row->deadline;
						?>
							<tr id="<?php echo $pk;?>">
                            <td><?php echo $j;?></td>
						    <td><?php echo ucwords($name);?></td>
                            <td><?php echo ucwords($subject);?></td>
							<td><?php echo $deadline;?>  </td>
							
							<td>
		<a href="<?php echo base_url();?>/index.php/internadmin/tasksubmit/<?php echo $pk?>" class="md-btn md-btn-primary uk-margin-small-top">Submit</a>
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
    
 