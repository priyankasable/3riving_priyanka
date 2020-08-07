<!-- main header end -->
<?php $this->load->view('include/header');?>
<!-- main header end -->
<!-- main sidebar -->
<?php $this->load->view('include/sidebar');?>
<!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">
		
		 <!-- statistics (small charts) -->
            

	<hr/>
	<h4>Notice Board</h4>
	
	<div class="uk-grid uk-grid-width-large-1-1 uk-grid-width-medium-1-1 uk-grid-medium uk-sortable hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Notice From 3RV</span>		<?php $j=1;$url=''; foreach($rsnotice->result() as $row) 
						{
								$pk=$row->pk;
								$notice=$row->cms_desc;
						}
						?>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><a><?php echo $notice;?></a><noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
				<hr/>
	
	
	<h4>Tasks Status</h4>
				
				<div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small"></span>		<?php $j=1;$url=''; foreach($rsnotice->result() as $row) 
						{
								$pk=$row->pk;
								$notice=$row->cms_desc;
						}
						?>
                            <h2 class="uk-margin-remove"><span class="uk-text-muted uk-text-small">
							<table id="dt_colVis" class="uk-table" cellspacing="0" width="100%">
							<thead>
							<tr>
								<td>Sr No</td>
								<td>Ngo Name</td>
								<td>Task Name</td>
								<td>Task Status</td>
							</tr>
							</thead>
							<?php $j=1; foreach($rsatask->result() as $row) { ?>
							<td><?php echo $j;?></td>
							<td><?php echo $row->name;?></td>
							<td><?php echo $row->subject;?></td>
							<td><?php echo "Assigned";?></td>
							<?php $j++; } ?>
							<tr>
							
							</tr>
							</table>
							<noscript>12456</noscript>
							</span>
							</h2>
                        </div>
                    </div>
                </div>
				<div>
                </div>
				<div>
                </div>
	 		  </div>
	

    <!-- secondary sidebar -->
   <?php $this->load->view('include/secondary_sidebar');?>
   <!-- secondary sidebar end -->
   <?php $this->load->view('include/footer');?>
    