<!-- main header end -->
<?php  $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php  $this->load->view('include/sidebar');?>
<!-- main sidebar end -->
    <div id="page_content">
	<div id="page_heading">
            <h1>Resourse Bank</h1>
            <!--<span class="uk-text-muted uk-text-upper uk-text-small">SM-G925TZKFTMB</span>-->
        </div>
        <div id="page_content_inner">

           <!-- <h4 class="heading_a uk-margin-bottom">Show/hide columns</h4>-->
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_colVis" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Resourse Title</th>
							<th>Resourse</th>
					    </tr>
                        </thead>
 
                        <tbody>
						<?php $j=1;$url=''; foreach($rstask->result() as $row) 
						{
								$pk=$row->pk;
								$title =$row->title ;
								$formate = $row->formate;
						?>
							<tr id="<?php echo $pk;?>">
                            <td><?php echo $j;?></td>
                            <td><?php echo ucwords($title);?></td>
							
							
							<td class="uk-text-nowrap"> <?php $url= $imagepath."resource/".$formate; ?>
 <a href="<?php echo $url;?>">view resourse</a>
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
	<a class="md-fab md-fab-accent" href="<?php echo base_url();?>index.php/admin/add_resourse_bank" id="invoice_add">
		<i class="material-icons">&#xE145;</i>
	</a>
</div>	
	
<?php $this->load->view('include/footer');?><!-- page specific plugins -->
  
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
    
 