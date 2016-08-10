<?php $this->load->view('includes/header.php'); ?>

    <div class="container" style="margin-top: 200px;">
        <p>Here is the data:</p>
        <?php
            echo json_encode($this->session);
        ?>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo asset_url(); ?>js/jquery-1.12.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
</body>
</html>
