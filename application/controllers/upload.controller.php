<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 * @link        http://www.whistle-bg.tk/api.php Whistle APIv2 Code helps
 */
require_once dirname(dirname(__DIR__)) . '/config.php';

/**
 * MAIN REMOTE UPLOAD
 */
$sessionToken = normalize(getSession('session_token'), 'trim|string');
//Allowed File types: txt, png, jpe, jpeg, jpg, gif, bmp, pdf, doc, rtf, xls, ppt
//echo '<pre>' . print_r($_FILES, true) . '</pre>';
//echo '<pre>' . print_r($_SESSION, true) . '</pre>';
//exit;
if (issetMethod($_POST, 1) && matches($_POST['fum_session_token'], $sessionToken)) {
    /**
     * Valid upload file form submit
     */
    if ($_FILES['whistle-api-upload']['error'][0] == 0) {
        
        $FILE_BASENAME = strtolower($_FILES['whistle-api-upload']['name'][0]);
        $FILE_TMPNAME = $_FILES['whistle-api-upload']['tmp_name'][0];
        $FILE_INFO = mimeType($FILE_BASENAME);
        
        /**
         * Checks image extension from filename
         */
        if (!in_array($FILE_INFO[0], $ALLOWED_MIMETYPES) || !in_array($FILE_INFO[1], $ALLOWED_EXTENSIONS)) {
            // maybe @todo show error
            redirect(MANAGER_URI, true);
        }
        
        /**
         * Checks Filesize MAX: 5MB
         */
        if (gt(filesize($FILE_BASENAME), (5 * 1024 * 1024))) {
            redirect(MANAGER_URI, true);
        }
        
        /**
         * RENAME
         */
        $_NEW_BASENAME = time() . '_' . $FILE_BASENAME;
        
        
        /**
         * IF EXISTS - RENAME AGAIN
         */
        if (realpath(MANAGER_USERS . getSession('username') . DS . $_NEW_BASENAME) == true) {
            $_NEW_BASENAME = time() . rand(0, 9) . '_' . $_NEW_BASENAME;
        }
        
        if (move_uploaded_file($FILE_TMPNAME, MANAGER_USERS . getSession('username') . DS . $_NEW_BASENAME)) {
            //exit('ok');
        }
        
        redirect(MANAGER_URI, true);
        /**
         * Main Server Errors while uploading
         */
    } elseif ($_FILES['whistle-api-upload']['error'][0] == 1) {
        redirect(MANAGER_URI, true);
    } elseif ($_FILES['whistle-api-upload']['error'][0] == 3) {
        redirect(MANAGER_URI, true);
    } elseif ($_FILES['whistle-api-upload']['error'][0] == 7) {
        redirect(MANAGER_URI, true);
    } else {
        redirect(MANAGER_URI, true);
    }
}
