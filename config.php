<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
session_start();
mb_internal_encoding('UTF-8');
// error_reporting(E_ALL ^ E_NOTICE); //without notices

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Define project constants
 */
define('MANAGER_URI', 'http://www.charlike.pw/telerik/FileUpload-Manager/'); //site uri is required
//define('MANAGER_URI', 'http://telerik/fileupload-manager-last/'); //site uri is required

define('DS', DIRECTORY_SEPARATOR);
define('MANAGER_ROOT', __DIR__ . DS);
define('MANAGER_APP', MANAGER_ROOT . 'application' . DS);
define('MANAGER_USERS', MANAGER_APP . 'members' . DS);
define('MANAGER_VIEWS', MANAGER_APP . 'views' . DS);
define('MANAGER_DB', MANAGER_APP . 'db' . DS);
define('MANAGER_STYLE', 'global.css');
define('MANAGER_ANTI_CACHE', time());

define('MANAGER_SESS_NAME', 'FUM');
define('MANAGER_SESS_VARS', 8);
define('MANAGER_APP_NAME', 'File Upload Manager');
define('MANAGER_HEADING', 'Welcome to ' . MANAGER_APP_NAME);
define('MANAGER_LAST_X_USERS', 5); //how much users to show in sidebar

define('MANAGER_OWNER_ACCOUNT', 'user');
define('MANAGER_OWNER_PASSWORD', 'qwerty');

define('MANAGER_FORM_TOKEN', sha1(uniqid()));
define('MANAGER_SITEPATH', str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']));
define('MANAGER_CONTROLLERS', MANAGER_URI . 'application/controllers/');
/**
 * Check users directory is writable
 * before initialize system
 */
if (!is_writable(MANAGER_USERS)) {
    exit('Directory "' . MANAGER_USERS . '" must be writable or not exists!');
}
if (!defined('MANAGER_URI')) {
    exit('Set website uri address. Example http://example.com/');
}
/**
 * Initialize library and most used functions
 */
require_once MANAGER_ROOT . 'system/library.php';
require_once MANAGER_ROOT . 'system/functions.php';

/**
 * FileUpload Allowed mimetypes/extensions
 * @see MANAGER_ROOT /system/allowed.php
 * if change here, change and there
 * (!) shit bug by templates or require_once (!)
 */
$ALLOWED_MIMETYPES = array(
    "image/jpeg",
    "image/png",
    "image/gif",
    "image/svg+xml",
    "image/vnd.wap.wbmp",
    "application/msword",
    "application/msexcel",
    "application/pdf",
    "application/x-tar",
    "application/xslt+xml",
    "application/xml",
    "application/zip",
    "audio/mpeg",
    "audio/x-mpegurl",
    "audio/x-wav", 
    "image/bmp",
    "text/css",
    "text/rtf",
    "text/plain",
    "video/x-msvideo",
    "video/x-sgi-movie",
    "application/force-download",
    "application/octet-stream"
);
$ALLOWED_EXTENSIONS = array(
    "jpe", "jpg", "jpeg", "gif", "png",
    "mpeg", "mpg", "mpe", "mov", "svg",
    "bmp", "pdf", "doc", "rtf", "ppt",
    "rar", "zip", "txt", "wbmp", "avi",
    "movie", "m3u", "m4u", "wav", "tar",
    "xls", "xsl", "psd", "xslt", "xml",
    "css"
);
