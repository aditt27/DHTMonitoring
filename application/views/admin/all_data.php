<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

            <!-- DataTables-->
            <div class="card mb-3">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-table"></i>
                    &nbsp All Device Monitoring Data Table</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Device ID</th>
                                <th>Tanggal & Waktu</th>
                                <th>Suhu (°C)</th>
                                <th>Kelembaban (%)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($monitoring_data as $data) {
                                echo "<tr>";
                                echo "<td>" . $data['monitoring_id'] . "</td>";
                                echo "<td>" . $data['device_id'] . "</td>";
                                echo "<td>" . $data['monitoring_date'] . "</td>";
                                echo "<td>" . $data['suhu_data'] . "</td>";
                                echo "<td>" . $data['kelembaban_data'] . "</td>";
                                echo "</tr>";
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
            <?php if(isset($_SESSION['user']) && $_SESSION['admin']==true) { ?>
            <div class="card mb-3">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-wrench"></i>
                    &nbsp Overview Options
                </div>
                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo site_url('download/all')?>'" class="btn btn-outline-success float-right btn-block">Download CSV file</button>
                </div>
            </div>
            <?php }?>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/changepassmodal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    } );
</script>

</body>
</html>