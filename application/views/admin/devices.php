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

            <!-- Temperature Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-thermometer-empty"></i>
                            </div>
                            <div class="mr-5">Latest Temperature:</div>
                            <h1 class="mr-5"><?php echo $latest_data['suhu_data']?>°C</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left"><?php echo $latest_data['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-thermometer-empty"></i>
                            </div>
                            <div class="mr-5">Average Temperature:</div>
                            <h1 class="mr-5"><?php echo round(floatval($avg_temp['avg_temp']),2,PHP_ROUND_HALF_UP)?>°C</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left">&nbsp</span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-thermometer-empty"></i>
                            </div>
                            <div class="mr-5">Lowest Temperature:</div>
                            <h1 class="mr-5"><?php echo $min_temp['suhu_data']?>°C</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left"><?php echo $min_temp['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-thermometer-empty"></i>
                            </div>
                            <div class="mr-5">Highest Temperature:</div>
                            <h1 class="mr-5"><?php echo $max_temp['suhu_data']?>°C</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><?php echo $max_temp['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Humidity Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-water"></i>
                            </div>
                            <div class="mr-5">Latest Humidity:</div>
                            <h1 class="mr-5"><?php echo $latest_data['kelembaban_data']?>%</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left"><?php echo $latest_data['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-water"></i>
                            </div>
                            <div class="mr-5">Average Humidity:</div>
                            <h1 class="mr-5"><?php echo round(floatval($avg_humid['avg_humid']),2,PHP_ROUND_HALF_UP)?>%</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left">&nbsp</span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-water"></i>
                            </div>
                            <div class="mr-5">Lowest Humidity:</div>
                            <h1 class="mr-5"><?php echo $min_humid['kelembaban_data']?>%</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1">
                            <span class="float-left"><?php echo $min_humid['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-water"></i>
                            </div>
                            <div class="mr-5">Highest Humidity:</div>
                            <h1 class="mr-5"><?php echo $max_humid['kelembaban_data']?>%</h1>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left"><?php echo $max_humid['monitoring_date']?></span>
                            <span class="float-right">
				</span>
                        </a>
                    </div>
                </div>
            </div>

            <!--Line Chart-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-area"></i>
                    &nbsp <?php echo ucfirst($this->uri->segment(2))?> Line Chart</div>
                <div class="card-body">
                    <canvas id="LineChart" width="100%" height="30"></canvas>
                </div>
            </div>

            <!--DataTables-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    &nbsp <?php echo ucfirst($this->uri->segment(2))?> Monitoring Data Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal & Waktu</th>
                                <th>Suhu (°C)</th>
                                <th>Kelembaban (%)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($monitoring_data as $data) {
                                echo "<tr>";
                                    echo "<td>" . $data['monitoring_id'] . "</td>";
                                    echo "<td>" . $data['monitoring_date'] . "</td>";
                                    echo "<td>" . $data['suhu_data'] . "</td>";
                                    echo "<td>" . $data['kelembaban_data'] . "</td>";
                                echo "</tr>";
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if(isset($_SESSION['user']) && $_SESSION['admin']==true) { ?>
            <div class="card mb-3">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-wrench"></i>
                    &nbsp <?php echo ucfirst($this->uri->segment(2))?> Options
                </div>
                <div class="card-body">
                    <button type="button" onclick="location.href='<?php echo site_url('data/download/') . $this->uri->segment(2)?>'" class="btn btn-outline-success float-right btn-block">Download CSV File</button>
                    <button type="button" data-toggle="modal" data-target="#deleteDataModal" class="btn btn-outline-danger float-right btn-block">Delete <?php echo ucfirst($this->uri->segment(2))?> Device Data</button>
                    <button type="button" data-toggle="modal" data-target="#kalibrasiModal" class="btn btn-outline-info float-right btn-block">Kalibrasi Sensor <?php echo ucfirst($this->uri->segment(2))?></button>
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
<?php $this->load->view("admin/_partials/deletedatamodal.php") ?>
<?php $this->load->view("admin/_partials/kalibrasimodal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            "order": [[ 1, "desc" ]]
        } );
    } );

    //Input Spinner
    $("input[type='number']").inputSpinner();

    //Line Chart Script
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    var data = {
        labels: [<?php foreach ($monitoring_data as $data) { echo "\"" . $data['monitoring_date'] . "\",";}?>],
        datasets: [{
            label: "Suhu (°C)",
            backgroundColor: "rgba(2,117,216,0)",
            borderColor: "rgba(2,117,216,1)",
            pointBackgroundColor: "rgba(2,117,216,1)",
            data: [<?php foreach ($monitoring_data as $data) { echo "\"" . $data['suhu_data'] . "\",";}?>],
        }, {
            label: "Kelembaban (%)",
            backgroundColor: "rgba(240,10,10,0)",
            borderColor: "rgba(240,10,10,1)",
            pointBackgroundColor: "rgba(240,10,10,1)",
            data: [<?php foreach ($monitoring_data as $data) { echo "\"" . $data['kelembaban_data'] . "\",";}?>],
        }],
    };

    var ctx = document.getElementById("LineChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data,
    });
</script>

</body>
</html>