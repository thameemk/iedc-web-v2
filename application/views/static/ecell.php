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
<section class="banner-img-height" id="page-title" style="background-color: #181918;" data-parallax-image="<?= base_url() ?>assets/front/images/banner/e cell.png">
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
							<?php if ($row['imageLink']) { ?>
								<img src="<?= base_url() ?>/assets/uploads/images/ecell/<?= $row['imageLink'] ?>" alt="<?= $row['companyHead'] ?>" class="img-fluid" style="height: auto ; width: 200px;">
							<?php } else { ?>
								<img src="<?=base_url()?>assets/uploads/no-logo.png" class="img-fluid" style="height: 150px ; width: 200px;">
							<?php } ?>
						</div>
						<div class="post-item-description">
							<h2><a href="#"><?= $row['companyHead'] ?></a></h2>
							<p><?= $row['companyData'] ?></p>
						</div>
					</div>
				</div>
				<hr>
			<?php } ?>
		</div>
	</div>
</section>