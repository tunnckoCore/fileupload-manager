<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
?>
<!-- Start: <?php echo __FILE__;?> -->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Reset My Password, after that sign-in again!</h3>
        </div>
        <div class="panel-body" style="padding-bottom: 0;">
            <form action="<?php echo MANAGER_CONTROLLERS;?>resetpassword.controller.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputOldPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Old</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" name="fum_old_password" class="form-control" id="inputOldPassword" placeholder="Old password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNewPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">New</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="password" name="fum_new_password" class="form-control" id="inputNewPassword" placeholder="New password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Confirm</label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <input type="password" name="fum_new_password_confirm" class="form-control" id="inputConfirmPassword" placeholder="Confirm new password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reset</button>
                </div>
                <input type="hidden" name="fum_session_token" value="<?php echo MANAGER_FORM_TOKEN; ?>">
                <?php

                if (issetMethod($_GET, 3) && matches($_GET['action'], 'resetpassword')) {
                    if ($_GET['response'] == 'error') {
                        $responseText = urldecode($_GET['msg']);
                        echo '<div class="form-group">
                            <label for="inputResetError" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Error</label>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <input type="text" name="fum_error" class="errs has-error form-control" id="inputResetError" value="'.$responseText.'" disabled>
                            </div>
                        </div>';
                    }
                }

                ?>
            </form>
        </div>
    </div>
</div><!-- End: <?php echo __FILE__;?> -->
