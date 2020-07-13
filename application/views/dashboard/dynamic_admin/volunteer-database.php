<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Volunteer database</li>
		</ol>
	</nav>

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
					<form class="forms-sample" action="<?=base_url()?>admin/add_volunteer_post" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Name</label>
							<input type="text" name="name" class="form-control" autocomplete="off" placeholder="Name" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Phone</label>
							<input type="phone" name="phone" class="form-control" autocomplete="off" placeholder="Phone Number" required>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Branch</label>
							<select name="branch" class="form-control" required>
								  <option>Select Branch</option>
								  <option>M-Tech</option>
				                  <option>Architecture</option>
				                  <option>Chemical Engineering</option>
				                  <option>Civil Engineering</option>
				                  <option>Computer Science & Engineering</option>
				                  <option>Electronics & Communication Engineering</option>
				                  <option>Electrical & Electronics Engineering</option>
				                  <option>Master of Computer Application</option>
				                  <option>Mechanical Engineering</option>
				                  <option>Mechanical Production</option>
				             </select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Year</label>
							<select name="year" class="form-control" required>
								 	<option>Select Year</option>
									<option>First Year</option>
									<option>Second Year</option>
                  					<option>Third Year</option>
                 					<option>Fourth Year</option>
				             </select>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Role</label>
							<textarea type="text" name="role" class="form-control" rows="5"autocomplete="off" placeholder="Contribution to IEDC" required></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Duration</label>
							<input type="text" name="duration" class="form-control" autocomplete="off" placeholder="Duration of Volunteering" required>
						</div>
						<button type="submit" class="btn btn-primary mr-2">Submit</button>
						<button type="reset" class="btn btn-light">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
