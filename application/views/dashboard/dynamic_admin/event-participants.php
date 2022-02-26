<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Events Participants</li>
        </ol>
        <section class="mt-4">
            <form action="<?= base_url() ?>Admin/download_event_reg" method="post" ?>
                <input type="hidden" name="event_id" value="<?= $eventDetails->event_id ?>" ?>
                <button type="submit" class="btn btn-warning font-weight-bold">DOWNLOAD
                    REGISTRATION DETAILS</button>
            </form>
            <?php if ($eventDetails->is_team == 1) { ?>
                <br>Total Teams: <?php print_r($this->admin_model->get_total_team_registred($eventDetails->event_id)); ?>
            <?php } ?>
        </section>
    </nav>




    <section class="mt-5">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <?php if ($this->session->flashdata('fail')) : ?>
                    <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                    <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                <?php endif; ?>
                <div class="card-body">
                    <?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
                        <div class="row">
                            <h6 class="card-title"><?= $eventDetails->event_id ?> - <?= $eventDetails->event_title ?>
                            </h6>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0">Sl No</th>
                                            <th class="pt-0">Name</th>
                                            <?php if ($eventDetails->is_team == 1) { ?>
                                                <th class="pt-0">Team Lead</th>
                                            <?php } ?>
                                            <th class="pt-0">Email</th>
                                            <th class="pt-0">Phone</th>
                                            <?php if ($eventDetails->is_file_submission == 1) { ?>
                                                <th class="pt-0">File Link</th>
                                            <?php } ?>
                                            <th class="pt-0">IEDC Member</th>
                                            <?php if ($eventDetails->is_payment_id == 1) { ?>
                                                <th class="pt-0">Payment ID <br> Status</th>

                                            <?php } ?>
                                            <th class="pt-0">College</th>
                                            <th class="pt-0">Year</th>
                                            <th class="pt-0">Branch</th>
                                            <th class="pt-0">Attendence</th>
                                            <th class="pt-0">CERT NO</th>
                                            <th class="pt-0">Added By</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($participants as $row) { ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['fullname'] ?></td>
                                                <?php if ($eventDetails->is_team == 1) { ?>
                                                    <td><?= $row['team_lead_email'] ?></td>
                                                <?php } ?>
                                                <td><?= $row['reg_email'] ?></td>
                                                <td><?= $row['phone'] ?></td>
                                                <?php if ($eventDetails->is_file_submission == 1) { ?>
                                                    <td><a href="<?= $row['file_link'] ?>" target="blank">View</a></td>
                                                <?php } ?>
                                                <?php if ($this->admin_model->is_iedc_member($row['reg_email']) == true) { ?>
                                                    <td><span class="badge badge-success">YES</span></td>
                                                <?php } else { ?>
                                                    <td><span class="badge badge-danger">NO</span></td>
                                                <?php } ?>
                                                <?php if ($eventDetails->is_payment_id == 1) { ?>
                                                    <td>
                                                        <?= $row['payment_id'] ?><br>
                                                        <?php if ($row['is_payment_verified'] == 1) { ?>
                                                            VERIFIED BY <br>
                                                            <span><?= $row['payment_verified_user'] ?> </span>
                                                        <?php } else { ?>
                                                            <?php $cus = 'cus' ?>
                                                            <div class="<?= $row['id'] . $cus ?>">
                                                                <button id="<?= $row['id'] ?>" class="verifybutton badge badge-danger">VERIFY</button>
                                                            </div>
                                                        <?php } ?>
                                                    </td>

                                                <?php } ?>
                                                <td><?= $row['college'] ?></td>
                                                <td><?= $row['course_duration_from'] ?> - <?= $row['course_duration_to'] ?></td>
                                                <td><?= $row['branch'] ?></td>

                                                <td>

                                                    <?php if ($row['is_attended'] == 1) { ?>
                                                        <span class="badge badge-primary">PRSENT</span>
                                                    <?php } else if ($row['is_attended'] == 101) { ?>
                                                        <span class="badge badge-success">FIRST</span>
                                                    <?php } else if ($row['is_attended'] == 102) { ?>
                                                        <span class="badge badge-warning">SECOND</span>
                                                    <?php } else if ($row['is_attended'] == NULL) { ?>
                                                        <?php if ($eventDetails->is_cert_published == 0) { ?>
                                                            <div class="<?= $row['id'] ?>">
                                                                <button class="domarkatnds btn btn-primary" id="<?= $row['id'] ?>">Mark
                                                                    Attendence</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <button class="btn btn-warning">Not Allowed</button>
                                                        <?php }  ?>
                                                    <?php } else if ($row['is_attended'] == 0) { ?>
                                                        <span class="badge badge-danger">ABSENT</span>
                                                    <?php } ?>

                                                </td>
                                                <td><?= $row['cert_num'] ?></td>
                                                <td><?= $row['added_by'] ?></td>
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

<script>
    $(function() {
        $(".domarkatnds").click(function() {
            var participant_id = $(this).attr("id");
            Swal.fire({
                title: 'You cant change it later. Are you sure ?',
                showConfirmButton: false,
                showCloseButton: false,
                html: `
                <div>
                <button class="btn btn-info" onclick="onBtnClicked('Present',` + participant_id + `)">Present</button>
                <button class="btn btn-success" onclick="onBtnClicked('First',` + participant_id + `)">First</button>
                <button class="btn btn-primary" onclick="onBtnClicked('Second',` + participant_id + `)">Second</button>         
                <button class="btn btn-warning" onclick="onBtnClicked('Absent',` + participant_id + `)">Absent</button>
                <button class="btn btn-danger" onclick="onBtnClicked('cancel')">Cancel</button>
                </div>`
            });
        });
    });

    $(".verifybutton").click(function() {
        var participant_reg_id = $(this).attr("id");
        if (confirm("Sure you want to Verify this?.")) {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>admin/verify_event_fee_payment/" + participant_reg_id,
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
                        $("#" + participant_reg_id).html(modalHtml);
                        $("." + participant_reg_id).html();
                        $("." + participant_reg_id + "cus").append('VERIFIED BY <br>' + result['session_user']);
                    } else {
                        alert("Some error has been occurred !!");
                    }
                }
            });
        }
        return false;
    });


    function onBtnClicked(btnId, participant_id) {
        Swal.close();
        console.log(participant_id);
        if (btnId == "Present") {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>admin/mark_attendence/" + participant_id + "/1",
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
                        $("#" + participant_id).html(modalHtml);
                        $("." + participant_id).html(modalHtml);
                        $("." + participant_id).append(
                            '<span class="badge badge-success">PRSENT</span>'
                        );
                        Swal.fire('Marked as present!', '', 'success')
                    } else {
                        alert("Some error has been occurred !!");
                    }
                }
            });
        } else if (btnId == "Absent") {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>admin/mark_attendence/" + participant_id + "/0",
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
                        $("#" + participant_id).html(modalHtml);
                        $("." + participant_id).html(modalHtml);
                        $("." + participant_id).append(
                            '<span class="badge badge-danger">ABSENT</span>'
                        );
                        Swal.fire('Marked as absent', '', 'info')
                    } else {
                        alert("Some error has been occurred !!");
                    }
                }
            });
        } else if (btnId == "First") {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>admin/mark_attendence/" + participant_id + "/101",
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
                        $("#" + participant_id).html(modalHtml);
                        $("." + participant_id).html(modalHtml);
                        $("." + participant_id).append(
                            '<span class="badge badge-success">FIRST</span>'
                        );
                        Swal.fire('Marked as first!', '', 'success')
                    } else {
                        alert("Some error has been occurred !!");
                    }
                }
            });
        } else if (btnId == "Second") {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>admin/mark_attendence/" + participant_id + "/102",
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
                        $("#" + participant_id).html(modalHtml);
                        $("." + participant_id).html(modalHtml);
                        $("." + participant_id).append(
                            '<span class="badge badge-success">Second</span>'
                        );
                        Swal.fire('Marked as Second!', '', 'success')
                    } else {
                        alert("Some error has been occurred !!");
                    }
                }
            });
        }

    }
