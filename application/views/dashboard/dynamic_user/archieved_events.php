<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Events & Programs</li>
        </ol>
    </nav>


    <section>
        <div>
            <?php if ($this->session->flashdata('fail')) : ?>
                <span style="line-height:3;width:100%;" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')) : ?>
                <span style="line-height:3;width:100%;" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
            <?php endif; ?>
        </div>
        <div class="row stretch-card">
            <?php foreach (array_reverse($events) as $row) { ?>

                <div class="col-md-3 grid-margin" style="background: #e8ebf1; padding:3px;margin:5px;">
                    <img width="auto" height="150" src="<?= $row['img_link_reg'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title"><?= $row['event_title'] ?></h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getEventDetails(this);" id="<?= $row['event_id'] ?>">REGISTER NOW</button>
                        </center>
                    </div>
                </div>

            <?php } ?>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title event_title" id="event_title"></h5>
                            <button type="button" onclick="clearData()" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="event_disc" id="event_disc" align="justify"></p>
                            <p>
                                <b>Fee: </b><span class="event_fee" id="event_fee"></span><br>
                                <b>Date: </b><span class="event_date" id="event_date"></span><br>
                                <b>Time :</b> <span class="event_time" id="event_time"></span><br>
                                <b>Vene :</b><span class="event_venue" id="event_venue"></span><br>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button onclick="clearData()" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="<?= base_url() ?>user/event_registration" method="post">
                                <span class="event_id" id="event_id"></span>
                                <span class="event_reg" id="event_reg"></span>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    function clearData() {
        var modalHtml = "";
        $("#event_title").html(modalHtml);
        $("#event_disc").html(modalHtml);
        $("#event_venue").html(modalHtml);
        $("#event_time").html(modalHtml);
        $("#event_date").html(modalHtml);
        $("#event_fee").html(modalHtml);
        $("#event_id").html(modalHtml);
        $("#event_reg").html(modalHtml);
    }

    function getEventDetails(div) {
        var event_id = div.id;
        jQuery.ajax({
            type: 'post',
            url: "<?= base_url() ?>user/get_event_details/" + event_id,
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
                $(".event_title").html();
                $(".event_disc").html();
                $(".event_time").html();
                $(".event_date").html();
                $(".event_venue").html();
                $(".event_fee").html();
                $(".event_id").html();
                console.log(result);
                if (result != "null") {
                    $.each($.parseJSON(result), function(idx, obj) {
                        $(".event_title").append(obj.event_title);
                        $(".event_disc").append(obj.event_disc);
                        $(".event_time").append(obj.event_time);
                        $(".event_date").append(obj.event_date);
                        $(".event_venue").append(obj.event_venue);
                        $(".event_fee").append(obj.event_fee);
                        $(".event_id").append("<input type='hidden' name='event_id' value='" + obj
                            .event_id + "'>");
                        if (obj.is_reg_open == 1) {
                            $(".event_reg").append("<button type='submit' class='btn btn-primary'>Register Now</button>");
                        } else {
                            $(".event_reg").append("<button type='submit' class='btn btn-danger' disabled>Registration Closed</button>");
                        }
                    });
                }
            }
        });

    }
</script>