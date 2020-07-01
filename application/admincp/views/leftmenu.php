<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php echo (($this->uri->segment(1) == 'dashboard')?'active':''); ?>">
                <a title="Dashboard" href="<?php echo base_url('dashboard'); ?>">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span> <!--<small class="label pull-right bg-green">new</small>-->
                </a>
            </li>

            
            <li class="<?php echo (($this->uri->segment(1) == 'setting')?'active':''); ?>">
                <a href="<?php echo base_url('setting'); ?>" title="Settings">
                  <i class="fa fa-cog"></i> <span>General Settings</span> <!--<small class="label pull-right bg-green">new</small>-->
                </a>
            </li>
            
            
            <li class="<?php echo (($this->uri->segment(1) == 'emailformat')?'active':''); ?>">
                <a href="<?php echo base_url('emailformat'); ?>" title="Email Format">
                  <i class="fa fa-envelope"></i> <span>Email Template</span> <!--<small class="label pull-right bg-green">new</small>-->
                </a>
            </li>
            
            <li class="<?php echo (($this->uri->segment(1) == 'stage')?'active':''); ?>">
                <a href="<?php echo base_url('stage'); ?>" title="Stage">
                  <i class="fa fa-user"></i> <span>Stage</span> <!--<small class="label pull-right bg-green">new</small>-->
                </a>
            </li>
            <li class="<?php echo (($this->uri->segment(1) == 'user_error()')?'active':''); ?>">
                <a href="<?php echo base_url('user'); ?>" title="Stage">
                  <i class="fa fa-user"></i> <span>Users</span> <!--<small class="label pull-right bg-green">new</small>-->
                </a>
            </li>
            <li class="<?php echo (($this->uri->segment(1) == 'user_error()')?'active':''); ?>">
                <a href="<?php echo base_url('lead'); ?>" title="Lead">
                  <i class="fa fa-user"></i> <span>Lead</span> <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            
        </ul>
    </section>
</aside>
