<section id="page-title" data-parallax-image="<?=base_url()?>assets/front/images/banner/team.jpg">
    <div class="container">
        <div class="page-title">
            <h1>Meet the team</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=base_url()?>">Home</a> </li>
                <li class="active"><a href="<?=base_url()?>execom">Execom</a> </li>
            </ul>
        </div>
    </div>
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
                        <h3><?=$col['Name']?></h3>
                        <p><?=$col['position']?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
</section>
