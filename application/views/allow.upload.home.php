<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
require_once dirname(dirname(__DIR__)) . '/system/allowed.php'; // @todo bugfix
?>
<div class="row">
    <!-- Start: <?php echo __FILE__; ?> -->
    <article class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Allowed extensions</h3>
            </div>
            <div class="panel-body">
                <?php
                foreach ($ALLOWED_EXTENSIONS as $key => $ext) {
                    echo '<span class="btn btn-default btn-xs">' . $ext . '</span>';
                }
                ?>
            </div>
        </div>
    </article><!-- End: <?php echo __FILE__; ?> -->


    <!-- Start: <?php echo __FILE__; ?> -->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" style="color: #fefefe;">Browse files and upload</h3>
            </div>
            <div class="panel-body" style="padding-bottom: 0;">
                <form action="<?php echo MANAGER_CONTROLLERS; ?>upload.controller.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <span class="btn btn-default fileinput-button">
                                <i class="icon-plus icon-white"></i> <span>Browse files</span>
                                <input type="file" name="whistle-api-upload[]">
                            </span>
                            <button type="submit" class="btn btn-warning">
                                <i class="icon-upload-alt"></i> Upload
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="fum_session_token" value="<?php echo MANAGER_FORM_TOKEN; ?>">
                </form>
            </div>
        </div>
    </div><!-- End: <?php echo __FILE__; ?> -->
</div>
