<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Events Participants</li>
        </ol>       
    </nav>




    <section class="mt-5">
        <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><?= $eventDetails->event_id?> - <?= $eventDetails->event_title?><button class="float-right  btn btn-danger font-weight-bold" disabled>ISSUE CERTIFICATE</button></h6>                       
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th class="pt-0">Sl No</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Phone</th>
                                        <th class="pt-0">College</th>
                                        <th class="pt-0">Year</th>
                                        <th class="pt-0">Branch</th>
                                        <th class="pt-0">Attendence</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($participants as $row) { ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['fullname'] ?></td>
                                        <td><?= $row['reg_email'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['college'] ?></td>
                                        <td><?= $row['course_duration_from'] ?> - <?= $row['course_duration_to'] ?></td>
                                        <td><?= $row['branch'] ?></td>
                                        <td><?= $row['is_attended'] ?></td>                                        
                                        
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