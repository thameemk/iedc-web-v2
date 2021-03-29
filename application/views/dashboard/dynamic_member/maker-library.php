<div class="page-content">
    <section class="mb-3">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Maker Library</li>
            </ol>
        </nav>
    </section>
    <?php if ($admin == true) { ?>       
        <section>
            <div class="row mt-5">

                <?php foreach ($get_maker_items as $key) { ?>

                    <div class="col-md-3">
                        <ul style="align-items:center;" class="list-unstyled text-center">
                            <li class="media d-block">
                                <img src="<?= base_url() ?>assets/uploads/images/maker-library/<?= $key['img_link'] ?>" class="wd-100p wd-sm-150 mb-3 mb-sm-0">
                            </li>
                            <li class="mt-1 mb-1">
                                <?= $key['name'] ?>
                            </li>
                            <?php if ($key['available_count'] == 0) { ?>
                                <li class="btn btn-danger">
                                    Not Available
                                </li>
                            <?php } else { ?>
                                <li>
                                    <button id="<?= $key['comp_num'] ?>" class="newrequest btn btn-success" type="submit">Book Now</button>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>

            </div>
        </section>
        <section class="mt-5">
            <div class="row">
                <div style="max-width:100%;" class="col-lg-7 col-xl-11 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                                <h6 class="card-title mb-0">Your Requests</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th class="pt-0">Id</th>
                                            <th class="pt-0">Name</th>
                                            <th class="pt-0">Request Date</th>
                                            <th class="pt-0">Issue Date</th>
                                            <th class="pt-0">Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($maker_user_req as $row) { ?>
                                            <tr>
                                                <td><?= $row['req_component'] ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['req_date'] ?></td>
                                                <td><?= $row['issue_date'] ?></td>
                                                <td><?= $row['return_date'] ?></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <h5 style="color:red">You are not authorized to access this page.<br> Please join IEDC to avail this feature</h5>
    <?php } ?>
</div>

<script>
    $(function() {

        $(".newrequest").click(function() {           
            var comp_id = $(this).attr("id");
            if (confirm("Sure you want to book this?.")) {
                $(".newrequest").attr("disabled", true);
                $.ajax({
                    type: "post",
                    url: "<?= base_url() ?>member/maker_request/" + comp_id,
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
                        Swal.fire({
                            title:"Success!",
                            text:"Please contact maker space head ",
                            type:"success"
                        }).then(function() {
                            window.location = "<?= base_url() ?>user/dashboard/maker-library";
                        })
                    }
                });
            }
            return false;
        });
    });
</script>