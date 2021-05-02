<div style="background: white;" id="slider" class="inspiro-slider" data-height="380">

    <div class="slide">
        <div class="container">
            <div class="slide-captions text-center text-dark">

                <h2><?=$eventDetails->event_title?></h2>

            </div>
        </div>
    </div>

</div>
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
    <center>
        <div class="portfolio-image">
            <img width="65%%" src="<?=base_url()?>assets/uploads/images/updates/<?=$eventDetails->img_link_public?>"
                alt="<?=$eventDetails->img_link_public?>">
        </div>
    </center>

    <div class="row mt-5">
        <p style="font-size:1.3em;">
            <?=$eventDetails->event_disc?>
            <br>
            <b>Registration Fee :</b>  <b><?=$eventDetails->event_fee?></b>
            <br>
            <b>Date :</b> <?=$eventDetails->event_date?>
            <br>
            <b>Time :</b> <?=$eventDetails->event_time?>
            <br>
            <b>Venue :</b> <?=$eventDetails->event_venue?>
            <br>
            <b>Contact 1 : </b> <a href="tel:<?=$eventDetails->contact_1_num?>"><?=$eventDetails->contact_1_name?> :
                <?=$eventDetails->contact_1_num?></a>
            <br>
            <b>Contact 2 : </b><a href="tel:<?=$eventDetails->contact_2_num?>"><?=$eventDetails->contact_2_name?> :
                <?=$eventDetails->contact_2_num?></a>
        </p>
    </div>
    <center>
        <?php if ($this->session->userdata('sess_logged_in') == 0) { ?>
        <a class="btn btn-success" href="<?php echo $loginURL ?>">Login to Register</a>
        <?php } else { ?>
        <?php if($eventDetails->need_registration==1) { ?>
        <?php if($eventDetails->is_reg_open==1) { ?>
        <button data-toggle="modal" data-target="#exampleModal" id=" <?=$eventDetails->event_id?>"
            class="btn btn-success">Register Now</button>
        <?php }else { ?>
        <button class="btn btn-danger">Register Closed</button>
        <?php }}} ?>
    </center>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title event_title">Are you sure ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Are you sure want to register for the <?=$eventDetails->event_title?> ?</b></p>
                    <p style="color:red"><b>Note : alert_meesage</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="<?= base_url() ?>user/event_registration" method="post">
                        <input name="event_id" type="hidden" value="<?=$eventDetails->event_id?>">
                        <button type='submit' class='btn btn-primary'>Register Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>