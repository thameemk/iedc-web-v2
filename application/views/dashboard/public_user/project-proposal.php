<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project proposal</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <?php if ($this->session->flashdata('fail')) : ?>
                <span style="line-height:3"
                    class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                <span style="line-height:3"
                    class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                <?php endif; ?>
                <div class="card-body">
                    <h6 class="card-title">Project proposal</h6>
                    <form method="post" action="<?= base_url() ?>User/project_proposal_post/">

                        <div class="form-group">
                            <label for="title_">Title :</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">

                            <label for="summary">Abstract/Summary :</label>
                            <textarea rows="10" type="text" class="form-control" name="summary" style="display: inline;"
                                required></textarea>

                        </div>

                        <div>
                            <label>Team members :</label>
                            <div >

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="team_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10rem; ">
                                                        Name
                                                    </th>
                                                    <th style="width:5rem ;">
                                                        Class
                                                    </th>
                                                    <th style="width:7.5rem ;">
                                                        Contact No
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="wrapper">
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" name="name[]" style="width: 10rem; ">
                                                    </td>
                                                    <td>
                                                        <input type="text " class="form-control " name="class[]"
                                                            style="width: 5rem; ">
                                                    </td>
                                                    <td>
                                                        <input type="number " class="form-control " name="contact_no[]"
                                                            style="width: 10rem; ">
                                                    </td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                        <span name="add_member" id="add_member" class="btn btn-primary mt-2 mr-2"
                                            value="Add Member" onclick="addMember()">Add member</span>
                                    </div>
                                </div>


                            </div>
                        </div><br>
                        <div>
                            <label>Details of Fund Requirement :</label><br>
                            <div>

                                <div class="card-body">

                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered" id="req_table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10rem; ">
                                                        Requirement
                                                    </th>
                                                    <th style="width:7.5rem ;">
                                                        Amount
                                                    </th>
                                                    <th style="width: 12rem;">
                                                        Remarks
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="wrapper_1">
                                                <tr>
                                                    <td>
                                                        <input style="width: 10rem; " type=" text " class="form-control " name="requirement[]">
                                                    </td>
                                                    <td>
                                                        <input type="number " class="form-control " name="amount[]"
                                                            style="width: 7.5rem; ">
                                                    </td>
                                                    <td>
                                                        <input type="text " class="form-control " name="remarks[]"
                                                            style="width: 12 rem; ">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span class="btn btn-primary mt-2 mr-2" value="Add Requirement"
                                            onclick="addRequirement();">Add
                                            Requirement</span>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <h6>Recommended By</h6><br>
                        <div class="form-group">
                            <label for="title_">Faculty Name :</label>
                            <input type="text" class="form-control" name="faculty_recommend" required>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>

<script>
function addMember() {
    document.getElementById('wrapper').innerHTML +=
        '<tr><td><input type="text" class="form-control" name="name[]"style="width: 10rem; "></td><td><input type="text " class="form-control " name="class[]"style="width: 5rem; "></td><td><input type="number " class="form-control " name="contact_no[]"style="width: 10rem; "></td></tr>\r\n';
}

function addRequirement() {
    document.getElementById('wrapper_1').innerHTML +=
        '<tr><td><input type=" text " class="form-control " name="requirement[]"style="width: 10rem; "></td><td><input type="number " class="form-control " name="amount[]"style="width: 7.5rem; "></td><td><input type="text " class="form-control " name="remarks[]"style="width: 12 rem; "></td></tr>\r\n';
}
</script>