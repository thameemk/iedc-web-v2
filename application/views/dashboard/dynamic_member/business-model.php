<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Business Model</li>
        </ol>
    </nav>

    <div class="row">
        <?php if($admin == true){ ?>
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Business Model</h4>
                    <div id="wizardVertical">
                        <h2>Key Activities</h2>
                        <section>
                            <h4>Key Activities</h4>
                            <textarea name="key_activities" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Key Partners</h2>
                        <section>
                            <h4>Key Partners</h4>
                            <textarea name="key_partners" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Key Resources</h2>
                        <section>
                            <h4>Key Resources</h4>
                            <textarea name="key_resurces" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Value Propositions</h2>
                        <section>
                            <h4>Value Propositions</h4>
                            <textarea name="value_propositions" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Customer Relationships</h2>
                        <section>
                            <h4>Customer Relationships</h4>
                            <textarea name="customer_relationships" class="form-control mt-3" rows="10"
                                required></textarea>
                        </section>
                        <h2>Channels</h2>
                        <section>
                            <h4>Channels</h4>
                            <textarea name="channels" class="form-control mt-3" rows="10" required></textarea>
                        </section>
                        <h2>Customer Segments</h2>
                        <section>
                            <h4>Customer Segments</h4>
                            <textarea name="customer_segments" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Cost Structure</h2>
                        <section>
                            <h4>Cost Structure</h4>
                            <textarea name="cost_structure" class="form-control mt-3" rows="10" required></textarea>
                        </section>

                        <h2>Revenue Streams</h2>
                        <section>
                            <h4>Revenue Streams</h4>
                            <textarea name="revenue_streams" class="form-control mt-3" rows="10" required></textarea>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <?php }else { ?>
        <h5 style="color:red">You are not authorized to access this page.<br> Please join IEDC to avail this feature</h5>
        <?php } ?>
    </div>

</div>