<section class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>Events</h2>
			<span align="justify" class="lead">Check Out our new events and Programs</span>
		</div>
	</div>
	<div class="portfolio">

		<div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
			<?php
			foreach (array_reverse($upcomingInfo) as $row) {
			?>
				<div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media" id="<?= $row['uEvent'] ?>">
					<div class="portfolio-item-wrap">
						<div class="portfolio-image">
							<img style="height:300px;" src="<?= base_url() ?>assets/uploads/images/updates/<?= $row['imageLink'] ?>" alt="<?= $row['uTitle'] ?>">
						</div>
						<div class="portfolio-description">
							<a href="portfolio-page-grid-gallery.html">
								<h3><?= $row['uTitle'] ?></h3>
								<span>
									<b>
										<?php if ($row['uDate'] != NULL) { ?>
											Date : <?= $row['uDate'] ?><br>
										<?php }
										if ($row['uTime'] != NULL) { ?>
											Time : <?= $row['uTime'] ?><br>
										<?php }
										if ($row['uVenue'] != NULL) { ?>
											Venue : <?= $row['uVenue'] ?> <br>
										<?php }
										if ($row['uContact'] != NULL) { ?>
											Contact : <?= $row['uContact'] ?><br>
										<?php } ?>
									</b>
								</span>
								<?php if ($row['uRegistration'] != NULL) { ?>
									<a class="btn btn-red fadeInUp" href="<?= $row['uRegistration'] ?>" style="animation-duration: 600ms;">Register</a>
								<?php } ?>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>