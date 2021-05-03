<div style="background: white;" id="slider" class="inspiro-slider" data-height="380">

    <div class="slide">
        <div class="container">
            <div class="slide-captions text-center text-dark">

                <h2 class="text-uppercase">verify certificate</h2>

            </div>
        </div>
    </div>

</div>
<section>
    <div class="container">
        <center>
            <h3 class="mb-5 text-uppercase">verify certificate</h3>
            <div class="m-t-30">
                <?php if($this->session->flashdata('fail')): ?>
                <div class="alert alert-danger" role="alert">
                    <center><?php echo $this->session->flashdata('fail'); ?></center>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('success')): ?>

                <div class="alert alert-success" role="alert">
                    <center>
                        Certificate found!! Please find the details below.
                    </center>
                </div>
                <b>
                    <?php $data = json_decode($this->session->flashdata('success'));?>
                    Certificate No: <?=$data->cert_num?>
                    <br>
                    Name : <?=$data->fullname?>
                    <br>
                    Event : <?=$data->event_title?>
                    <br>
                    College : <?=$data->college?>
                </b>
                <?php endif; ?>
                <form action="<?=base_url()?>pages/verify_certificate" method="post">

                    <div class="form-group col-md-6">                       
                        <input type="text" aria-required="true" name="cert_no" class="form-control"
                            placeholder="Enter certificate number" required>
                    </div>

                    <div class="g-recaptcha" name="g-recaptcha-response"
                        data-sitekey="6LfZF_EUAAAAANZ8kcPRhCXKepzq_RIOYd55Mob5"></div>
                    <button class="btn" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Verify
                        certificate</button>
                </form>
            </div>
        </center>
    </div>
</section>