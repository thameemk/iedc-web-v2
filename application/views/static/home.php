<div id="slider" class="inspiro-slider slider-halfscreen arrows-large arrows-creative dots-creative" data-height-xs="360" data-autoplay-timeout="2600" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">

	<div class="slide background-overlay-one background-image" style="background-image:url('<?= base_url() ?>assets/front/images/banner/home.jpg');">
		<div class="container">
			<div class="slide-captions text-center">

				<h3 class="text-uppercase text-light" style="font-size: 40px!important;font-weight: 800;line-height: 1.1;">Always deliver more</h3>
				<h4 class="text-uppercase text-light" style="font-size: 30px!important;font-weight: 800;line-height: 1.1;"> Larry Page</h4>

				<h4 align="justify" class="lead text-light">At Innovation and Entrepreneurship Development Cell, TKMCE we take
					this as our mantra. We make constant efforts to improve and enhance our outlook about
					Innovation & Entrepreneurship. </h4>
			</div>
		</div>
	</div>


	<div class="slide background-overlay-one background-image" style="background-image:url('<?= base_url() ?>assets/front/images/banner/home-2.jpg');">
		<div class="container">
			<div class="slide-captions text-center">

				<h3 class="text-uppercase text-light" style="font-size: 40px!important;font-weight: 800;line-height: 1.1;">Always deliver more</h3>
				<h4 class="text-uppercase text-light" style="font-size: 30px!important;font-weight: 800;line-height: 1.1;"> Larry Page</h4>

				<h4 align="justify" class="lead text-light">At Innovation and Entrepreneurship Development Cell, TKMCE we take
					this as our mantra. We make constant efforts to improve and enhance our outlook about
					Innovation & Entrepreneurship. </h4>
			</div>
		</div>
	</div>

</div>
<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>Vision</h2>
			<span class="lead">The Innovation and Entrepreneurship Development Cell aims to encourage and
				develop, innovative and entrepreneurship spirit among the students and to undertake major
				initiatives to assist innovation promotion in the region. We have facilitate the metamorphosis
				and create products, services and solutions contributing to a brighter future. </span>
		</div>

	</div>
	<div class="container" id="about">
		<div class="heading-text heading-section">
			<h2>About Us</h2>
			<span align="justify" class="lead"> The Innovation and Entrepreneurship Development Cell of TKMCE is an organisation
				that aims to promote the institutional vision of transforming youngsters into technological
				entrepreneurs and innovative leaders. The initiative is to address the rising trend of corporate
				job culture and establish a platform to pursue ideas and businesses at an early stage. We at
				IEDC TKMCE host various workshops, speaker sessions, competitions to develop skill sets and
				provide essential resources to take up entrepreneurship as a career. </span>
		</div>

	</div>
</section>


<section class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>Upcoming Treks</h2>
			<span align="justify" class="lead">Check Out our new events and Programms</span>
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
							<img height="100px" width="auto" src="<?= base_url() ?>assets/uploads/images/updates/<?= $row['imageLink'] ?>" alt="<?= $row['uTitle'] ?>">
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
								<a class="btn btn-red fadeInUp" href="<?= $row['uRegistration'] ?>" style="animation-duration: 600ms;">Register</a>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<section>
	<div class="call-to-action background-image p-t-100 p-b-100" style="background-image:url('<?= base_url() ?>assets/front/images/contact.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-10">
					<h3 class="text-light">Have any Question?</h3>
					<p class="text-light">We're here to help. Please feel free to contact our expert.</p>
				</div>
				<div class="col-lg-2"> <a href="<?= base_url() ?>contact" class="btn btn-light btn-outline">Contact Us!</a> </div>
			</div>
		</div>
	</div>
</section>