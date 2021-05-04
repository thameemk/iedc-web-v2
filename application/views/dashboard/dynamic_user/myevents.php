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
            <?php foreach (array_reverse($myevents) as $row) { ?>

            <div class="col-md-3 grid-margin" style="background: #e8ebf1; padding:3px;margin:5px;">
                <img width="auto" height="150" src="<?= $row['img_link_reg'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <center>
                        <h5 class="card-title"><?= $row['event_title'] ?></h5>
                        <?php if($row['is_cert_published']==0) {  ?>
                            <button class="btn btn-danger" disabled>CERTIFICATE NOT ISSUED</button>
                        <?php } else if($row['is_cert_published']==1) { ?>
                            <?php if($row['is_attended']==0) {  ?>
                                <button class="btn btn-danger" disabled>NOT ATTENDED</button>
                            <?php } else if($row['is_attended']==1) { ?>                           
                                <form action="<?=base_url()?>user/download_cert" method="post">
                                    <input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
                                    <button type="submit" class="btn btn-success">DOWNLOAD CERTIFICATE</button>
                                </form>
                            <?php } ?>    
                        <?php } ?>
                    </center>
                </div>
            </div>

            <?php } ?>


        </div>
    </section>
</div>