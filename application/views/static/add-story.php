

    <section id="page-title">
        <div class="container">
            <div class="page-title">
                <h1>Add story</h1>

            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="<?=base_url()?>">Home</a>
                    </li>

                    </li>
                    <li class="active"><a href="<?=base_url()?>add-story">Add Story</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 center no-padding">
                    <form class="form-transparent-grey">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Add Story</h3>
                                <br>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="sr-only">Story Title</label>
                                <input type="text" value="" placeholder="Title" class="form-control">
                            </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#datetimepicker2" placeholder="Date" />
                                            <div class="input-group-append" data-target="#datetimepicker2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="icon-calendar21"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Venue">
                                    </div>
                                    </div>
                                <div class="form-group col-lg-6 form-group">
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                <div class="col-lg-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Facebook URL">
                                </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Linkedin URL">
                                    </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Instagram URL">
                                        </div>
                                        </div>
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="12"
                                        placeholder="Content"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn" type="button">SUBMIT</button>
                            </div>
    </section>