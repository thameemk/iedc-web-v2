
<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add User</li>
		</ol>
	</nav>
    <?php if($this->session->userdata('user_type')=='S'){?>
	<div class="row">
		<div class="col-md-6 grid-margin stretch-card">
			<div class="card">
				<?php if($this->session->flashdata('fail')): ?>
				<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
				<?php endif; ?>
				<?php if($this->session->flashdata('success')): ?>
				<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
				<?php endif; ?>
				<div class="card-body">
					<h6 class="card-title">ADD USER</h6>
					<form class="forms-sample" action="<?=base_url()?>admin/add_user" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Access Code</label>
							<input type="text" name="password" class="form-control" autocomplete="off" placeholder="Access Code">
						</div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
						<button type="reset" class="btn btn-light">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
    <?php } else { ?>
    <h5 style="color:red">You are not authorized to access this page</h5>
    <?php } ?>