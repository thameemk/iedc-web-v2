<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">AI & ML Registred Users</li>
		</ol>
	</nav>

<section class="mt-5">
	<div class="row">
		<div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">Registred Users</h6>
						<div class="dropdown mb-2">
							<button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
							</button>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-hover mb-0">
							<thead>
								<tr>
									<th class="pt-0">Sl No</th>
									<th class="pt-0">Name</th>
									<th class="pt-0">Email</th>
									<th class="pt-0">Phone</th>
									<th class="pt-0">Branch</th>
									<th class="pt-0">Year</th>
									<th class="pt-0">Is IEDC Member</th>
									<th class="pt-0">Paid</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($users_ai_ml as $row ){?>
								<tr>
									<td><?=$row['id']?></td>
									<td><?=$row['name']?></td>
									<td><a href="mailto:<?=$row['email']?>"><?=$row['email']?></a></td>
									<td><a href="tel:<?=$row['phone']?>"><?=$row['phone']?></a></td>
									<td><?=$row['branch']?></td>
									<td><?=$row['year']?></td>
									<?php if($row['is_iedc_member']=='yes'){?>
									<td><span class="badge badge-success"><?=$row['is_iedc_member']?></span></td>
									<?php } else{ ?>
									<td><span class="badge badge-danger"><?=$row['is_iedc_member']?></span></td>
									<?php }?>
									<?php if($row['is_paid']==1){?>
									<td><span class="badge badge-success">Yes</span></td>
									<?php } else{ ?>
								  <td>
										<form action="<?=base_url("admin/ai_ml_paid")?>" method="post">
										<input type="hidden" name="email" value="<?=$row['email']?>">
										<button type="submit" class="badge badge-danger">No- if paid click here</button>
	                  </form>
									</td>
									<?php }?>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
