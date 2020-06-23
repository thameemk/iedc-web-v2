
<section id="page-title" data-parallax-image="">
	<div class="container">
		<div class="page-title">
			<h1>Innovate For TKM</h1>
		</div>
		<div class="breadcrumb">
			<ul>
				<li><a href="<?=base_url()?>">Home</a> </li>
				<li class="active"><a href="<?=base_url()?>contact">Innovate For TKM</a> </li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
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
		<div class="row">
      <div class="col-lg-6 pr-3">
				<div class="row">
					  <div class="mb-3 mt-5">
              <div>
                <h3>Innovate For TKM</h3>
                <p align="justify">Innovate for TKM is an event conducted by IEDC, TKMCE focused on first and second year
                  students of any branch. The event is developing and prototyping an idea that fits as a
                  solution for any problem you come across inside our college.
                </p>
              </div>
							<span class="teaser">
                <h5 id="rules">Rules & Regulations</h5>
              </span>
							<span class="collapse smalldesc" id="more">
                      <ol type="1"><b>Event criteria</b>
                        <li class="ml-3">The participants can participate in a team of 3 or 4
                        <li class="ml-3">ALone wolfs are also welcome.
                        <li class="ml-3">Interbranch teams are allowed.
                        <li class="ml-3">Final date for abstract submission will be 18/01/2020
                        <li class="ml-3">The event mainly comprises of three rounds
                      </ol>
                      <b>Round-1</b><br>
                        <p align="justify">
                      This is the round of abstract submission. The students has to submit an abstract that briefly
                      explains about their problem statement and also the technical solution for the problem. The
                      participants can upload their abstract through the online IEDC portal.
                      *Word limit for abstract – 600 words
                      <br>
                      <b>Round-2</b><br>
                      Your idea is evaluated in this stage. The selected teams of Round-1 has to prepare a
                      presentation that explains about their idea and way of implementation. A model
                      presentation template will be sent to the selected teams. The judges will evaluate the
                      team’s presentation and the quality of solution.
                      <br>
                      <b>Round-3</b><br>
                      This stage is prototype development. Only top three or four teams are qualified to this
                      round. The participants has to implement their product and develop the prototype. Any kind
                      of technical support and mentorship can be expected by the participants of this round. Cost
                      of development will be reimbursed upon submission of financial report.
                      <br>
                      *The number of qualified teams of Round-3 can vary based on the total number of
                      participants.
                      <br>
                      ** Cost of development will be reimbursed up to a maximum of Rs.5000.
                      <br>
                      *** The judging panel’s decision is final in every round.
                      <br>
                      <b>Result</b><br>
                      The final winners will be selected based on successful running of their product in the
                      campus for two weeks.<br>

                      <b>Prizes</b><br>
                      First Prize – Rs. 20,000/-<br>
                      Second Prize – Rs. 10,000/-<br>

                      *This amount given will be inclusive of the cost of development.<br>
                      </p>
                      <b><ol type="1">Coordinators:</b>
                        <li class="ml-3">V R BABU 8301976198
                        <li class="ml-3">Jishnu 9562438038
                        <li class="ml-3">Yadhu 8547171173
                      </ol>
                </span>
              <span><a href="#more" data-toggle="collapse">Click to expand</a></span>
				   </div>
				    <img src="<?=base_url()?>assets/uploads/images/updates/InnovateforTKM.jpg" width="auto" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			   </div>
		  </div>
			<div class="col-lg-6 mt-5">
				<h3 class="mb-5">Register Here</h3>
				<div class="m-t-30">
					<form action="<?=base_url()?>pages/innovate_reg" method="post">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Team Leder</label>
								<input type="text" aria-required="true" name="tlname" class="form-control" placeholder="Enter team leader's name" required>
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" aria-required="true" name="tlemail" class="form-control" placeholder="Enter team leader's Email"required >
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="phone">Phone</label>
								<input type="phone" name="tlphone" class="form-control" placeholder="Enter team leader's phone" required>
							</div>
							<div class="form-group col-md-6">
								<label for="Team Leader Year">Year of Study</label>
								<select name="tlyear" class="form-control" required>
									<option>Select Year</option>
									<option>First Year</option>
									<option>Second Year</option>
								</select>
							</div>
						</div>
            <div class="row">
							<div class="form-group col-md-12">
								<label for="team members">Team Members</label>
								<input type="text" name="member_one" class="form-control mb-3" placeholder="Team Member 1">
                <input type="text" name="member_two" class="form-control mb-3" placeholder="Team Member 2">
                <input type="text" name="member_three" class="form-control" placeholder="Team Member 3">
							</div>
						</div>

						<div class="form-group">
							<label for="message">Abstract</label>
							<textarea type="text"  maxlength = "600" name="abstract" rows="5" class="form-control" placeholder="Abstract (Upto 600 words)" required></textarea>
						</div>
            <div class="form-group">
              <input type="checkbox" name="accept_rule" class="mr-3" required>Accept <a href="#rules">rules and regulations</a>
            </div>
						<div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LfZF_EUAAAAANZ8kcPRhCXKepzq_RIOYd55Mob5"></div>						
						<button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Register</button>
					</form>
				</div>
			</div>
	</div>
</section>
