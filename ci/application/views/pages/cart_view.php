<div class="row">
	<div class="box">
  		<div class="col-lg-12">
  			<hr>
		    	<h2 class="intro-text text-center"><strong>Cart</strong></h2>
		    <hr>
  			<div style="outline: 2px solid grey">
		   		<?php if($this->cart->contents() == null){?>
		   			<p>Empty</p>
		   		<?}else{ ?>
		   			<?php echo form_open('cart/update_cart'); ?>
		   			<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

						<tr>
						  <th>Item</th>
						  <th style="text-align:right">Item Price</th>
						  <th style="text-align:right">Sub-Total</th>
						</tr>

						<?php $i = 1; ?>

						<?php foreach ($this->cart->contents() as $items): ?>

							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

							<tr>
							  
							  <td>
								<?php echo $items['name']; ?>

									<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
										<p>
											<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

												<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

											<?php endforeach; ?>
										</p>
									<?php endif; ?>

							  </td>
							  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
							  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
							</tr>

						<?php $i++; ?>
						<?php endforeach; ?>

						<tr>
						  <td colspan="2"> </td>
						  <td class="pull-right"><strong>Total</strong></td>
						  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
						</tr>
					</table>

				<?}?>
			</div>
			    <?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
			    

			    <div class=" col-lg-5">
			    	<a href="/index.php/signup" class="btn btn-info pull-right">Checkout</a>
			    	<div class="logout btn btn-default pull-right"><?php echo anchor('cart/destroyCart', 'Empty Cart',$onclick); ?></div>
	            </div>

	           
  		</div>
	</div>
</div>