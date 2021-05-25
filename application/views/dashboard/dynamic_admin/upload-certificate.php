<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Issue Certificate</li>
        </ol>
    </nav>
    <section class="mt-4">
        <h4>Event Details</h4>
        Event Id: <?= $eventDetails->event_id ?><br>
        Title: <?= $eventDetails->event_title ?><br>
        Certificate Issued: <?php if ($eventDetails->is_cert_published == 1) { ?> Yes <?php } else { ?> No <?php } ?>
    </section>
    <?php if ($eventDetails->is_cert_published == 0) { ?>
        <?php if ($this->session->userdata('user_type') == 'super_admin') { ?>
            <form action="<?= base_url() ?>superAdmin/issue_cert" method="post" ?>
                <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>" ?>
                <button type="submit" class="btn btn-success font-weight-bold">ISSUE
                    CERTIFICATE</button>
            </form>
        <?php } else { ?>
            <button class="float-right  btn btn-danger font-weight-bold" disabled>ISSUE
                CERTIFICATE</button>
        <?php } ?>
    <?php } else { ?>
        <button class="float-right  btn btn-success font-weight-bold" disabled>
            CERTIFICATE ISSUED</button>
    <?php } ?>
    <?php if ($this->session->userdata('user_type') == 'super_admin') { ?>
        <div class="row col-md-12 grid-margin stretch-card card">
            <?php if ($this->session->flashdata('fail')) : ?>
                <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')) : ?>
                <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">PARTICIPATION CERTIFICATE</h6>
                        <?php echo form_open_multipart('superAdmin/upload_cert'); ?>
                        <!-- <form class="forms-sample" action="<?= base_url() ?>superAdmin/upload_cert" method="post"> -->
                        <div class="form-group">
                            <label for="exampleInputUsername1">select png file</label>
                            <input type="file" class="form-control" name="userfile">
                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <input type="hidden" name="cert_type" value="0">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">FIRST CERTIFICATE</h6>
                        <?php echo form_open_multipart('superAdmin/upload_cert'); ?>
                        <!-- <form class="forms-sample" action="<?= base_url() ?>superAdmin/upload_cert" method="post"> -->
                        <div class="form-group">
                            <label for="exampleInputUsername1">select png file</label>
                            <input type="file" class="form-control" name="userfile">
                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <input type="hidden" name="cert_type" value="1">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">SECOND CERTIFICATE</h6>
                        <?php echo form_open_multipart('superAdmin/upload_cert'); ?>
                        <!-- <form class="forms-sample" action="<?= base_url() ?>superAdmin/upload_cert" method="post"> -->
                        <div class="form-group">
                            <label for="exampleInputUsername1">select png file</label>
                            <input type="file" class="form-control" name="userfile">
                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <input type="hidden" name="cert_type" value="2">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h5 style="color:red">You are not authorized to access this page</h5>
    <?php } ?>

</div>