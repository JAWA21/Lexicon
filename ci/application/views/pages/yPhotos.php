<div class="container">
   <div class="row row-offcanvas row-offcanvas-left">
      <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="sm-6">
          	<h2>Photos</h2>
            <p>Update a photo</p>
          </div>

         <?php $count=sizeof($userPhotos); for($i=0; $i<$count;$i++){?>

         <div class="col-lg-3 col-sm-6 col-xs-12">
            <img src="/assets/img/gallery/<?php echo $userPhotos[$i]['orig_name']?>" class="thumbnail img-responsive">
         </div>
         

<?php echo form_open('gallery/update');?>

  <div class="row">
     <div class="form-group col-lg-4">
     <div class="clearfix"></div>
      <label for="title">Title</label>
      <input type="text" id="title" name="title" class="form-control" value="<?php echo $userPhotos[$i]['pTitle']?>" />
    </div>
     <div class="form-group col-lg-4">
      <label for="desc">Description:</label>
      <input type="text" id="desc" name="desc" class="form-control" value="<?php echo $userPhotos[$i]['pDesc']?>" />
    </div>
    <div class="form-group col-lg-4">
      <label for="desc">Price:</label>
      <input type="number" id="price" name="desc" class="form-control" onkeyup="isValidChar(this.value);" value="<?php echo $userPhotos[$i]['price']?>" />
    </div>

    <input type="hidden" name="id" value="<?$userPhotos[$i]['ID']?>"/>
  </div>


<input type="submit" value="update" class="btn btn-info pull-right"/>
<div class="clearfix"></div>
</form>
<?}?>


<?php echo form_open_multipart('gallery/do_upload');?>

	<div class="row">
        <div class="form-group col-lg-4">
			<p><label for="userfile">Upload</label></p>
			<input type="file" id="userfile" name="userfile" size="20" />
		</div>
		 <div class="form-group col-lg-4">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" class="form-control" value="<?php echo set_value('title'); ?>" />
		</div>
		 <div class="form-group col-lg-4">
			<label for="desc">Description:</label>
			<input type="text" id="desc" name="desc" class="form-control" value="<?php echo set_value('desc'); ?>" />
		</div>
    <div class="form-group col-lg-4">
      <label for="desc">Price:</label>
      <input type="number" id="price" name="desc" class="form-control" onkeyup="isValidChar(this.value);" value="<?php echo set_value('price'); ?>" />
    </div>

		<input type="hidden" name="id" value="<?$this->session->userdata('user_id');?>"/>
	</div>


<input type="submit" value="upload" class="btn btn-info pull-right"/>

</form>

</div>

<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>

    <div class="col-xs-6 col-sm-3 sidebar-offcanvas cmd" id="sidebar" role="navigation">
      <div class="list-group">
      	<p>Command Center</p>
        <?php echo anchor('user/profile', 'Profile', 'class="list-group-item "'); ?>
        <?php //echo anchor('user/orderStat', 'Orders', 'class="list-group-item"'); ?>
        <?php echo anchor('user/photosUp', 'Your Photos', 'class="list-group-item active"'); ?>
      
      </div>
    </div><!--/span-->
</div><!--/row-->
</div>