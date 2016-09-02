<div class="row">
  <div class="box">
    <div class="col-lg-12">
      <hr>
      <h2 class="intro-text text-center"><strong>Login</strong></h2>
      <hr>
	<?php echo form_open("user/login"); ?>
		<div class="row">
            <div class="form-group col-lg-4">
              <label for="email">Email:</label>
    		  <input type="text" id="email" name="email" value="" class="form-control"/>
            </div>

		    <div class="form-group col-lg-4">
		    	<label for="pass">Password:</label>
				<input type="password" id="pass" name="pass" value="" class="form-control"/>
			</div>

			<div class="form-group col-lg-12">
	        	<input type="submit" class="btn btn-default pull-right" value="Sign in" />
	        </div>
	    </div>
    <?php echo form_close(); ?>
	</div><!--<div class="col-lg-12">-->
  </div><!--<div class="box">-->
</div><!--<div class="row">-->


<div class="row">
  <div class="box">
    <div class="col-lg-12">
      <hr>
      <h2 class="intro-text text-center"><strong>Register</strong></h2>
      <div class="text-center">It's free and anyone can join</div>
      <hr>

<?php echo validation_errors('<p class="error">'); ?>
	<?php echo form_open("user/registration"); ?>
		<div class="row">
            <div class="form-group col-lg-4">
				<label for="user_name">Username:</label>
				<input type="text" id="user_name" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
			</div>      

        	<div class="form-group col-lg-4">
				<label for="email_address">Your Email:</label>
				<input type="text" id="email_address" name="email_address" class="form-control" value="<?php echo set_value('email_address'); ?>" />
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

	</div><!--<div class="col-lg-12">-->    
  </div><!--<div class="box">-->
</div><!--<div class="row">-->