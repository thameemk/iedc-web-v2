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
<section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/WEB TEAM.png">
</section>



<section>
    <div class="container">
      <?php
         foreach (array_reverse($webYear) as $row) {
      ?>
        <div class="heading-text heading-line text-center">
            <h3>Web Team <?=$row['webYear']?></h3>
        </div>
        <div class="row team-members m-b-40">
            <?php
		           foreach ($web_team as $col) {
		        ?>
            <?php if($row['webYear']==$col['year']){ ?>
            <div class="col-lg-3">
                <div class="team-member">
                    <div class="team-image">
                        <img alt ="<?=$col['name']?>" height="250px" width="100px" src="<?=base_url()?>assets/uploads/images/web-team/<?=$col['year']?>/<?=$col['image_link']?>">
                    </div>
                    <div class="team-desc">
                        <h3><?=$col['name']?></h3>                        
                        <p><a href="<?=$col['contact_mail']?>" target="_blank">Connect on Linkedin&nbsp;<i class="fab fa-linkedin-in"></i></a></p>
                        <?php if($col['remarks']){ ?>
                            <p><a target="_blank" href="<?=$col['remarks']?>">Visit Website</a></p>
                        <?php } ?>      
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
</section>
