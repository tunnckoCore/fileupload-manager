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
            <h3 class="panel-title"><?php echo getSession('username_clean'); ?>'s Profile</h3>
        </div>
        <div class="panel-body" style="padding-bottom: 0;">
            <div class="form-horizontal">
                <div class="form-group">
                    <label  class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Username</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <span class="form-control"><?php echo getSession('username_clean'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Sign-Up</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <span class="form-control">before <?php echo timeAgoString(getSession('user_signup_date')); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-lg-2 col-md-2 col-sm-2 col-xs-2 control-label">Sign-In</label>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <span class="form-control"><?php echo timeAgoString(getSession('user_signin_date')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End: <?php echo __FILE__;?> -->
