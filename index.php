<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
include __DIR__ . '/config.php';

/**
 * SignOut implementation
 */
if (issetMethod($_GET, 1) && matches($_GET['signout'], 'yes')) {
    session_start();
    session_destroy();
    header("Location: index.php");
    exit;
}

$_SESSION[MANAGER_SESS_NAME]['session_token'] = MANAGER_FORM_TOKEN;
$templateData = array();
$templateData['title'] = 'Welcome to ' . MANAGER_APP_NAME;

/**
 * Display index view
 * @see system/functions.php display();
 */
display('index.layout', false, $templateData);

//disk_free_space('/');
//echo formatSizeUnits(disk_total_space('/'));
