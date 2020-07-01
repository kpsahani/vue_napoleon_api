<?php echo $header; ?>
<style>
.errorbutton{
float:right;margin-top:4px;}
</style>
<div class="content">
  <ul class="breadcrumb">
    <li> <a href="<?php echo site_url('errors');?>"><?php echo $section_title;?></a> <span class="divider"></span> </li>
  </ul>
  <div class="box">
    <div class="heading">
      <h1><img alt="" src="images/error.jpeg" width="25px"><?php echo $section_title;?></h1>
   <div class="box-icon errorbutton">
            <a href="<?php echo site_url('errors/clear');?>" style="float:none;"><span class="btn btn-primary btn-medium">Clear Log</span></a>
          </div>
    </div>
    <div class="boxcontent" style="height:200px;">
     
          <?php if(($this->session->userdata['cityflix_admin'])){?>
           	   
    
        <textarea wrap="off" style="padding: 5px; border: 1px solid #CCCCCC; background: #FFFFFF; overflow: scroll;margin-top:5px;width:99%" class="input-xlarge focused inputError" rows="15"><?php echo $log; ?></textarea>
    
        <?php }?>
         

    </div>
  </div>
  <!-- end .content --> 
</div>
<?php echo $footer; ?> 
<!--	end of footer	-->