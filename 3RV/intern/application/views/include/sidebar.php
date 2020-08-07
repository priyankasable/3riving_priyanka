 <aside id="sidebar_main">
        <div class="sidebar_main_header" style="background-color:#fff;">
            <div class="sidebar_logo" style="background-color:#fff;height: 80px;">
                <a href="<?php echo base_url();?>index.php/dashboard" class="sSidebar_hide"><img src="<?php echo base_url();?>assets/img/kwickneedlogo.jpg" alt=""  width="200" style="height:79px;"/></a>
				
				
                <a href="<?php echo base_url();?>index.php/dashboard" class="sSidebar_show"><img src="<?php echo base_url();?>assets/img/logo_main_small.png" alt="" height="32" width="32"/></a>
            </div>

        </div>
        
        <div class="menu_section">
            <ul>
                <!-- Dashboard -->
                <li <?php if(current_url() == base_url().'index.php/dashboard') {?> class="current_section" <?php } ?>  title="Dashboard">
                    <a href="<?php echo base_url();?>index.php/dashboard">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
		   <!-- End Dashboard -->	
		   
		    <!-- Dashboard -->
                <li <?php if(current_url() == base_url().'index.php/internadmin/edit_profile' || current_url() == base_url().'index.php/internadmin/save_profile') {?> class="current_section" <?php } ?>  title="Dashboard">
                    <a href="<?php echo base_url();?>index.php/internadmin/edit_profile">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Edit Profile</span>
                    </a>
                </li>
		   <!-- End Dashboard -->	
		   
		   		        <!-- Resource Bank-->
                <li <?php if(current_url() == base_url().'index.php/internadmin/resource_bank') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/internadmin/resource_bank">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Resource Bank</span>
                    </a>
                </li>
		   <!-- Resource Bank -->	
				   
		                   <!-- ngo -->
                <li <?php if(current_url() == base_url().'index.php/internadmin/listtask' || current_url() == base_url().'index.php/internadmin/addtask' || current_url() == base_url().'index.php/internadmin/insert_task')  {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/internadmin/listtask">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Tasks By NGO</span>
                    </a>
                </li>
		   <!-- End ngo -->	

				
				<!--Task Assigned-->
                <li <?php if(current_url() == base_url().'index.php/internadmin/task_submission') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/internadmin/task_submission">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Task Submission</span>
                    </a>
                </li>
		   <!-- Assigned Tasks -->	
		
				

		
            </ul>
        </div>
    </aside>