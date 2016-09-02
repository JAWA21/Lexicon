<div class="container">
<div id="content">
    <ul>
        <?php $count=sizeof($photoArr); for($i=0; $i<$count;$i++){?>
        <li><img class="photog thumbnail img-responsive" src="<?php echo base_url();echo 'assets/img/gallery/'.$photoArr[$i]['orig_name']?>">
	        <ul class="desc">
		        <li><h1 class="descItem"><?php echo $photoArr[$i]['pTitle']?></h1></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['pDesc']?></h2></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['make'] ." " . $photoArr[$i]['model']?></h2></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['iso_speed']?></h2></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['f_number']?></h2></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['exposure_time']?></h2></li>
		        <li><h2 class="descItem"><?php echo $photoArr[$i]['modified']?></h2></li>
                <?php echo form_open("cart/add_ToCart");?>
                    <input type="hidden" id="photo" name="photo" value="<?php echo ($photoArr[$i]['ID']); ?>" />
                    <input type="submit" class="btn btn-info" value="Add To Cart" />
                <?php echo form_close(); ?>
		    </ul>
	    </li>
    <div class="clearfix"></div>
    <?}?>
    </ul>
</div>
</div>