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

<section class="banner-img-height" id="page-title" style="background-color: #181918;background-size: contain;background-repeat: no-repeat;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/registration.jpg">
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
            <div class="mb-1">
                <span class="smalldesc">
                     <h3 class="text-center" style="text-align: justify;">Call for aspiring entrepreneurs</h3><br>
                    <h5 style="word-spacing:-1px" align="justify" class="mx-sm-5 custom-para">
                        <span style="font-style:italic;">A vision is something you see and others don't. Some people would say that's a pocket definition of lunacy. But it also defines entrepreneurial spirit.</span><br></h5>
                   
                    <h5 style="text-align: justify;"> If you have an exciting startup idea but is at a crossroads on how to pursue it, IEDC TKMCE is here to guide you and help you realise your dream. Your ideas, plus our guidance can pave the way to your dream goals and to make this happen.
                        <br><br>
                        To capture this opportunity, all you have to do is share a glimpse of your idea in the link below and stir the judging panel with excitement later. All the registered teams will have an opportunity to present thier idea creatively in front of a panel that wants to support you. <br>
                        The shortlisted startup ideas will be incubated under IEDC, so we may nurture them into potential startups of the future.<br><br>*Only team leader need to submit this form.
                    </h5>
                </span>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="container mb-5">
        <div class="">
            <form action="<?= base_url() ?>pages/start_up_call" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="name">Name </label>
                        <input type="text" aria-required="true" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="email">Email</label>
                        <input type="email" aria-required="true" name="email" class="form-control" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="phone">Phone</label>
                        <input type="phone" name="phone_number" class="form-control" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="Year of study">Year of Study</label>
                        <select name="year" class="form-control" required>
                            <option>Select Year</option>
                            <option value="first-year">First Year</option>
                            <option value="second-year">Second Year</option>
                            <option value="third-year">Third Year</option>
                            <option value="fourth-year">Fourth Year</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="required" for="Branch">Select your Branch</label>
                        <select name="branch" class="form-control" required>
                            <option>Select Branch</option>
                            <option>Architecture</option>
                            <option>Chemical Engineering</option>
                            <option>Civil Engineering</option>
                            <option>Computer Science & Engineering</option>
                            <option>Electronics & Communication Engineering</option>
                            <option>Electrical & Electronics Engineering</option>
                            <option>Master of Computer Application</option>
                            <option>Mechanical Engineering</option>
                            <option>Mechanical Production</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required" for="Stage of your idea">Stage of your idea</label>
                        <select name="stage_of_idea" class="form-control" required>
                            <option>Select stage</option>
                            <option value="idea-only">Idea only</option>
                            <option value="formed-team">Has formed a team recently</option>
                            <option value="prototype">Developing prototype</option>
                            <option value="registred">Registred and looking for support</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="message">Problem Statement</label>
                    <textarea type="text" maxlength="600" name="problem" rows="2" class="form-control" placeholder="Problem Statement" required></textarea>
                </div>
                <div class="form-group">
                    <label for="message">Proposed solution</label>
                    <textarea type="text" name="solution" rows="5" class="form-control" placeholder="Proposed Solution (Upto 600 words)" required></textarea>
                </div>

                <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LfZF_EUAAAAANZ8kcPRhCXKepzq_RIOYd55Mob5"></div>
                <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Register</button>
            </form>
        </div>
    </div>
</div>