<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
/**
 * Check is user session
 */
if (issetMethod($_SESSION[MANAGER_SESS_NAME], MANAGER_SESS_VARS) && matchesStrict(getSession('isLogged'), true)) {
    
    ?>
    <!-- Start: <?php echo __FILE__;?> -->
    <div class="row">
        <?php
            display('info.home', true);
            display('resetpassword.home', true);
        ?>
    </div>
    <?php
    display('allow.upload.home', true);
    ?>
    <div class="row">
        <?php
        display('files.home', true);
        display('sidebar.index', true);
        ?>
    </div>
    <!-- End: <?php echo __FILE__;?> -->
    <?php
    /**
     * Below if not logged
     */
} else {
    redirect(MANAGER_URI, true);
}
