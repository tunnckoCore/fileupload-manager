<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
require_once dirname(dirname(__DIR__)) . '/config.php';

/**
 * Settings: Download File
 */
if (issetMethod($_GET, 3) && matches((string)$_GET['action'], 'download') && matches($_GET['username'], getSession('username'))) {
    $file = realpath(MANAGER_USERS . getSession('username') . DS . $_GET['basename']);
    
    /**
     * redirect to index - if file not exist or realpath returns false
     * redirect to index - if in filename have ./
     * redirect to index - if filename is user-password file
     */
    if (!$file || stripos($file, "./") !== false || matches($_GET['basename'], getSession('user_unique_id') . '.pwd')) {
        redirect(MANAGER_URI, true);
    }
    downloadFile($file);
    exit;
}
/**
 * Settings: Delete File
 */
if (issetMethod($_GET, 3) && matches((string)$_GET['action'], 'delete') && matches($_GET['username'], getSession('username'))) {
    $file = realpath(MANAGER_USERS . getSession('username') . DS . $_GET['basename']);
    
    /**
     * redirect to index - if not exist or realpath returns false
     * redirect to index - if in filename have ./
     * redirect to index - if filename is user-password file
     */
    if (!$file || stripos($file, "./") !== false || matches($_GET['basename'], getSession('user_unique_id') . '.pwd')) {
        redirect(MANAGER_URI, true);
    }
    unlink($file);
    redirect(MANAGER_URI, true);
}
