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
                        <h6 class="card-title"><?= $eventDetails->event_id?> - <?= $eventDetails->event_title?><button
                                class="float-right  btn btn-danger font-weight-bold" disabled>ISSUE CERTIFICATE</button>
                        </h6>
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
                                        <th class="pt-0">CERT NO</th>
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

                                        <td>

                                            <?php if($row['is_attended']==1) { ?>
                                            <span class="badge badge-success">PRSENT</span>
                                            <?php } else if ($row['is_attended']==NULL) { ?>
                                                <?php if($eventDetails->is_cert_published==0) { ?>
                                            <div class="<?=$row['id']?>">
                                                <button class="domarkatnds btn btn-primary" id="<?=$row['id']?>">Mark
                                                    Attendence</button>
                                            </div>
                                            <?php } else { ?>
                                                <button class="btn btn-warning">Not Allowed</button>
                                            <?php }} else { ?>
                                            <span class="badge badge-danger">ABSENT</span>
                                            <?php } ?>

                                        </td>
                                        <td><?= $row['cert_num'] ?></td>

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
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Present`,
            denyButtonText: `Absent`,
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
});
</script>