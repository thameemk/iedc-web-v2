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

<section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/dare2develop.png">
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="mb-3 mt-5">
                <span class="smalldesc">
                    <h5 align="justify" class="custom-para"><span class="first-letter text-bold">T</span>he voice of innovation and passion that lies dormant in us is brought to life through Dare2Develop, your dose of inspiring tales of people who have made it big in all things entrepreneurial. Made by IEDC TKMCE, this podcast is the perfect blend of fun and facts in each scintillating episode. Join us on this journey as we unravel the how's and why's of being a successful entrepreneur.
                    </h5>
                    <br>
                    <h5>
                        Stay tuned to have some fun.
                    </h5>
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
                        <label class="required" for="admission_number">TKMCE Admission Number</label>
                        <input type="number" aria-required="true" name="admission_number" class="form-control" placeholder="Enter admission number" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="Year of study">Year of Study</label>
                        <select name="year" class="form-control" required>
                            <option>Second Year</option>
                            <option>Third Year</option>
                            <option>Fourth Year</option>
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
                            <option>Mechanical Production</option>
                        </select>
                    </div>

                    <!-- <div class="form-group  col-md-6">

                    </div>
                    <div class="form-group  col-md-6">

                    </div>

                    <div class="form-group  col-md-12">

                    </div> -->

                </div>
                <div class="g-recaptcha" name="g-recaptcha-response" data-sitekey="6LfZF_EUAAAAANZ8kcPRhCXKepzq_RIOYd55Mob5"></div>
                <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Register</button>
            </form>
        </div>
    </div>
</div>