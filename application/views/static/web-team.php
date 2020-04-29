<section id="page-title" data-parallax-image="<?=base_url()?>assets/front/images/banner/team.jpg">
    <div class="container">
        <div class="page-title">
            <h1>Web team</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=base_url()?>">Home</a> </li>
                <li class="active"><a href="<?=base_url()?>web-team">Web Team</a> </li>
            </ul>
        </div>
    </div>
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
