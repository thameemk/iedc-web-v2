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
        Certificate Issued: <?php if ($eventDetails->is_cert_published == 1) { ?> Yes <?php } else { ?> No <?php } ?><br>
        Uploaded Template (PARTICIPATION/VOLUNTEERING) : <a href="<?= base_url() ?>assets/uploads/cert/<?= $eventDetails->cert_file_0 ?>" target="_blank"><?= $eventDetails->cert_file_0 ?></a><br>
        Uploaded Template (MERIT) : <a href="<?= base_url() ?>assets/uploads/cert/<?= $eventDetails->cert_file_1 ?>" target="_blank"><?= $eventDetails->cert_file_1 ?></a>
    </section>
    <?php if ($eventDetails->is_cert_published == 0) { ?>
        <?php if ($this->session->userdata('user_type') == 'super_admin') { ?>
            <form action="<?= base_url() ?>superAdmin/issue_cert" method="post" ?>
                <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>" ?>
                <input type="hidden" name="cet_status" value="0" ?>
                <button type="submit" class="btn btn-success font-weight-bold">ISSUE
                    CERTIFICATE</button>
            </form>
        <?php } else { ?>
            <button class="btn btn-danger font-weight-bold" disabled>ISSUE
                CERTIFICATE</button>
        <?php } ?>
    <?php } else if ($eventDetails->is_cert_published == 1) { ?>
        <form action="<?= base_url() ?>superAdmin/issue_cert" method="post" ?>
            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>" ?>
            <input type="hidden" name="cet_status" value="1" ?>
            <button type="submit" class="btn btn-warning font-weight-bold">DISABLE
                CERTIFICATE</button>
        </form>
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
                        <h6 class="card-title">PARTICIPATION/VOLUNTEERING CERTIFICATE</h6>
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
                        <h6 class="card-title">MERIT (1&2) CERTIFICATE</h6>
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
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">PARTICIPATION/VOLUNTEERING CERTIFICATE - POSITION</h6>
                        <form class="forms-sample" action="<?= base_url() ?>superAdmin/update_cert_position" method="post">
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="mb-1 form-control" name="name_x" placeholder="name position x" value="<?= $eventDetails->cert_file_0_name_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="name_y" placeholder="name position y" value="<?= $eventDetails->cert_file_0_name_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">college</label>
                                <input type="text" class="mb-1 form-control" name="college_x" placeholder="college position x" value="<?= $eventDetails->cert_file_0_college_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="college_y" placeholder="college position y" value="<?= $eventDetails->cert_file_0_college_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">qr code</label>
                                <input type="text" class="mb-1 form-control" name="qr_x" placeholder="qr position x" value="<?= $eventDetails->cert_file_0_qr_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="qr_y" placeholder="qr position y" value="<?= $eventDetails->cert_file_0_qr_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">certificate no</label>
                                <input type="text" class="mb-1 form-control" name="no_x" placeholder="no position x" value="<?= $eventDetails->cert_file_0_no_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="no_y" placeholder="no position y" value="<?= $eventDetails->cert_file_0_no_y ?>" required>
                            </div>
                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <input type="hidden" name="cert_type" value="0">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">MERIT (1&2) CERTIFICATE - POSITION</h6>
                        <form class="forms-sample" action="<?= base_url() ?>superAdmin/update_cert_position" method="post">
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="mb-1 form-control" name="name_x" placeholder="name position x" value="<?= $eventDetails->cert_file_1_name_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="name_y" placeholder="name position y" value="<?= $eventDetails->cert_file_1_name_y ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="name">college</label>
                                <input type="text" class="mb-1 form-control" name="college_x" placeholder="college position x" value="<?= $eventDetails->cert_file_1_college_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="college_y" placeholder="college position y" value="<?= $eventDetails->cert_file_1_college_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">qr code</label>
                                <input type="text" class="mb-1 form-control" name="qr_x" placeholder="qr position x" value="<?= $eventDetails->cert_file_1_qr_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="qr_y" placeholder="qr position y" value="<?= $eventDetails->cert_file_1_qr_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">certificate no</label>
                                <input type="text" class="mb-1 form-control" name="no_x" placeholder="no position x" value="<?= $eventDetails->cert_file_1_no_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="no_y" placeholder="no position y" value="<?= $eventDetails->cert_file_1_no_y ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">merit (first/second)</label>
                                <input type="text" class="mb-1 form-control" name="merit_x" placeholder="merit position x" value="<?= $eventDetails->cert_file_1_merit_x ?>" required>
                                <input type="text" class="mb-1 form-control" name="merit_y" placeholder="merit position y" value="<?= $eventDetails->cert_file_1_merit_y ?>" required>
                            </div>
                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <input type="hidden" name="cert_type" value="1">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">FONT & QR</h6>
                        <form class="forms-sample" action="<?= base_url() ?>superAdmin/update_cert_font" method="post">
                            <div class="form-group">
                                <label for="color">color</label>
                                <input type="text" class="mb-1 form-control" name="cert_font_color" placeholder="cert_font_color" value="<?= $eventDetails->cert_font_color ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="color">name font size</label>
                                <input type="text" class="mb-1 form-control" name="cert_name_font_size" placeholder="cert_name_font_size" value="<?= $eventDetails->cert_name_font_size ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="color">college font size</label>
                                <input type="text" class="mb-1 form-control" name="cert_college_font_size" placeholder="cert_college_font_size" value="<?= $eventDetails->cert_college_font_size ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="color">merit font size</label>
                                <input type="text" class="mb-1 form-control" name="cert_merit_font_size" placeholder="cert_merit_font_size" value="<?= $eventDetails->cert_merit_font_size ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="color">no font size</label>
                                <input type="text" class="mb-1 form-control" name="cert_no_font_size" placeholder="cert_no_font_size" value="<?= $eventDetails->cert_no_font_size ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="color">qr size</label>
                                <input type="text" class="mb-1 form-control" name="cert_qr_size" placeholder="cert_no_font_size" value="<?= $eventDetails->cert_qr_size ?>" required>
                            </div>

                            <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <h5 style="color:red">You are not authorized to access this page</h5>
    <?php } ?>

</div>