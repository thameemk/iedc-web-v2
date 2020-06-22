<div class="page-content">

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <?php foreach ($userinfo as $row) { ?>
        <h4 class="mb-3 mb-md-0">Welcome <?= $row['fullname'] ?></h4>
      <?php } ?>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
        <span class="input-group-addon bg-transparent">
          <i data-feather="calendar" class=" text-primary"></i>
        </span>
        <input type="text" class="form-control" disabled>
      </div>
      <a href="<?= base_url() ?>user/dashboard/profile">
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
          <i class="btn-icon-prepend" data-feather="user"></i> Your Profile
        </button>
      </a>
    </div>
  </div>
  <div class="example">
    <div class="row">
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-primary">
          <a href="<?= base_url() ?>user/dashboard/maker-library">
            <h5 class="card-header text-white">Maker Library</h5>
            <div class="card-body">
              <p class="card-text text-white">Book your components virtually.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-warning">
          <a href="<?= base_url() ?>user/dashboard/server-access">
            <h5 class="card-header text-white">Server access</h5>
            <div class="card-body">
              <p class="card-text text-white">Host your website free and boost your startup</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-success">
          <a href="<?= base_url() ?>user/dashboard/project-proposal">
            <h5 class="card-header text-white">Project Proposal</h5>
            <div class="card-body">
              <p class="card-text text-white">Submit your project proposals online. </p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-dark">
          <a href="<?= base_url() ?>user/dashboard/schedule-meeting">
            <h5 class="card-header text-white">Schedule Meeting</h5>
            <div class="card-body">
              <p class="card-text text-white">Digitalise all your meetings with a personalised calendar.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-danger">
          <a href="<?= base_url() ?>user/dashboard/incubation-application">
            <h5 class="card-header text-white">Pre Incubation</h5>
            <div class="card-body">
              <p class="card-text text-white">Start on the right path with our expert opinion.</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 col-md-6 grid-margin">
        <div class="card text-white bg-secondary">
          <a href="<?= base_url() ?>user/dashboard/business-model">
            <h5 class="card-header text-white">Business Model</h5>
            <div class="card-body">
              <p class="card-text text-white">Submit your model for evaluation from our expert mentor pool.</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

</div>