<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Server Access</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <?php if ($this->session->flashdata('fail')) : ?>
                    <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                <?php endif; ?>
                <div class="card-body">
                    <h6 class="card-title">Server Accsess</h6>
                    <form class="forms-sample" method="post" action="<?= base_url("user/server_accsess_post") ?>">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Website Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="date" placeholder="Website Title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Domain Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="domain" placeholder="Your domain name.(if any)" rows="5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Duration</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="duration" rows="5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Purpose</label>
                            <textarea type="text" class="form-control" name="purpose" autocomplete="off" placeholder="Purpose of your website" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Technologies/Languages</label>
                            <textarea class="form-control" name="tech_or_lang" rows="5" placeholder="Technologies or Languages usd to build your website" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>