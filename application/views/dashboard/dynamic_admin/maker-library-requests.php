<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Maker Library Users</li>
		</ol>
	</nav>

<section class="mt-5">
    <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
	<div class="row">
		<div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
			<div class="card">
				<div class="card-body">
                <?php if($this->session->flashdata('fail')): ?>
				<span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
				<?php endif; ?>
				<?php if($this->session->flashdata('success')): ?>
				<span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
				<?php endif; ?>
					<div class="d-flex justify-content-between align-items-baseline mb-2">
						<h6 class="card-title mb-0">Maker Library Users</h6>
						<div class="dropdown mb-2">
							<button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
							</button>
						</div>
					</div>
					<div class="table-responsive">
						<table  id="dataTableExample" class="table table-hover mb-0">
							<thead>
								<tr>
									<th class="pt-0">Id</th>
									<th class="pt-0">Name</th>
									<th class="pt-0">Email</th>
									<th class="pt-0">Phone</th>
									<th class="pt-0">Branch</th>
									<th class="pt-0">Year</th>
                                    <th class="pt-0">Component</th>                                    
                                    <th class="pt-0">Request Date</th>
                                    <th class="pt-0">Issued Date</th>
                                    <th class="pt-0">Return Date</th>
                                    <th class="pt-0">Issued/Return Admin</th>																		
								</tr>
							</thead>
							<tbody>
								<?php foreach ($maker_req as $row ){?>
								<tr>
								    <td><?=$row['id']?></td>					
									<td><?=$row['fullname']?></td>
									<td><a href="mailto:<?=$row['user_email']?>"><?=$row['user_email']?></a></td>
									<td><a href="tel:<?=$row['phone']?>"><?=$row['phone']?></a></td>
									<td><?=$row['branch']?></td>
									<td><?=$row['course_duration_from']?> - <?=$row['course_duration_to']?> </td>
									<td><?=$row['name']?> - <?=$row['req_component']?></td>
									<td><?=$row['req_date']?></td>
									<?php if($row['issue_date']!=""){?>
									    <td><?=$row['issue_date']?></td>
									<?php } else{ ?>
									<td>
                                        <form action="<?=base_url("admin/issue_component")?>" method="post">
                                            <input type="hidden" name="req_date" value="<?=$row['req_date']?>">       
										    <input type="hidden" name="req_component" value="<?=$row['req_component']?>">
										    <input type="hidden" name="user_email" value="<?=$row['user_email']?>">
										    <button type="submit" class="badge badge-danger">Issue</button>
	                                    </form>
                                    </td>
									<?php }?>
									<?php if($row['return_date']!=""){?>
									    <td><?=$row['return_date']?></td>
									<?php } else{ ?>
								    <td>
										<form action="<?=base_url("admin/mark_as_return_component")?>" method="post">
                                            <input type="hidden" name="issue_date" value="<?=$row['issue_date']?>">       
										    <input type="hidden" name="req_component" value="<?=$row['req_component']?>">
										    <input type="hidden" name="user_email" value="<?=$row['user_email']?>">
										    <button type="submit" class="badge badge-danger">Return</button>
	                                    </form>
									</td>
									<?php }?>
									<td><?=$row['issued_admin']?></td>									
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
</section>
</div>
