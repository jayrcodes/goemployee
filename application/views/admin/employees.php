<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/head.php'); ?>

    <!-- DataTables CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo asset_url(); ?>admin/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Bootstrap Datepicker -->
    <link href="<?php echo asset_url(); ?>admin/css/bootstrap-datepicker3.standalone.css" rel="stylesheet">
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
                            <form role="form" action="/employees" method="post" novalidate>

                            <?php if (isset($status)) { ?>
                            <?php if ($status == 'success') { ?>
                            <div class="alert alert-success" role="alert">
                                Employee successfully saved.
                            </div>
                            <?php } ?>
                            <?php if ($status == 'error') { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php foreach (json_decode($errors) as $key => $value) { ?>
                                <p><?= $value ?></p>
                                <?php }?>
                            </div>
                            <?php } ?>
                            <?php } ?>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Birth date</label>
                                            <input type="date" data-provide="datepicker" class="form-control" name="birthdate" placeholder="Birth date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input type="number" class="form-control" name="salary" placeholder="Salary">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row pull-right">
                                    <div class="col-lg-4">
                                        <button type="submi t" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                        <!-- /.panel-body-->
                    </div>
                    <!-- /.panel-->
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employee List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php if (isset($status)) { ?>
                            <?php if ($status == 'success_update') { ?>
                            <div class="alert alert-success" role="alert">
                                Employee successfully updated.
                            </div>
                            <?php } ?>
                            <?php if ($status == 'success_delete') { ?>
                            <div class="alert alert-success" role="alert">
                                Employee successfully removed.
                            </div>
                            <?php } ?>
                            <?php } ?>

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
                                            <th></th>
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
                                            <td>
                                                <a href="/employee/edit?emp_id=<?= $value->employee_id ?>" class="btn btn-success">Edit</a>
                                                <a href="/employee/delete?emp_id=<?= $value->employee_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove employee?')">Delete</a>
                                            </td>
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

        <!-- Bootstrap Datepicker -->
        <script src="<?php echo asset_url(); ?>admin/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
            });
        </script>

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
