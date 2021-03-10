<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Server Access Requests</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if ($this->session->userdata('user_type') == 'S' || $this->session->userdata('user_type') == 'U') { ?>
            <div class="row">
                <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                    <div class="card">
                        <div class="card-body">                           
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Server Access Requests</h6>
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
                                            <th class="pt-0">time_stamp</th>
                                            <th class="pt-0">user_email</th>
                                            <th class="pt-0">name</th>
                                            <th class="pt-0">admission_number</th>
                                            <th class="pt-0">branch</th>
                                            <th class="pt-0">phone</th>
                                            <th class="pt-0">title</th>
                                            <th class="pt-0">domain</th>
                                            <th class="pt-0">duration</th>  
                                            <th class="pt-0">technology</th>
                                            <th class="pt-0">purpose</th>                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($server_access as $row) { ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['time_stamp'] ?></td>
                                                <td><?= $row['user_email'] ?></td>
                                                <td><?= $row['fullname'] ?></td>
                                                <td><?= $row['admission_number'] ?></td>
                                                <td><?= $row['branch'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><?= $row['title'] ?></td>
                                                <td><?= $row['domain'] ?></td>
                                                <td><?= $row['duration'] ?></td>     
                                                <td><?= $row['tech_or_lang'] ?></td>
                                                <td><?= $row['purpose'] ?></td>                                              
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

<script type="text/javascript">
    $(function() {

        $(".delbutton").click(function() {
            var del_id = $(this).attr("id");
            if (confirm("Sure you want to Verify this?.")) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>admin/verify_membership_reg/" + del_id,
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
                         console.log(result);
                        if (result['status'] == true) {                           
                            var modalHtml = "";
                            $("#" + del_id).html(modalHtml);
                            $("." + del_id).html();
                            $("." + del_id).append('<span class="badge badge-success">VERIFIED</span>');
                            $("." + del_id+"cus").append(result['session_user']);
                        } else {
                            alert("Some error has been occurred !!");
                        }
                    }
                });
            }
            return false;
        });
    });
</script>