
<div class="container">
    <div class="row row-offcanvas row-offcanvas-left">

    <div class="col-xs-12 col-sm-9">
         <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
         </p>
         <div class="sm-6">
          	<h2 class="col-lg-12 text-center">Hello <?php echo $this->session->userdata('user_name'); ?>!</h2>
         </div>
         
         <?php $count=sizeof($userPhotos); for($i=0; $i<$count;$i++){?>

         <div class="col-lg-3 col-sm-6 col-xs-12">
                <img src="/assets/img/gallery/<?php echo $userPhotos[$i]['orig_name']?>" class="thumbnail img-responsive">
         </div>
         <?}?>

    </div>

    <?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
    
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas cmd" id="sidebar" role="navigation">
        <div class="list-group">
          	<p>Command Center</p>
            <?php echo anchor('user/profile', 'Profile', 'class="list-group-item"'); ?>
            <?php //echo anchor('user/orderStat', 'Orders', 'class="list-group-item"'); ?>
            <?php echo anchor('user/photosUp', 'Your Photos', 'class="list-group-item"'); ?>
        </div>
    </div><!--/span-->
    </div><!--/row-->
</div>