<div class="container">
      <div class="row row-offcanvas row-offcanvas-left">

      <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="sm-6">
          	<h2>Orders</h2>
     <!-- <p>Current orders</p> -->
     
     <?//var_dump($this->session->userdata)?>

          </div>
      <p><?var_dump($this->session->userdata['cart_contents'])?></p>
      <ul>
      <?php 
      $cart=$this->session->userdata['cart_contents']; 
      //$count=sizeof($cart);  
      for($i=0; $i<4;$i++){?>
        <li><?echo $cart['name']?></li>
      <?}?>

</div>

<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>

    <div class="col-xs-6 col-sm-3 sidebar-offcanvas cmd" id="sidebar" role="navigation">
      <div class="list-group">
      	<p>Command Center</p>
        <?php echo anchor('user/profile', 'Profile', 'class="list-group-item "'); ?>
        <?php //echo anchor('user/orderStat', 'Orders', 'class="list-group-item active"'); ?>
        <?php echo anchor('user/photosUp', 'Your Photos', 'class="list-group-item"'); ?>
      
      </div>
    </div><!--/span-->
</div><!--/row-->
</div>