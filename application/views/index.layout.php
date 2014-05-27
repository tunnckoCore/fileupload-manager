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
    
    /**
     * Check exsits user-password file and user-db file
     */
    if (!(realpath(MANAGER_USERS . getSession('username') . DS . getSession('user_unique_id') . '.pwd')) ||
        !(realpath(MANAGER_DB . getSession('username') . '.usr'))) {
        
        //delete user files: user-password and user-db
        unlink(MANAGER_USERS . getSession('username') . DS . getSession('user_unique_id') . '.pwd');
        rmdir(MANAGER_USERS . getSession('username'));
        unlink(MANAGER_DB . getSession('username') . '.usr');
        redirect(MANAGER_URI.'index.php?signout=yes', true);
    }
    display('home.layout', true);
    /**
     * Below if not logged
     */
} else {
    ?>
    <!-- Start: <?php echo __FILE__;?> -->
    <div class="row">
        <?php
        display('signin.index', true);
        display('signup.index', true);
        ?>
    </div>
    <div class="row">
        <?php
        display('articles.index', true);
        display('sidebar.index', true);
        ?>
    </div>
    <!-- End: <?php echo __FILE__;?> -->
    <?php
}
