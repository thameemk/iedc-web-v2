<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
</style>
<div style="background: white;" id="slider" class="inspiro-slider" data-height="380">

    <div class="slide">
        <div class="container">
            <div class="slide-captions text-center text-dark">

                <h2 class="text-uppercase">verify certificate</h2>

            </div>
        </div>
    </div>

</div>
<section>
    <div class="container">
        <center>
            <div>
                <?php if ($certrecords['status'] == true) { ?>
                    <h3 style="color:green">Certificate Found</h3>
                    <table class="styled-table">
                        <tr>
                            <th>Name</th>
                            <td><?= $certrecords['fullname'] ?></td>
                        </tr>
                        <tr>
                            <th>College</th>
                            <td><?= $certrecords['college'] ?></td>
                        </tr>
                        <tr>
                            <th>Event</th>
                            <td><?= $certrecords['event_title'] ?></td>
                        </tr>
                        <tr>
                            <th>Cert No</th>
                            <td><?= $certrecords['cert_num'] ?></td>
                        </tr>
                    </table>
                <?php } else if ($certrecords['cert_num'] != '0') { ?>
                    <h3 style="color:red">Invalid Certificate</h3>
                <?php } ?>
            </div>
            <div class="m-t-30">

                <div class="form-group col-md-6">
                    <input id="cert_no" type="text" aria-required="true" name="cert_no" class="form-control" placeholder="Enter certificate number" required>
                </div>

                <button class="btn" type="submit" id="submit" onclick="formSubmit()"><i class="fa fa-paper-plane"></i>&nbsp;Verify
                    certificate</button>
            </div>
        </center>
    </div>
</section>

<script type="text/javascript">
    function formSubmit() {
        var cert = document.getElementById("cert_no").value;
        console.log(cert);
        window.location = "<?= base_url() ?>pages/verify/" + cert;
    }
</script>