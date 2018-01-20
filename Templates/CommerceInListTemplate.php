<div class="col-lg-4 col-md-4 col-sm-6">
		<a href="<?php $config->printPath('?section=commerce&id='.$value['username']); ?>" class="fh5co-card-item">
			<figure>
				<div class="overlay"><i class="ti-plus"></i></div>
				<img src="images/img_1.jpg" alt="Image" class="img-responsive">
			</figure>
			<div class="fh5co-text">
				<h2><?php echo $value['comercialname']; ?></h2>
				<p><?php echo $value['description']; ?></p>
				<p><span class="price cursive-font"><?php echo $value['price']; ?>€</span></p>
			</div>
		</a>
	</div>