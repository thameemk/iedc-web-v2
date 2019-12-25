<section id="page-title" data-parallax-image="<?=base_url()?>assets/front/images/banner/ecell.jpg">
	<div class="container">
		<div class="page-title">
			<h1>E-Cell</h1>
		</div>
		<div class="breadcrumb">
			<ul>
				<li><a href="<?=base_url()?>">Home</a> </li>
				<li class="active"><a href="<?=base_url()?>ecell">E-Cell</a> </li>
			</ul>
		</div>
	</div>
</section>



<section id="page-content">
	<div class="container">
		<div class="page-title">
			<div class="breadcrumb float-left"></div>
		</div>


		<div id="blog" class="post-thumbnails mb-5 mt-5">
			<h2 class="mb-30" style="text-align: center;">Incubated companies</h2>
			<?php
					foreach ($incubated as $row) {
			?>
			<div class="post-item">
				<div class="post-item-wrap">
					<div class="post-image">
						<img src="<?=base_url()?>/assets/uploads/images/ecell/<?=$row['imageLink']?>" alt="<?=$row['companyHead']?>" class="img-fluid" style="height: 150px ; width: 200px;">
					</div>
					<div class="post-item-description">
						<h2><a href="#"><?=$row['companyHead']?></a></h2>
						<p><?=$row['companyData']?></p>
					</div>
				</div>
			</div>
			<hr>
			<?php }?>
		</div>
		<div id="blog" class="post-thumbnails mb-5 mt-5">
			<h2 class="mb-30" style="text-align: center;">Incubating companies</h2>
			<?php
					foreach ($incubating as $row) {
			?>
			<div class="post-item">
				<div class="post-item-wrap">
					<div class="post-image">
						<img src="<?=base_url()?>/assets/uploads/images/ecell/<?=$row['imageLink']?>" alt="<?=$row['companyHead']?>" class="img-fluid" style="height: 150px ; width: 200px;">
					</div>
					<div class="post-item-description">
						<h2><a href="#"><?=$row['companyHead']?></a></h2>
						<p><?=$row['companyData']?></p>
					</div>
				</div>
			</div>
			<hr>
			<?php }?>
		</div>
	</div>
</section>
