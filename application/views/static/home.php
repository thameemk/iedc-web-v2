<div id="slider" class="inspiro-slider slider-halfscreen arrows-large arrows-creative dots-creative" data-height-xs="360" data-autoplay-timeout="2600" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">

	<div class="slide background-overlay-one background-image" style="background-image:url('<?= base_url() ?>assets/front/images/banner/home.jpg');">
		<div class="container">
			<div class="slide-captions text-center">
				<h4 align="justify" class="lead text-light">We at IEDC TKMCE follow the mantra to put in the effort needed to improve and enhance our outlook on Innovation and Entrepreneurship.</h4>
			</div>
		</div>
	</div>


	<div class="slide background-overlay-one background-image" style="background-image:url('<?= base_url() ?>assets/front/images/banner/home-2.jpg');">
		<div class="container">
			<div class="slide-captions text-center">
				<h4 align="justify" class="lead text-light">We at IEDC TKMCE follow the mantra to put in the effort needed to improve and enhance our outlook on Innovation and Entrepreneurship. </h4>
			</div>
		</div>
	</div>

</div>
<section>
	<div class="row" style="margin: 10px;">
		<div class="col-lg-4" data-animate="flip">
			<div class="p-cb">
				<h5 class="text-center text-bold">INSPIRE</h5>
			</div>
		</div>
		<div class="col-lg-4" data-animate="flipInX">
			<div class="p-cb">
				<h5  class="text-center text-bold" >INNOVATE</h5>
			</div>
		</div>
		<div class="col-lg-4" data-animate="flipInY">
			<div class="p-cb">
				<h5  class="text-center text-bold">IGNITE</h5>
			</div>
		</div>
	</div>
</section>
<section class="background-grey">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>Vision</h2>
			<span class="lead">The Innovation and Entrepreneurship Development Cell aims to help students develop a spirit of innovation and entrepreneurship and to undertake major initiatives to assist the promotion of the same in the region by providing them the facilities to create the products and the services that will take us together towards a brighter future.</span>
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
<section>
	<div class="container">

		<div class="carousel arrows-visibile testimonial testimonial-single testimonial-left" data-items="1">
			
			<div class="testimonial-item">
				<div class="heading-text text-center">
					<h3>Nodal Officer's Message!</h3>
				</div>
				<img src="<?= base_url() ?>assets/uploads/images/MEEN320-1466140193-thumb.jpg" alt="Dr. Mohammed Sadhikh">
				<span class="lead">Engineering students in general and TKMCE students in particular are full of passion from day one of their professional course. They are impatient to innovate, build and experiment. We teachers, want them to learn in a sequential fashion, starting from basic fundamentals of engineering to core engineering subjects and finally to build and experiment in their final year. IEDC TKMCE provides a space for impatient students to start experimenting and learn by collaborating with students faculty, alumni and experts around the world. We strive to compliment classroom learning with need-based learning while creating and experimenting new ideas. Thus, we act as a bridge connecting conventional learning and modern learning. Come join IEDC, and find joy in collaboration and networking.</span>
				<span class="text-bold mt-3" style="color:black;">Dr. Mohammed Sadhikh</span>
				<span class="text-bold">Professor -
					Department of Mechanical Engineering</span>
			</div>
			<!-- nodal -->
			<div class="testimonial-item">
				<div class="heading-text text-center">
					<h3>Assistant Nodal Officer's Message!</h3>
				</div>
				<img src="<?= base_url() ?>assets/uploads/images/shafi-sir.jpg" alt="">
				<span class="lead">Engineering students in general and TKMCE students in particular are full of passion from day one of their professional course. They are impatient to innovate, build and experiment. We teachers, want them to learn in a sequential fashion, starting from basic fundamentals of engineering to core engineering subjects and finally to build and experiment in their final year. IEDC TKMCE provides a space for impatient students to start experimenting and learn by collaborating with students faculty, alumni and experts around the world. We strive to compliment classroom learning with need-based learning while creating and experimenting new ideas. Thus, we act as a bridge connecting conventional learning and modern learning. Come join IEDC, and find joy in collaboration and networking.</span>
				<span class="text-bold mt-3" style="color:black;">Mr. Shafi M.N.</span>
				<span class="text-bold">Professor -
					Department of Electronics & Communication Engineering</span>
			</div>
			<!-- assi .nodal -->
			<!-- //formal -->
			<div class="testimonial-item">
				<div class="heading-text text-center">
					<h3>Formal Nodal Officer's Message!</h3>
				</div>
				<img src="<?= base_url() ?>assets/uploads/images/nodal-officer.jpg" alt="Dr. Imthias Ahamed T.P">
				<span class="lead">Engineering students in general and TKMCE students in particular are full of passion from day one of their professional course. They are impatient to innovate, build and experiment. We teachers, want them to learn in a sequential fashion, starting from basic fundamentals of engineering to core engineering subjects and finally to build and experiment in their final year. IEDC TKMCE provides a space for impatient students to start experimenting and learn by collaborating with students faculty, alumni and experts around the world. We strive to compliment classroom learning with need-based learning while creating and experimenting new ideas. Thus, we act as a bridge connecting conventional learning and modern learning. Come join IEDC, and find joy in collaboration and networking.</span>
				<span class="text-bold mt-3" style="color:black;">Dr. Imthias Ahamed T.P</span>
				<span class="text-bold">Professor -
					Department of Electrical and Electronics Engineering</span>
			</div>
		</div>

	</div>
