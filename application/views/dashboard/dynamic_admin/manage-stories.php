<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Manage stories</li>
		</ol>
	</nav>
	<?php if ($this->session->userdata('user_type') == 'super_admin' || $this->session->userdata('user_type') == 'admin') { ?>
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<?php if ($this->session->flashdata('fail')) : ?>
						<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
					<?php endif; ?>
					<?php if ($this->session->flashdata('success')) : ?>
						<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
					<?php endif; ?>
					<div class="card-body">
						<h6 class="card-title">ADD STORIES</h6>
						<?php echo form_open_multipart('admin/add_stories'); ?>
						<div class="forms-sample">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" name="title" class="form-control" autocomplete="off" placeholder="Title" required>
							</div>
							<div class="form-group">
								<label for="image">Image</label>
								<input type="file" name="userfile" class="form-control" autocomplete="off" placeholder="Image" required>
							</div>
							<button type="submit" class="btn btn-primary mr-2">Submit</button>
							<button type="reset" class="btn btn-light">Reset</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">STORIES</h6>
						<div class="table-responsive">
							<table id="dataTableExample" class="table">
								<thead>
									<tr>
										<th class="pt-0">ID</th>
										<th class="pt-0">Title</th>
										<th class="pt-0">Image</th>
										<th class="pt-0">Updated User</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach ($allstories as $row) { ?>
										<tr>
											<td><?= $row['id'] ?></td>
											<td><?= $row['title'] ?></td>
											<td><?= $row['img'] ?></td>
											<td><?= $row['updated_user'] ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<h5 style="color:red">You are not authorized to access this page</h5>
	<?php } ?>
</div>