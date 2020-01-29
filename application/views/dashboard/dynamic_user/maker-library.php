<div class="page-content">
	<section class="mb-3">
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">User</a></li>
				<li class="breadcrumb-item active" aria-current="page">Maker Library</li>
			</ol>
		</nav>
	</section>

	<div class="row">

		<?php foreach ($get_maker_items as $key) { ?>

		<div class="col-md-3">
			<ul style="align-items:center;" class="list-unstyled text-center">
				<li class="media d-block">
					<img src="<?=base_url()?>assets/uploads/images/maker-library/<?=$key['img_link']?>" class="wd-100p wd-sm-150 mb-3 mb-sm-0">
				</li>
				<li class="mt-1 mb-1">
					<?=$key['name']?>
				</li>
				<?php if($key['available_count']==0) { ?>
				<li class="btn btn-danger">
						Not Available
				</li>
				<?php }else { ?>
				<li class="btn btn-success">
						<?=$key['available_count']?>/<?=$key['total_count']?> Available
				</li>
				<?php } ?>
			</ul>
		</div>

		<?php } ?>

	</div>
</div>
