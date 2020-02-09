<div class="page-content">
	<section class="mb-3">
		<nav class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">User</a></li>
				<li class="breadcrumb-item active" aria-current="page">Maker Library</li>
			</ol>
		</nav>
	</section>
	<?php if($this->session->flashdata('fail')): ?>
				<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
				<?php endif; ?>
				<?php if($this->session->flashdata('success')): ?>
				<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
				<?php endif; ?>
	<div class="row mt-5">
	
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
				<form action="<?=base_url()?>user/maker_request" method="post">
					<input type="hidden" name="comp_num" value="<?=$key['comp_num']?>">			
					<li>
						<button class="btn btn-success" type="submit">Book Now</button>
					</li>
				</form>
				<?php } ?>
			</ul>
		</div>

		<?php } ?>

	</div>
</div>
