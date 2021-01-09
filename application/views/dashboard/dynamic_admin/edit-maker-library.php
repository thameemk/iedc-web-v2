<div class="page-content">

	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit Maker Library</li>
		</ol>
	</nav>

	<div class="row">
	    <?php if($this->session->userdata('user_type')=='S' ||$this->session->userdata('user_type')=='U') {?>
            <div style="max-width:100%;" class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-body">    
                    <?php if ($this->session->flashdata('fail')) : ?>
                            <span style="line-height:3" class="badge badge-danger"><?php echo $this->session->flashdata('fail'); ?></span>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <span style="line-height:3" class="badge badge-success"><?php echo $this->session->flashdata('success'); ?></span>
                        <?php endif; ?>                    
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Edit Component</h6>
                            <div class="dropdown mb-2">
                                <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">ID</th>
                                        <th class="pt-0">Component No</th>
                                        <th class="pt-0">Name</th>           
                                        <th class="pt-0">Total Count</th>                           
                                        <th class="pt-0">Available Count</th>                                           
                                        <th class="pt-0">Update</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($maker_components as $row) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <form id="updateComponent" action="<?=base_url()?>admin/updateComponent" method="POST">
                                                <td><?= $row['comp_num'] ?></td>
                                                <td><input name="comp_name" type="text" value="<?=$row['name'] ?>"></input></td>
                                                <td><input type="text" name="total_count" value="<?=$row['total_count'] ?>"></input></td>                                                
                                                <td><?= $row['available_count'] ?></td> 
                                                <input type="hidden" value="<?= $row['comp_num'] ?>" name="comp_num"></input>
                                                <td><input class="btn btn-primary" type="submit"></input></td>
                                               
                                            </form>
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

