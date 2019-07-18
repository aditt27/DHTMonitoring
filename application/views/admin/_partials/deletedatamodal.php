<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Logout Modal-->
<div class="modal fade" id="deleteDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete <?php echo $this->uri->segment(2)?> Data?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seluruh data dari device <?php echo $this->uri->segment(2)?> akan hilang dan tidak bisa dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="button" onclick="location.href='<?php echo site_url('data/delete/') . $this->uri->segment(2)?>'" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>