<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Schedule a meeting</li>
        </ol>
    </nav>

    <div class="row">
        <?php if($user_type == true){ ?>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <?php if($this->session->flashdata('fail')): ?>
                <span style="line-height:3"
                    class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                <?php endif; ?>
                <?php if($this->session->flashdata('success')): ?>
                <span style="line-height:3"
                    class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                <?php endif; ?>
                <div class="card-body">
                    <h6 class="card-title">Schedule a meeting</h6>
                    <form class="forms-sample" method="post" action="<?=base_url("member/schedule_meeting_post")?>">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date" id="date" placeholder="Date"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Time</label>
                            <div class="col-sm-9">
                                <input type="time" class="form-control" name="time" id="time" autocomplete="off"
                                    placeholder="Time" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="Mobile number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Meeting Agenda</label>
                            <textarea class="form-control" name="meeting_agenda" id="meeting_agenda" rows="5"
                                required></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Attendees</label>
                            <textarea class="form-control" name="attendees" id="attendees" rows="5" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="5"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }else { ?>
    <h5 style="color:red">You are not authorized to access this page.<br> Please join IEDC to avail this feature</h5>
    <?php } ?>