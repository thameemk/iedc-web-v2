<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Schedule meeting</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
            <div class="row">
                <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                    <div class="card">
                        <div class="card-body">                           
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Schedule meeting</h6>
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
                                            <th class="pt-0">id</th>
                                            <th class="pt-0">timeStamp</th>
                                            <th class="pt-0">user_email</th> 
                                            <th class="pt-0">name</th>      
                                            <th class="pt-0">date</th>
                                            <th class="pt-0">time</th>
                                            <th class="pt-0">phone	</th>
                                            <th class="pt-0">meeting_agenda</th>
                                            <th class="pt-0">attendees</th> 
                                            <th class="pt-0">description</th>                                                                                                                                                                                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($schedule_meeting as $row) { ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['timeStamp'] ?></td>
                                                <td><?= $row['user_email'] ?></td> 
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['date'] ?></td>
                                                <td><?= $row['time'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><?= $row['meeting_agenda'] ?></td>  
                                                <td><?= $row['attendees'] ?></td>
                                                <td><?= $row['description'] ?></td>                                                                                                                                                                                        
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
