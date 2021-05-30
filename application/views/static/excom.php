<style>
            .banner-img-height {
                height: 380px;
            }

            @media screen and (max-width: 600px) {
                .banner-img-height {
                    height: 150px;
                }
            }

            .first-letter {
                font-size: 80px;
            }

            .custom-para {
                line-height: 40px;
            }
        </style>
<section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/MEET THE TEAM.png">
</section>

<section>
    <div class="container">
      <?php
         foreach (array_reverse($execomYear) as $row) {
      ?>
        <div class="heading-text heading-line text-center">
            <h3>Executive Committee <?=$row['execomYear']?></h3>
        </div>
        <div class="row team-members m-b-40">
            <?php
		           foreach ($execom as $col) {
		        ?>
            <?php if($row['execomYear']==$col['year']){ ?>
            <div class="col-lg-3">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?=base_url()?>assets/uploads/images/team/<?=$col['year']?>/<?=$col['imageLink']?>">
                    </div>
                   <div class="team-desc">
                                    <h3><?= $col['Name'] ?></h3>
                                    <p><?= $col['position'] ?></p>
                                    <span class="social-linkedin">
                                        <?php if ($col['linkedin']) { ?>
                                            <a class="mr-3" href="<?= $col['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        <?php }
                                        if ($col['portfolio']) { ?>
                                            <a href="<?= $col['portfolio'] ?>" target="_blank"><i class="fa fa-link"></i></a>
                                        <?php } ?>
                                        <span>
                                </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
</section>
