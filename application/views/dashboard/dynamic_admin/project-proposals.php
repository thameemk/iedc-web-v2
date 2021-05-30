<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Proposals</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
        <div class="row">
            <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('fail')) : ?>
                            <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Project Proposals</h6>
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
                                        <th class="pt-0">Sl No</th>
                                        <th class="pt-0">Time Stamp</th>
                                        <th class="pt-0">Reg Email</th>
                                        <th class="pt-0">Project ID</th>
                                        <th class="pt-0">Title</th>
                                        <th class="pt-0">Faculty recommend</th>
                                        <th class="pt-0">Team</th>
                                        <th class="pt-0">Summary</th>
                                        <th class="pt-0">Requirments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project_proposals as $row) { ?>
                                        <tr>
                                            <td><?= $row['sl_no'] ?></td>
                                            <td><?= $row['time_stamp'] ?></td>
                                            <td><?= $row['reg_email'] ?></td>
                                            <td><?= $row['project_id'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['faculty_recommend'] ?></td>
                                            <td><span class="btn btn-primary badge badge-primary" data-toggle="modal" onclick="getTeamDetails(this);" data-target="#exampleModal" id="<?= $row['project_id'] ?>">View</span></td>
                                            <td><span class="btn btn-primary badge badge-primary" data-toggle="modal" onclick="getProjectSummary(this);" data-target="#exampleModal" id="<?= $row['project_id'] ?>">View</span></td>
                                            <td><span class="btn btn-primary badge badge-primary" data-toggle="modal" onclick="getProjectRequirements(this);" data-target="#exampleModal" id="<?= $row['project_id'] ?>">View</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" onclick="clearData()" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-hover">
                                            <thead id="table_header" class="table_header">

                                            </thead>
                                            <tbody id="table_body" class="table_body">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button onclick="clearData()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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
<script type="text/javascript">
    function clearData() {
        var modalHtml = "";
        $("#table_body").html(modalHtml);
        $("#table_header").html(modalHtml);
    }

    function getTeamDetails(div) {
        var project_id = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>Admin/GetProjectTeamDetails/" + project_id,
            data: "",
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // launchpreloader();
            },
            complete: function() {
                //  stopPreloader();
            },
            success: function(result) {
                var array = JSON.parse(result);
                $(".table_body").html();
                $(".table_header").html();
                console.log(result);
                if (result != "null") {
                    $(".table_header").append("<tr><th>Name</th><th>Class</th><th>Contact Number</th></tr>");
                    $.each($.parseJSON(result), function(idx, obj) {
                        $(".table_body").append("<tr><td>" + obj.name + "</td><td>" + obj.class + "</td><td>" + obj.contact_no + "</td><tr>")
                    });
                }
            }
        });
    }

    function getProjectSummary(div) {
        var project_id = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>Admin/GetProjectSummary/" + project_id,
            data: "",
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // launchpreloader();
            },
            complete: function() {
                //  stopPreloader();
            },
            success: function(result) {
                var array = JSON.parse(result);
                $(".table_body").html();
                $(".table_header").html();
                console.log(result);
                if (result != "null") {
                    $(".table_header").append("<tr><th>Summary</th></tr>");
                    $.each($.parseJSON(result), function(idx, obj) {
                        $(".table_body").append("<p>" + obj.summary + "</p>")
                    });
                }
            }
        });
    }    

    function getProjectRequirements(div) {
        var project_id = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>Admin/getProjectRequirements/" + project_id,
            data: "",
            async: false,
            processData: false,
            contentType: false,
            beforeSend: function() {
                // launchpreloader();
            },
            complete: function() {
                //  stopPreloader();
            },
            success: function(result) {
                var array = JSON.parse(result);
                $(".table_body").html();
                $(".table_header").html();
                console.log(result);
                if (result != "null") {
                    $(".table_header").append("<tr><th>Requirement</th><th>Amount</th><th>Remarks</th></tr>");
                    $.each($.parseJSON(result), function(idx, obj) {
                        $(".table_body").append("<tr><td>" + obj.requirement + "</td><td>" + obj.amount + "</td><td>" + obj.remarks + "</td><tr>")
                    });
                }
            }
        });
    }
</script>