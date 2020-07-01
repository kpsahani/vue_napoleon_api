<script language="javascript" type="text/javascript">
$(document).ready(function(){
	$('.sf-menu').supersubs({minWidth:10,maxWidth:20,extraWidth:1}).superfish({autoArrows	: false});
});
</script>

<div id="menu">
  <ul class="sf-menu">
    <li <?php if($this->uri->segment(1) == 'dashboard'){?> class="selected"<?php } ?>><a title="Dashboard" href="<?php echo site_url('dashboard');?>" class="top">Dashboard</a></li>
    <?php if(($this->session->userdata['cityflix_admin'])){?>
    <li <?php if(($this->uri->segment(1) == 'setting') || ($this->uri->segment(1) == 'seo') || ($this->uri->segment(1) == 'sem')){?> class="selected"<?php } ?> ><a title="Setting" class="top">Setting</a>  
        <ul>
            <li><a title="General Setting" href="<?php echo site_url('setting');?>">General Setting</a></li>
        <li><a title="SEO Setting" href="<?php echo site_url('seo');?>">SEO Setting</a></li>
        <li> <a title="SEMs Setting" href="<?php echo site_url('sem');?>">SEMs Setting</a> </li>
      </ul>
    </li>
   
    <li <?php if($this->uri->segment(1) == 'page'){?> class="selected"<?php } ?> > <a class="top"  title="Pages" >Pages</a>
      <ul>
        <li><a title="List All  Pages" href="<?php echo site_url('page');?>">List All  Pages</a></li>
      </ul>
    </li>
<li <?php if($this->uri->segment(1) == 'tripadvisor'){?> class="selected"<?php } ?> > <a title="Trip Advisor" href="<?php echo site_url('tripadvisor');?>" class="top">Trip Advisor</a> </li>
<li <?php if($this->uri->segment(1) == 'user'){?> class="selected"<?php } ?> > <a title="User" href="<?php echo site_url('user');?>" class="top">Users</a> </li>
    <li <?php if($this->uri->segment(1) == 'tour'){?> class="selected"<?php } ?> > <a title="Tours" href="<?php echo site_url('tour');?>" class="top">Tours</a> </li>
    <li <?php if($this->uri->segment(1) == 'gallery'){?> class="selected"<?php } ?> > <a title="Gallery" href="<?php echo site_url('gallery');?>" class="top">Gallery</a> </li>
    <li <?php if($this->uri->segment(1) == 'booking'){?> class="selected"<?php } ?> > <a title="Booking" href="<?php echo site_url('booking');?>" class="top">Booking</a> </li>
    <li <?php if($this->uri->segment(1) == 'category'){?> class="selected"<?php } ?> > <a title="Category" href="<?php echo site_url('category');?>" class="top">Category</a> </li>
    <?php }?>
    <li> <a class="top" title="Logout" href="<?php echo site_url('dashboard/logout');?>">Logout</a> </li>
  </ul>
</div>
