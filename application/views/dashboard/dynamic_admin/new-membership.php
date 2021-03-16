<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">New Membership</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
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
                                <h6 class="card-title mb-0">New Membership</h6>
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
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['phone_number'] ?></td>
                                                <td><?= $row['admission_number'] ?></td>
                                                <td><?= $row['year'] ?></td>
                                                <td><?= $row['branch'] ?></td>
                                                <td><?= $row['transaction_id'] ?></td>
                                                <td>
                                                    <?php if ($row['is_verified'] == 0) { ?>
                                                        <div class="<?= $row['reg_id'] ?>">
                                                            <button id="<?= $row['reg_id'] ?>" class="delbutton badge badge-danger">VERIFY(IF PAID)</button>
                                                        </div>
                                                    <?php } else if ($row['is_verified'] == 1) { ?>
                                                        <span class="badge badge-success">VERIFIED</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">NA</span>
                                                    <?php } ?>
                                                </td>
                                                <?php $custom_class="cus";?>
                                                <td><span class="<?= $row['reg_id'].$custom_class ?>"><?= $row['verified_user'] ?></span></td>
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