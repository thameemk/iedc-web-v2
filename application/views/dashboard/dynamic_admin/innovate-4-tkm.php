<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Innovate Registred Users</li>
		</ol>
	</nav>

	<section class="mt-5">
	    <?php if($this->session->userdata('user_type')=='S' ||$this->session->userdata('user_type')=='U' ||$this->session->userdata('user_type')=='L2') {?>
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive pt-3">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											Team Leader
										</th>
										<th>
											Phone
										</th>
										<th>
											Year
										</th>
										<th>
											Member 1
										</th>
										<th>
											Member 2
										</th>
										<th>
											Member 3
										</th>
										<th>
											Abstract
										</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users_innovate as $row ) { ?>
									<tr>
										<td>
											<?=$row['id']?>
										</td>
										<td>
											<?=$row['tlname']?>
										</td>
										<td>
											<?=$row['tlphone']?>
										</td>
										<td>
											<?=$row['tlyear']?>
										</td>
										<td>
											<?=$row['member_one']?>
										</td>
										<td>
											<?=$row['member_two']?>
										</td>
										<td>
											<?=$row['member_three']?>
										</td>
										<td style="word-wrap: break-word; max-width: 500px;">
											<span><?=$row['abstract']?></span>
										</td>
									</tr>
								<?php }?>
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
	</section>
</div>
