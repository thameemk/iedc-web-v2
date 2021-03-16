<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Execom Registration</li>
        </ol>
    </nav>

    <section class="mt-5">
        <?php if($this->session->userdata('user_type')=='super_admin' ||$this->session->userdata('user_type')=='admin') {?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Execom Registration</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th class="pt-0">Sl No</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">Email</th>
                                        <th class="pt-0">Phone</th>
                                        <th class="pt-0">Branch</th>
                                        <th class="pt-0">Year</th>
                                        <th class="pt-0">Admission Number</th>
                                        <th class="pt-0">Position 1</th>
                                        <th class="pt-0">Position 2</th>
                                        <th class="pt-0">Cover Letter Link</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($execom_reg as $row) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                                            <td><a href="tel:<?= $row['phone'] ?>"><?= $row['phone'] ?></a></td>
                                            <td><?= $row['branch'] ?></td>
                                            <td><?= $row['year'] ?></td>
                                            <td><?= $row['admission_number'] ?></td>
                                            <td><?= $row['position_1'] ?></td>
                                            <td><?= $row['position_2'] ?></td>
                                            <?php
                                                $coverletter = $row['coverletter'];
                                                // $file = file_get_contents($coverletter); // to get file
                                                $name = basename($coverletter); // to get file name
                                                $ext = pathinfo($coverletter, PATHINFO_EXTENSION); // to get extension
                                                $name2 = pathinfo($coverletter, PATHINFO_FILENAME); //file name without extension
                                            ?>
                                            <td><a href="<?=$row['coverletter']?>" target="_blank"><?php echo $name2.".".$ext; ?></a></td>
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
    </section>
</div>