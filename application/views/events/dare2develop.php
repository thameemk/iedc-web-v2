<section id="page-title" style="background-color: #1D2C49;">
    <div class="container">
        <div class="page-title">
            <h1 class="text-white">Dare2Develop</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li class="text-white"><a href="<?= base_url() ?>">Home</a> </li>
                <li class="active text-white"><a href="<?= base_url() ?>events/dare2develop">Dare2Develop</a> </li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <?php if ($this->session->flashdata('fail')) : ?>
            <div class="alert alert-danger" role="alert">
                <center><?php echo $this->session->flashdata('fail'); ?></center>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <center><?php echo $this->session->flashdata('success'); ?></center>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12 pr-3">
                <div class="row">
                    <div class="mb-3 mt-5">
                        <div>
                            <p align="justify">"Computers will overtake humans with AI 🤖 within the next 100 years. When this happens we need to make sure the computers have goals aligned with ours. "
                            </p>
                        </div>
                        <span class="smalldesc">
                            <p>It's time to prepare for the future.<br>
                                IEDC TKMCE presents a 2-day WORKSHOP on ARTIFICIAL INTELLIGENCE and MACHINE LEARNING . on JANUARY 25 , 26 2020. The workshop is conducted in association with ACADEVO Research labs ,
                                Grab the opportunity before it's too late. 🕑<br> <br>
                                Registration fee : Rs.700<br>
                                Registration fee for IEDC members : Rs.550<br><br>
                            </p>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">                                           
                        <iframe src="https://open.spotify.com/embed-podcast/show/2O5FfJYAclgd38qZGh3eVp" width="100%" height="450px" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
</section>