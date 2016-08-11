<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/head.php'); ?>

    <!-- DataTables CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/dataTables.responsive.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">

        <?php $this->load->view('admin/includes/nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Employees</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Employee
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input with Placeholder</label>
                                            <input class="form-control" placeholder="Enter text">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employee List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-employees">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Birthdate</th>
                                            <th>Address</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($employees as $key => $value) {

                                            $birthdate = strtotime($value->birth_date);
                                            $birthdate = date('M j, Y', $birthdate);
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?= $value->employee_id ?></td>
                                                <td><?= $value->first_name ?></td>
                                                <td><?= $value->middle_name ?></td>
                                                <td><?= $value->last_name ?></td>
                                                <td><?= $birthdate ?></td>
                                                <td><?= $value->address ?></td>
                                                <td><?= $value->salary ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php $this->load->view('admin/includes/scripts.php'); ?>

        <!-- DataTables JavaScript -->
        <script src="<?php echo asset_url(); ?>admin/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo asset_url(); ?>admin/js/dataTables.bootstrap.min.js"></script>
        <script src="<?php echo asset_url(); ?>admin/js/dataTables.responsive.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-employees').DataTable({
                responsive: true
            });
        });
        </script>

    </body>

    </html>
