        <div class="container">

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
                                <table width="100%" class="table table-striped table-bordered table-hover">
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
        <!-- /.container -->
