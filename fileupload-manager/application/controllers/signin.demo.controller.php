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
 * Server-side Sign-In (Login) Implementation
 */
/**
 * Check isset $_POST and is count() of it is 3 (username, password, form sess token inputs)
 * or count($_POST) == 4 when have error and form is submitted
 * Check matching of $_POST session token and $_SESSION session token
 */
$sessionToken = normalize(getSession('session_token'), 'trim|string');

/**
 * Normalize
 */
$fumUsername = normalize(MANAGER_OWNER_ACCOUNT, 'trim|string|html|slashes');
$fumPassword = normalize(MANAGER_OWNER_PASSWORD, 'trim|string|html');

/**
 * Validation
 */
if (!minlength($fumUsername, 3) || !minlength($fumPassword, 3)) {
    /**
     * @see MANAGER_ROOT/system/function.php
     */
    sendProcessResponse('Username or password are too short; must be >= 3');
}
if (!maxlength($fumUsername, 21)) {
    sendProcessResponse('Username is too long; must be <= 21');
}
if (matches($fumUsername, $fumPassword)) {
    sendProcessResponse('Username and password must be different.');
}
/**
 * Custom Stuff
 */
$normalizedUsername = str_replace(" ", "-", $fumUsername);
$userFolder = MANAGER_USERS . $normalizedUsername;
$realUser = realpath($userFolder);
$userPassword = tds5api($fumPassword); //custom own hash algo
$userPasswordFile = $userPassword . '.pwd';

/**
 * Check exists user dir and userpassword file, and is realpath returns true
 */
if ($realUser && is_dir($userFolder) && is_file($userFolder . DS . $userPasswordFile)) {
    //login to system
    setSession('isLogged', true);
    setSession('username', $normalizedUsername);
    setSession('username_clean', $fumUsername);
    setSession('username_token', $sessionToken);
    setSession('user_unique_id', $userPassword);
    setSession('user_signup_date', filectime(MANAGER_DB . $normalizedUsername . '.usr')); //date registered
    setSession('user_signin_date', time()); //date logged in
    redirect(MANAGER_URI, true);
} else {
    sendProcessResponse('Username `' . $fumUsername . '` not exists or wrong password.');
}