</script>


<!-- 
<script>
    $(function() {

        $(".domarkatnds").click(function() {
            var participant_id = $(this).attr("id");
            Swal.fire({
                title: 'You cant change it later. Are you sure ?',
                showDenyButton: false,
                showCancelButton: false,
                html: `
    <div>
      <button class="btn btn-primary" onclick="onBtnClicked('Present')">Present</button>
      <button class="btn btn-secondary" onclick="onBtnClicked('First')">First</button>
      <button class="btn btn-secondary" onclick="onBtnClicked('Second')">Second</button>
      <button class="btn btn-danger" onclick="onBtnClicked('delete')">Delete</button>
      <button class="btn btn-secondary" onclick="onBtnClicked('Absent')">Absent</button>
    </div>`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url() ?>admin/mark_as_present/" + participant_id,
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
                                $("#" + participant_id).html(modalHtml);
                                $("." + participant_id).html(modalHtml);
                                $("." + participant_id).append(
                                    '<span class="badge badge-success">PRSENT</span>'
                                );
                                Swal.fire('Marked as present!', '', 'success')
                            } else {
                                alert("Some error has been occurred !!");
                            }
                        }
                    });

                } else if (result.isDenied) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url() ?>admin/mark_as_absent/" + participant_id,
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
                                $("#" + participant_id).html(modalHtml);
                                $("." + participant_id).html(modalHtml);
                                $("." + participant_id).append(
                                    '<span class="badge badge-danger">ABSENT</span>'
                                );
                                Swal.fire('Marked as absent', '', 'info')
                            } else {
                                alert("Some error has been occurred !!");
                            }
                        }
                    });


                }
            })
        });


        $(".verifybutton").click(function() {
            var participant_reg_id = $(this).attr("id");
            if (confirm("Sure you want to Verify this?.")) {
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>admin/verify_event_fee_payment/" + participant_reg_id,
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
                            $("#" + participant_reg_id).html(modalHtml);
                            $("." + participant_reg_id).html();
                            $("." + participant_reg_id + "cus").append('VERIFIED BY <br>' + result['session_user']);
                        } else {
                            alert("Some error has been occurred !!");
                        }
                    }
                });
            }
            return false;
        });
    });
</script> -->