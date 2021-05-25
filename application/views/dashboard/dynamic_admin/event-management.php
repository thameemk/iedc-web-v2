<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Events Management</li>
        </ol>
    </nav>




    <section class="mt-5">
        <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h6 class="card-title">Event Management<button class="float-right  btn btn-danger font-weight-primary" disabled>ADD EVENT</button></h6>                       
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th class="pt-0">Event ID</th>
                                        <th class="pt-0">Event Name</th>
                                        <th class="pt-0">Edit</th>
                                        <th class="pt-0">Certificate</th>
                                        <th class="pt-0">Participants</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($allevents as $row) { ?>
                                    <tr>
                                        <td><?= $row['event_id'] ?></td>
                                        <td><?= $row['event_title'] ?></td>
                                        <td><a href="<?=base_url()?>admin/editevent/<?= $row['event_id'] ?>">Edit Event</a></td>
                                        <td><a href="<?=base_url()?>admin/upload-certificate/<?= $row['event_id'] ?>">Upload Certificate</a></td>
                                        <td><a href="<?=base_url()?>admin/event-participants/<?= $row['event_id'] ?>">View Participants</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <h5 style="color:red">You are not authorized to access this page</h5>
        <?php } ?>
    </section>
</div>