</section>
<section class="p-b-0">
	<div class="container">
		<div class="heading-text heading-section">
			<h2>Upcoming Treks</h2>
			<span align="justify" class="lead">Check Out our new events and Programs</span>
		</div>
	</div>
	<div class="portfolio">

		<div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">
			<?php
			$i = 0;
			foreach (array_reverse($upcomingInfo) as $row) {
				if ($i == 8) break;
				$i++;
			?>
				<div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media" id="<?= $row['uEvent'] ?>">
					<div class="portfolio-item-wrap">
						<div class="portfolio-image">
							<img src="<?= base_url() ?>assets/uploads/images/updates/<?= $row['imageLink'] ?>" alt="<?= $row['uTitle'] ?>">
						</div>
						<div class="portfolio-description">
							<a href="javascript:;">
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
									<a class="btn btn-red fadeInUp" href="<?= $row['uRegistration'] ?>" style="animation-duration: 600ms;">View / Register</a>
								<?php } ?>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<center><a href="<?= base_url() ?>events" class="btn text-white btn-red btn-outline mt-3">Load More...</a></center>
</section>
<section>
	<div class="container">
		<div class="heading-text heading-section text-center">
			<h2>SERVICES</h2>
			<p>Find your right tools</p>
		</div>
		<div class="row">
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-cogs"></i></a> </div>
					<h3>Maker Library</h3>
					<p>Book your componets virtually</p>
				</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="200">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-lightbulb"></i></a> </div>
					<h3>Project Proposal</h3>
					<p>Submit your project proposal. We will help you to buid your dream projects</p>
				</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="400">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-rocket"></i></a> </div>
					<h3>Pre Incubation</h3>
					<p>Start on the right path with our expert opinion.</p>
				</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-cloud"></i></a> </div>
					<h3>Server Access</h3>
					<p>Host your website and boost your startups and projects.</p>
				</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="800">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-calendar"></i></a> </div>
					<h3>Schedule Meeting </h3>
					<p>Digitalise all your meetings with a personalised calender</p>
				</div>
			</div>
			<div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="1000">
				<div class="icon-box effect medium border small">
					<div class="icon"> <a href="javascript:;"><i class="fa fa-clipboard-list"></i></a> </div>
					<h3>Business Model</h3>
					<p>Submit your model for evaluation from our expert mentor pool.</p>
				</div>
			</div>

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