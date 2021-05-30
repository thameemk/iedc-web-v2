<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pre incubation requests</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
            <div class="row">
                <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                    <div class="card">
                        <div class="card-body">                           
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Pre incubation requests</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table table-hover mb-0">
                                    <thead>
                                        <tr>                                           
                                            <th class="pt-0">time_stamp</th>
                                            <th class="pt-0">reg_id</th>
                                            <th class="pt-0">company_name</th>      
                                            <th class="pt-0">reg_email</th>
                                            <th class="pt-0">reg_name</th>
                                            <th class="pt-0">admission_number</th>
                                            <th class="pt-0">branch</th>
                                            <th class="pt-0">phone</th>
                                            <th class="pt-0">team</th>
                                            <th class="pt-0">data</th>                                                                                                                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pre_incubation as $row) { ?>
                                            <tr>
                                                <td><?= $row['time_stamp'] ?></td>
                                                <td><?= $row['reg_id'] ?></td>
                                                <td><?= $row['company_name'] ?></td> 
                                                <td><?= $row['reg_email'] ?></td>
                                                <td><?= $row['fullname'] ?></td>
                                                <td><?= $row['admission_number'] ?></td>
                                                <td><?= $row['branch'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                    
                                                <td> 
                                                    <form action="<?= base_url() ?>Admin/download_incubation_team_details/" method="post">
                                                        <input type="hidden" name="reg_id" value="<?=$row['reg_id']?>"></input>                                   
                                                        <button  type="submit" class="delbutton badge badge-success">DOWNLOAD</button>
                                                    </form>
                                                </td>      
                                                <td> 
                                                    <form action="<?= base_url() ?>Admin/download_incubation_data/" method="post">
                                                        <input type="hidden" name="reg_id" value="<?=$row['reg_id']?>"></input>                                   
                                                        <button  type="submit" class="delbutton badge badge-success">DOWNLOAD</button>
                                                    </form>
                                                </td>                                                                                             
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
