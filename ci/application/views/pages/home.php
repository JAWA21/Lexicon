<div class="container">
    <p class="col-lg-12 text-center">Lexicon is a photo site where one can browse and order favorite photos.</p>
	<!-- <div class="photo"> -->
    <?php $count=sizeof($photoArr); for($i=0; $i<$count;$i++){?>

		<div class="col-lg-3 col-sm-6 col-xs-12">
        <a href="#">
             <img src="/assets/img/gallery/<?php echo $photoArr[$i]['orig_name']?>" class="thumbnail img-responsive">
        </a>
    	</div>
	<?}?>
</div>