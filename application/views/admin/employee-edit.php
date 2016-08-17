<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/head.php'); ?>

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
                            Edit Employee Details
                        </div>
                        <div class="panel-body">
                        <form role="form" action="<?= base_url(); ?>employee/update" method="post" novalidate>

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
                                            <input type="text" class="form-control" value="<?= $employee->first_name; ?>" name="firstname" placeholder="First Name" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" value="<?= $employee->middle_name ?>" name="middlename" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value="<?= $employee->last_name ?>" name="lastname" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Birth date</label>
                                            <input type="date" data-provide="datepicker" value="<?= $employee->birth_date ?>" class="form-control" name="birthdate" placeholder="Birth date">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="<?= $employee->address ?>" name="address" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Salary</label>
                                            <input type="number" value="<?= $employee->salary ?>" class="form-control" name="salary" placeholder="Salary">
                                            <input type="hidden" value="<?= $employee->employee_id ?>" name="employeeid">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row pull-right">
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                        <!-- /.panel-body-->
                    </div>
                    <!-- /.panel-->
                </div>
            </div>
            <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <?php $this->load->view('admin/includes/scripts.php'); ?>

        <!-- Bootstrap Datepicker -->
        <script src="<?php echo asset_url(); ?>admin/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">
            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
            });
        </script>

</body>
</html>
