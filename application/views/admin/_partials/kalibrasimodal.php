<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Logout Modal-->
<div class="modal fade" id="kalibrasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kalibrasi <?php echo $this->uri->segment(2)?> Device</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('data/calibrate/') . $this->uri->segment(2)?>" method="post">
                    <input name="device_id" type="hidden" value="<?php echo $this->uri->segment(2)?>">
                    Suhu:<br>
                    <input type="number" name="suhu" value="<?php echo $calibrate_data['suhu_kalibrasi']?>" min="-100" max="100" step="0.01" data-decimals="2" data-suffix="°C"/><br>
                    Kelembaban:<br>
                    <input type="number" name="kelembaban" value="<?php echo $calibrate_data['kelembaban_kalibrasi']?>" min="-100" max="100" step="0.01" data-decimals="2" data-suffix="%"/><br>
                    Kalibrasi terakhir: <a><?php echo $calibrate_data['tanggal_perubahan']?></a> <br>
                    <div class="float-right">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-success" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>