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
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <?php foreach ($employees as $key => $value) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $value->employee_id ?></td>
                                            <td><?= $value->first_name ?></td>
                                            <td><?= $value->middle_name ?></td>
                                            <td><?= $value->last_name ?></td>
                                            <td><?= $value->birth_date ?></td>
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
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
