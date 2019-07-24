<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Logout Modal-->
<div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('user/chgps/')?>" method="post">
                    Password Lama:<br>
                    <input type="password" name="passlama" value=""/><br>
                    Password Baru:<br>
                    <input type="password" name="passbaru" value=""/><br>
                    <br>
                    <div class="float-right">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-info" type="submit" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>