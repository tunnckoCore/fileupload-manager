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
            <h3 class="panel-title">Sign-In to <?php echo MANAGER_APP_NAME; ?></h3>
        </div>
        <div class="panel-body" style="padding-bottom: 0;">
            <form action="<?php echo MANAGER_CONTROLLERS;?>signin.controller.php" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputUsername" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Username</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="text" name="fum_username" class="form-control" id="inputUsername" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Password</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <input type="password" name="fum_password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <button type="submit" class="btn btn-primary"><i class="icon-signin"></i> Sign-In</button>
                        <!-- <a class="btn btn-warning" href="remindpassword.php" title="Remind My Password"><i class="icon-refresh"></i> Remind Password</a>-->
                    </div>
                </div>
                <input type="hidden" name="fum_session_token" value="<?php echo MANAGER_FORM_TOKEN; ?>">
                <?php

                if (issetMethod($_GET, 3) && matches($_GET['action'], 'signin')) {
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
