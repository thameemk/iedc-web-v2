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
                <div class="card-body">
                    <h6 class="card-title">Project proposal</h6>
                    <form>

                        <div class="form-group">
                            <label for="title_">Title :</label>
                            <input type="text" class="form-control" id="title">
                        </div>

                        <div class="form-group">

                            <label for="summary">Abstract/Summary :</label>
                            <textarea type="text" class="form-control" id="summary"
                                style="display: inline;"></textarea>

                        </div>

                        <div>
                            <label>Team members :</label>
                            <div style="padding-left: 20px;">

                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="team_table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th style="width:5rem ;">
                                                        Class
                                                    </th>
                                                    <th style="width:7.5rem ;">
                                                        Contact No.
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="team_members">
                                                <tr>
                                                    <td>
                                                        <input type=" text " class="form-control " id="name_ ">
                                                    </td>
                                                    <td>
                                                        <input type="text " class="form-control " id="class_ "
                                                            style="width: 5rem; ">
                                                    </td>
                                                    <td>
                                                        <input type="number " class="form-control " id="contact_no "
                                                            style="width: 10rem; ">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="submit" name="add_member" id="add_member"
                                            class="btn btn-primary mt-2 mr-2" value="Add Member"
                                            onclick="rowFunction()" disabled >Add
                                            member</button>
                                    </div>
                                </div>


                            </div>
                        </div><br>
                        <div>
                            <label>Details of Fund Requirement :</label><br>
                            <div style="padding-left: 20px;">

                                <div class="card-body">

                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered" id="req_table">
                                            <thead>
                                                <tr>
                                                    <th>
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
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <input type=" text " class="form-control " id="requirement ">
                                                    </td>
                                                    <td>
                                                        <input type="number " class="form-control " id="amt "
                                                            style="width: 7.5rem; ">
                                                    </td>
                                                    <td>
                                                        <input type="text " class="form-control " id="remarks "
                                                            style="width: 12 rem; ">
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tr>
                                                <td></td>
                                                <td>Total:</td>
                                                <td><input type="number" class="form-control" id="total" disabled></td>                                                
                                            </tr>
                                        </table>
                                        <button type="submit" class="btn btn-primary mt-2 mr-2" value="Add Requirement"
                                            onclick="addField1(this);" disabled>Add
                                            Requirement</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <h6>Recommended By</h6><br>
                        <div class="form-group">
                            <label for="title_">Faculty Name :</label>
                            <input type="text" class="form-control" id="faculty_recommend">
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-primary" disabled>Submit</button>
                        </div>
                </div>

            </div>


        </div>
    </div>
</div>