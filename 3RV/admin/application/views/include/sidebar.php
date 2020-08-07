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
		   
		                   <!-- ngo -->
                <li <?php if(current_url() == base_url().'index.php/admin') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/admin">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">NGOs</span>
                    </a>
                </li>
		   <!-- End ngo -->	



		        <!-- Intern -->
                <li <?php if(current_url() == base_url().'index.php/admin/student_list') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/admin/student_list">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Interns</span>
                    </a>
                </li>
		   <!-- End Intern -->	


		        <!-- Resource Bank-->
                <li <?php if(current_url() == base_url().'index.php/admin/resource_bank') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/admin/resource_bank">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Resource Bank</span>
                    </a>
                </li>
		   <!-- Resource Bank -->	
				   
				
				<!--Notice Board-->
                <li <?php if(current_url() == base_url().'index.php/admin/notice_board') {?> class="current_section" <?php } ?>  title="ngo">
                    <a href="<?php echo base_url();?>index.php/admin/notice_board">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Notice Board</span>
                    </a>
                </li>
		   <!-- Notice Board -->	
		
				

		
            </ul>
        </div>
    </aside>