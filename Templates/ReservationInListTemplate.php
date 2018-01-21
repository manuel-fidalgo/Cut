<div class="col-lg-4 col-md-4 col-sm-6">
		<div class="fh5co-card-item">
			<figure>
				<div class="overlay">
					<a  href="<?php $config->printPath('?action=cancel&userName='.$reservation['commerceUsername'].'&datetime='.$reservation['datetime']); ?>">
						<i class="ti-trash red"></i>
						<span class="center red">ELIMINAR</span>
					</a>
				</div>
				<img src="images/img_1.jpg" alt="Image" class="img-responsive">
			</figure>
			<div class="fh5co-text">
				<h2><?php echo $reservation['commerceUsername']; ?></h2>
				<p><span class="cursive-font"><?php echo $reservation['date']; ?></span></p>
				<p><span class="price cursive-font"><?php echo substr($reservation['time'],0,5); ?></span></p>
				<p><span>-<?php echo $reservation['serviceName']; ?>-</span></p>
			</div>
		</div>
	</div>