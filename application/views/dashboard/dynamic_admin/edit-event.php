<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Event - <?=$eventDetails->event_id?> - <?=$eventDetails->event_title?> </li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <?php if ($this->session->flashdata('fail')) : ?>
                            <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                        <?php endif; ?>
                        <div class="card-body">
                            <h6 class="card-title">Edit EVENT - <?=$eventDetails->event_id?> - <?=$eventDetails->event_title?></h6>
                            <form class="forms-sample" action="<?= base_url() ?>admin/edit_event" method="post">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Event Title</label>
                                    <input name="event_title" type="text" class="form-control" name="event_title" id="exampleInputUsername1" value="<?=$eventDetails->event_title?>" autocomplete="off" placeholder="Title" />
                                </div>

                                <div class="row">
                                    <div class="col-md-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Event Description</h4>
                                                <textarea name="event_desc" class="form-control" name="tinymce" id="simpleMdeExample" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <!-- Is Public-->
                                <div class="radio-group">
                                    <label>Is this Public : </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_public" id="optionsRadios0" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_public" id="optionsRadios01" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Event Image-->
                                <div class="form-group">
                                    <label>Image Link (My Events)</label>
                                    <input type="text" name="image_link_reg" class="form-control" placeholder="Type the myevents imagege link here" required />
                                </div>

                                <!-- Event Date-->
                                <div class="form-group">
                                    <label>Event Date</label>
                                    <input type="text" class="form-control" name="event_date" id="exampleEventDate1" placeholder="dd/mm/yyyy" />
                                </div>

                                <!-- Event Time-->
                                <div class="form-group">
                                    <label>Event Time</label>
                                    <input type="Text" class="form-control" name="event_time" autocomplete="off" placeholder="H:M PM/AM" />
                                </div>

                                <!-- Event Venue-->
                                <div class="form-group">
                                    <label>Event Venue</label>
                                    <input type="text" class="form-control" name="event_venue" autocomplete="off" placeholder="Venue" />
                                </div>

                                <!-- Event Name1-->
                                <div class="form-group">
                                    <label>Contact Name 1</label>
                                    <input type="text" class="form-control" name="contact_1_name" autocomplete="off" placeholder="Name" />
                                </div>

                                <!-- Event Nuumber1-->
                                <div class="form-group">
                                    <label>contact number 1</label>
                                    <input type="text" class="form-control" name="contact_1_num" autocomplete="off" placeholder="Number" />
                                </div>

                                <!-- Event Name2-->
                                <div class="form-group">
                                    <label>Contact Name 2</label>
                                    <input type="text" class="form-control" name="contact_2_name" autocomplete="off" placeholder="Name" />
                                </div>

                                <!-- Event Nmuber2-->
                                <div class="form-group">
                                    <label>Contact Number 2</label>
                                    <input type="text" class="form-control" name="contact_2_num" autocomplete="off" placeholder="Number" />
                                </div>

                                <!-- Event Link-->
                                <div class="form-group">
                                    <label>Event Link (iedctkmce.com/events/{abc-def}) Pleas type the {abc-def} here </label>
                                    <input type="text" class="form-control" name="event_link" autocomplete="off" placeholder="Link" />
                                </div>

                                <!-- Event Fee-->
                                <div class="form-group">
                                    <label>Event Fee</label>
                                    <input type="text" class="form-control" name="event_fee" autocomplete="off" placeholder="Fee" />
                                </div>

                                <!-- Event Members-->
                                <div class="form-group">
                                    <label>Max Members</label>
                                    <input type="Number" class="form-control" name="max_members" autocomplete="off" placeholder="Members" />
                                </div>

                                <!-- Is Iedc Member-->
                                <div class="radio-group">
                                    <label>Is the event only for Iedc Member : </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_iedc_member" id="optionsRadios1" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_iedc_member" id="optionsRadios2" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Is Registration Open-->
                                <div class="radio-group">
                                    <label>Is the event need registration
                                    </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="need_registration" id="optionsRadios3" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="need_registration" id="optionsRadios4" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>


                                <!-- Is Registration Open-->
                                <div class="radio-group">
                                    <label>Enable registration now :
                                    </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_reg_open" id="optionsRadios3" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_reg_open" id="optionsRadios4" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>


                                <!-- Is File Submission-->
                                <div class="radio-group">
                                    <label>Is there any File Submission : </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_file_submission" id="optionsRadios7" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_file_submission" id="optionsRadios8" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Is Team-->
                                <div class="radio-group">
                                    <label>Is this a Team event : </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_team" id="optionsRadios9" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_team" id="optionsRadios10" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>

                                <!-- Is Payment Id-->
                                <div class="radio-group">
                                    <label>Enable payment id field (If the event has payment then Enable this) : </label>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_payment_id" id="optionsRadios11" value="1" />
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="is_payment_id" id="optionsRadios12" value="0" />
                                            No
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <h5 style="color:red">You are not authorized to access this page</h5>
        <?php } ?>
    </section>
</div>