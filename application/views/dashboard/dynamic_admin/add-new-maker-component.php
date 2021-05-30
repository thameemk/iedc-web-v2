<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add component</li>
		</ol>
	</nav>

	<div class="row">
	    <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<?php if($this->session->flashdata('fail')): ?>
				<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
				<?php endif; ?>
				<?php if($this->session->flashdata('success')): ?>
				<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
				<?php endif; ?>
				<div class="card-body">
					<h6 class="card-title">ADD COMPONENT</h6>
					<?php echo form_open_multipart('admin/add_component');?>
					<!-- <form class="forms-sample" action="<?=base_url()?>admin/add_component" method="post"> -->
					<div class="forms-sample">
						<div class="form-group">
							<label for="exampleInputEmail1">Component Number</label>
							<input type="text" class="form-control" name="comp_num" placeholder="Component Number" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" required placeholder="Component name">
						</div>
                        <div class="form-group">
							<label for="exampleInputEmail1">Total Count</label>
							<input type="text" name="total_count" class="form-control" placeholder="Total Count" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Choose image</label>
							<input type="file" name="img_link" class="form-control">
						</div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
						<button type="reset" class="btn btn-light">Reset</button>
					</form>
					</div>
					</div>
				</div>
			</div>
		</div>
			<?php } else { ?>
    <h5 style="color:red">You are not authorized to access this page</h5>
    <?php } ?>
	</div>
