<style>
	.banner-img-height {
		height: 380px;
	}

	@media screen and (max-width: 600px) {
		.banner-img-height {
			height: 150px;
		}
	}

	.first-letter {
		font-size: 80px;
	}

	.custom-para {
		line-height: 40px;
	}
</style>
<section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/EVENTS.png">
</section>
<section class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section">
			<span align="justify" class="lead">Check Out our new events and Programs</span>
		</div>
	</div>
	<div class="portfolio">

		<div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
			<div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media" id="dare2develop">
				<div class="portfolio-item-wrap">
					<div class="portfolio-image">
						<img src="//www.iedctkmce.com/assets/uploads/images/updates/dare2develop.jpeg" alt="Dare2Develop">
					</div>
					<div class="portfolio-description">
						<a href="javascript:;">
							<h3>Dare2Develop</h3>
							<span>
								<b>
									Venue : Online <br>
								</b>
							</span>

							<a class="btn btn-red fadeInUp" href="//www.iedctkmce.com/events/dare2develop" style="animation-duration: 600ms;">View Event</a>

						</a>
					</div>
				</div>
			</div>
			<?php
			foreach (array_reverse($upcomingInfo) as $row) {
			?>
				<div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media" id="<?= $row['event_link'] ?>">
					<div class="portfolio-item-wrap">
						<div class="portfolio-image">
							<img src="<?= base_url() ?>assets/uploads/images/updates/<?= $row['img_link_public'] ?>" alt="<?= $row['event_title'] ?>">
						</div>
						<div class="portfolio-description">
							<a href="javascript:;">
								<h3><?= $row['event_title'] ?></h3>
								<span>
									<b>
										<?php if ($row['event_date'] != NULL) { ?>
											Date : <?= $row['event_date'] ?><br>
										<?php }
										if ($row['event_time'] != NULL) { ?>
											Time : <?= $row['event_time'] ?><br>
										<?php }
										if ($row['event_venue'] != NULL) { ?>
											Venue : <?= $row['event_venue'] ?> <br>
										<?php }
										if ($row['contact_1_num'] != NULL) { ?>
											Contact : <?= $row['contact_1_name'] ?> <?= $row['contact_1_num'] ?><br>
										<?php }
										if ($row['contact_2_num'] != NULL) { ?>
											Contact : <?= $row['contact_2_name'] ?> <?= $row['contact_2_num'] ?><br>
										<?php } ?>
									</b>
								</span>
								<a class="btn btn-red fadeInUp" href="<?= base_url() ?>events/<?= $row['event_link'] ?>" style="animation-duration: 600ms;">View Event</a>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>