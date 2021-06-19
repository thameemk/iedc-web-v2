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

	.row {
		margin-right: 0px;
	}

</style>

<section class="banner-img-height" id="page-title"
	style="background-color: #181918;background-size: contain;background-repeat: no-repeat;"
	data-parallax-image="<?= base_url() ?>assets/front/images/banner/registration.jpg">
</section>
<section>
	<div class="container">
		<?php if ($this->session->flashdata('fail')) : ?>
		<div class="alert alert-danger" role="alert">
			<center><?php echo $this->session->flashdata('fail'); ?></center>
		</div>
		<?php endif; ?>
		<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success" role="alert">
			<center><?php echo $this->session->flashdata('success'); ?></center>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="mb-1">
				<span class="smalldesc">
					<h5 style="word-spacing:-1px" align="justify" class="mx-sm-5 custom-para">
						<span style="font-style:italic;">If you can change nothing, nothing is changed</span><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Joyce<br>

						Is your brain sizzling with innovative thoughts and ideas?
						<br>
						Are you on the lookout for a companion to implement your ideas to rule the sphere? Well then,
						join hands with IEDC. IEDC TKMCE has opened its door to welcome all the young geniuses to the
						world of innovation.
						<br>
						Sign up now, for the perks of being a member are many.
						<ul>
							<li>A student portal exclusive for IEDC members.
							<li>Mentorship by skilled professionals and alumnis in various trades.
							<li>Access to hardware library and Maker space.
							<li>Provision of server access.
							<li>Financial and other support for startups.
							<li>Project Funding.
							<li>Attractive discounts and offers for all events conducted by IEDC, exclusively for
								members etc.
						</ul>
						What are you waiting for? Join on board and ignite the genius within you!
						<br>
						<span style="color:red">The registration is exclusively for first-year students.<br>
							Registration fee of Rs.200 for the entire academic session.</span>
						<br>
						Pay the registration fee using the UPI or account details given below.
						<br>
						<center>
                        <span></span>Chief Finance Officer - IEDC TKMCE<br>                        
                        UPI: nidhinbm.bm@oksbi<br>
                        Account Name: Nidhin B M<br>
                        Account Number: 39592169906<br>
                        IFSC: SBIN0070322<br>
                        </span>
                        </center>
                        </pre>
					</h5>
					<br>

				</span>
			</div>
		</div>
	</div>
</section>
<div class="row">
	<div class="container mt-3 mb-5">
		<h3 class="mb-5 text-center">Membership Registration</h3>
		<div class="">
			<form action="<?= base_url() ?>pages/new_user_registration" method="post">
				<div class="row">
					<div class="form-group col-md-6">
						<label class="required" for="name">Name </label>
						<input type="text" aria-required="true" name="name" class="form-control"
							placeholder="Enter your name" required>
					</div>
					<div class="form-group col-md-6">
						<label class="required" for="email">Email (Gmail or TKMCE mail)</label>
						<input type="email" aria-required="true" name="email" class="form-control"
							placeholder="Enter your Email" required>
					</div>
					<div class="form-group col-md-6">
						<label class="required" for="phone">Phone</label>
						<input type="phone" name="phone_number" class="form-control"
							placeholder="Enter your phone number" required>
					</div>
					<div class="form-group col-md-6">
						<label class="required" for="admission_number">TKMCE Admission Number</label>
						<input type="number" aria-required="true" name="admission_number" class="form-control"
							placeholder="Enter admission number" required>
					</div>

					<div class="form-group col-md-6">
						<label class="required" for="Year of study">Year of Study</label>
						<select name="year" class="form-control" required>
							<option value="first-year">First Year</option>
								<option value="second-year">Second Year</option>
									<option value="third-year">Third Year</option>
										<option value="fourth-year">Fourth Year</option>
						</select>
					</div>
					<div class="form-group  col-md-6">
						<label class="required" for="Branch">Select your Branch</label>
						<select name="branch" class="form-control" required>
							<option>Architecture</option>
							<option>Chemical Engineering</option>
							<option>Civil Engineering</option>
							<option>Computer Science & Engineering</option>
							<option>Electronics & Communication Engineering</option>
							<option>Electrical & Electronics Engineering</option>
							<option>Master of Computer Application</option>
							<option>Mechanical Engineering</option>							
						</select>
					</div>

					<div class="form-group  col-md-6">
						<label class="required" for="transaction_id">Transaction id </label>
						<input type="text" aria-required="true" name="transaction_id" class="form-control"
							placeholder="Enter your payment transaction id." required>
					</div>	
                    <div class="form-group  col-md-6"></div>
                    <div class="form-group  col-md-6">
						<label class="required" for="remarks">REMARKS</label>
						<textarea style="height:150px" class="form-control" name="extras" placeholder="Enter details regarding your extracurricular activities, awards, achievements, technical knowledge,  arts fest, science fair, social service .......etc 
                        " required></textarea>
					</div>					
				</div>                
				<div class="g-recaptcha" name="g-recaptcha-response"
					data-sitekey="6LfZF_EUAAAAANZ8kcPRhCXKepzq_RIOYd55Mob5"></div>
                    <span style="color:#0C4489">After the verification of your payment and data, you can access the portal.
                    <br>
                    We will inform you the procedures through Official WhatsApp group or by email</span>      <br><br>
				<button class="btn btn-danger" type="submit" disabled><i class="fa fa-paper-plane"></i>&nbsp;Registrtion Closed</button>
			</form>
		</div>
	</div>
</div>
