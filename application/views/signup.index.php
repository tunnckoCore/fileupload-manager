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
            <h3 class="panel-title">Sign-Up to <?php echo MANAGER_APP_NAME; ?></h3>
        </div>
        <div class="panel-body" style="padding-bottom: 0;">
            <form action="<?php echo MANAGER_CONTROLLERS;?>signup.controller.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputSignUpUsername" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Username</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" name="fum_username" class="form-control" id="inputSignUpUsername" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSignUpPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Password</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="password" name="fum_password" class="form-control" id="inputSignUpPassword" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Confirm</label>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <input type="password" name="fum_password_confirm" class="form-control" id="inputConfirmPassword" placeholder="Confirm password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign-Up</button>
                </div>
                <input type="hidden" name="fum_session_token" value="<?php echo MANAGER_FORM_TOKEN; ?>">
                <?php

                if (issetMethod($_GET, 3) && matches($_GET['action'], 'signup')) {
                    if ($_GET['response'] == 'error') {
                        $responseText = urldecode($_GET['msg']);
                        echo '<div class="form-group">
                            <label for="inputSignUpError" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Error</label>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <input type="text" name="fum_error" class="errs has-error form-control" id="inputSignUpError" value="'.$responseText.'" disabled>
                            </div>
                        </div>';
                    }
                }

                ?>
            </form>
        </div>
    </div>
</div><!-- End: <?php echo __FILE__;?> -->
