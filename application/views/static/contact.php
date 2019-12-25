<section id="page-title" data-parallax-image="<?=base_url()?>assets/front/images/banner/contact.jpg">
	<div class="container">
		<div class="page-title">
			<h1>Contact Us</h1>
		</div>
		<div class="breadcrumb">
			<ul>
				<li><a href="<?=base_url()?>">Home</a> </li>
				<li class="active"><a href="<?=base_url()?>contact">Contact Us</a> </li>
			</ul>
		</div>
	</div>
</section>


<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h3 class="mb-5 text-uppercase">Get In Touch</h3>
				<div class="m-t-30">
					<?php if($this->session->flashdata('fail')): ?>
			    <div class="alert alert-danger" role="alert">
			      <center><?php echo $this->session->flashdata('fail'); ?></center>
			    </div>
			    <?php endif; ?>
			    <?php if($this->session->flashdata('success')): ?>
			    <div class="alert alert-success" role="alert">
			      <center><?php echo $this->session->flashdata('success'); ?></center>
			    </div>
			    <?php endif; ?>
					<form action="<?=base_url()?>contact/postmessage" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Name</label>
								<input type="text" aria-required="true" name="name" class="form-control" placeholder="Enter your Name" required>
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" aria-required="true" name="email" class="form-control" placeholder="Enter your Email"required >
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="subject">Your Subject</label>
								<input type="text" name="subject" class="form-control" placeholder="Subject..." required>
							</div>
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea type="text" name="message" rows="5" class="form-control" placeholder="Enter your Message" required></textarea>
						</div>
						 <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LclF8kUAAAAADNhcUpBX--IP7XYwy_GMROgtv07"></div>
						<button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
					</form>
				</div>
			</div>
			<div class="col-lg-6">
				<h3 class="text-uppercase">Address & Map</h3>
				<div class="row">
					<div class="col-lg-6">
						<address>
							<strong>IEDC TKMCE</strong><br>
							TKM College of Engineering<br>
							Karicode, Kollam, Kerala<br>
							PIN : 691005<br>
						</address>
					</div>
					<div class="col-lg-6">
						<div class="mb-4 social-icons social-icons-large social-icons-colored-hover">
											<ul>
													<li class="social-linkedin"><a href="mailto:info@iedctkmce.com"><i
																			class="fa fa-envelope"></i></a>
													</li>
													<li class="social-linkedin"><a href="https://www.linkedin.com/company/iedc-tkmce/"><i
																			class="fab fa-linkedin"></i></a>
													</li>
													<li class="social-facebook"><a href="https://www.facebook.com/tkmedc/"><i
																			class="fab fa-facebook-f"></i></a>
													</li>
													<li class="social-instagram"><a href="https://www.instagram.com/iedc_tkmce/"><i
																			class="fab fa-instagram"></i></a>
													</li>
											</ul>
									</div>
					</div>
				</div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.626941914857!2d76.62975804973976!3d8.914230393200489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05fd3036020df5%3A0xc3c1007e5232dc27!2sTKM+College+of+Engineering!5e0!3m2!1sen!2sin!4v1555440606199!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</section>
