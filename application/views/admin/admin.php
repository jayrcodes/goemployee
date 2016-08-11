<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/includes/head.php'); ?>
</head>
<body>

    <div id="wrapper">

        <?php $this->load->view('admin/includes/nav.php'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('admin/includes/scripts.php'); ?>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo asset_url(); ?>admin/js/raphael-min.js"></script>
    <script src="<?php echo asset_url(); ?>admin/js/morris.min.js"></script>
    <script src="<?php echo asset_url(); ?>admin/js/morris-data.js"></script>

</body>

</html>
