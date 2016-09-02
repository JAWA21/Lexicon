<div class="container">
   <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-xs-12 col-sm-9">
         <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
         </p>
         <div class="sm-6">
            <h2>Profile of <?php echo $this->session->userdata('user_name'); ?></h2>
            <p>Here you can make changes to your acccount.</p>
         </div>
         <?php echo form_open("user/update"); ?>
      <div class="row">
            <div class="form-group col-lg-4">
            <label for="user_name">Username:</label>
            <input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo $this->session->userdata('user_name'); ?>"/>
         </div>      

         <div class="form-group col-lg-4">
            <label for="email_address">Your Email:</label>
            <input type="text" id="email_address" name="email_address" class="form-control" value="<?php echo $this->session->userdata('user_email'); ?>" />
         </div>

         <div class="form-group col-lg-4">
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" class="form-control" value="<?php echo set_value('old_password'); ?>" />
         </div>

         <div class="form-group col-lg-4">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" />
         </div>

         <div class="form-group col-lg-4">
            <label for="con_password">Confirm Password:</label>
            <input type="password" id="con_password" name="con_password" class="form-control" value="<?php echo set_value('con_password'); ?>" />
         </div>

          <div class="form-group col-lg-12">
            <input type="submit" class="btn btn-default pull-right" value="Submit" />
         </div>
      </div> <!-- close row -->
   <?php echo form_close(); ?>
      </div>

<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>

      <div class="col-xs-6 col-sm-3 sidebar-offcanvas cmd" id="sidebar" role="navigation">
         <div class="list-group">
           <p>Command Center</p>
           <?php echo anchor('user/profile', 'Profile', 'class="list-group-item active"'); ?>
           <?php //echo anchor('user/orderStat', 'Orders', 'class="list-group-item"'); ?>
           <?php echo anchor('user/photosUp', 'Your Photos', 'class="list-group-item"'); ?>
         </div>
      </div><!--/span-->
   </div><!--/row-->
</div> <!--/container-->