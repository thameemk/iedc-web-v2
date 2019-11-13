<section id="page-title" data-parallax-image="<?=base_url()?>assets/front/images/banner/team.jpg">
    <div class="container">
        <div class="page-title">
            <h1>Meet the team</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=base_url()?>">Home</a> </li>
                <li class="active"><a href="<?=base_url()?>team">Team</a> </li>
            </ul>
        </div>
    </div>
</section>


<section>
    <div class="container">

        <div class="heading-text heading-line text-center">
            <h3>Executive Committee 2019-2020</h3>
        </div>
        <div class="row team-members m-b-40">
            <?php
		           foreach ($execom5 as $row) {
		        ?>
            <div class="col-lg-3">
                <div class="team-member">
                    <div class="team-image">
                        <img src="<?=base_url()?>assets/uploads/images/team/2019-2020/<?=$row['imageLink']?>">
                    </div>
                    <div class="team-desc">
                        <h3><?=$row['Name']?></h3>
                        <p><?=$row['position']?></p>
                    </div>
                </div>
            </div>
            <?php } ?>	  
        </div>
    </div>
</section>
