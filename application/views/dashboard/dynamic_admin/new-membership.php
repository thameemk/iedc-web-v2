<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Membership</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if($this->session->userdata('user_type')=='S' ||$this->session->userdata('user_type')=='U') {?>
        <div class="row">
            <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('fail')) : ?>
                        <span style="line-height:3"
                            class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                        <span style="line-height:3"
                            class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">New Membership</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">Reg ID</th>
                                        <th class="pt-0">Time Stamp</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Phone Number</th>
                                        <th class="pt-0">Admission Number</th>
                                        <th class="pt-0">Year</th>
                                        <th class="pt-0">Branch</th>
                                        <th class="pt-0">Transaction ID</th>
                                        <th class="pt-0">Payment Status</th>
                                        <th class="pt-0">Verified User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($new_members as $row) { ?>
                                    <tr>
                                        <td><?= $row['reg_id'] ?></td>
                                        <td><?= $row['timestamp'] ?></td>
                                        <td><?= $row['timestamp'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['phone_number'] ?></td>
                                        <td><?= $row['admission_number'] ?></td>
                                        <td><?= $row['year'] ?></td>
                                        <td><?= $row['branch'] ?></td>
                                        <td><?= $row['transaction_id'] ?></td>
                                        <td><?= $row['is_verified'] ?></td>    
                                        <td><?= $row['verified_user'] ?></td>                                       
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
