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

if ((issetMethod($_POST, 4) || issetMethod($_POST, 5)) && matches($_POST['fum_session_token'], $sessionToken)) {
    /**
     * Normalize
     */
    $fumUsername = normalize($_POST['fum_username'], 'trim|string|html|slashes');
    $fumPassword = normalize($_POST['fum_password'], 'trim|string|html');
    $fumConfirme = normalize($_POST['fum_password_confirm'], 'trim|string|html');

    /**
     * Validation
     */
    if (!minlength($fumUsername, 3) || !minlength($fumPassword, 3)) {
        sendProcessResponse('Username or password is too short; must be >= 3', 'signup');
    }
    if (!maxlength($fumUsername, 30)) {
        sendProcessResponse('Username is too long; must be <= 30', 'signup');
    }
    if (!matches($fumConfirme, $fumPassword)) {
        sendProcessResponse('Passwords not match.', 'signup');
    }
    if (matches($fumUsername, $fumConfirme)) {
        sendProcessResponse('Username and password must be different.', 'signup');
    }
    /**
     * Custom Stuff
     */
    $normalizedUsername = str_replace(" ", "-", $fumUsername);
    $userFolder = MANAGER_USERS . $normalizedUsername;
    $dbFolder = MANAGER_DB . $normalizedUsername;
    $realUser = realpath($userFolder);
    $userPassword = tds5api($fumPassword); //custom own hash algo
    $userPasswordFile = $userPassword . '.pwd';

    /**
     * Check exists user dir or user password file, or realpath returns true
     */
    if ($realUser || is_dir($userFolder) || is_file($userFolder . DS . $userPasswordFile)) {
        //user exists
        sendProcessResponse('Username `' . $fumUsername . '` already exists.', 'signup');
    } else {
        //create user
        mkdir($userFolder); //create user-folder
        touch($dbFolder . '.usr'); //create user-file in dbfolder
        touch($userFolder . DS . $userPasswordFile); //create user-password file
        chmod_R($userFolder, 0444, 0777); //reset permissions

        setSession('isLogged', true);
        setSession('username', $normalizedUsername);
        setSession('username_clean', $fumUsername);
        setSession('username_token', $sessionToken);
        setSession('user_unique_id', $userPassword);
        setSession('user_signup_date', filectime($dbFolder . '.usr')); //date registered
        setSession('user_signin_date', time()); //date logged in
        redirect(MANAGER_URI, true);
    }
}

/**
 * check if user is logged
 */
if (!issetMethod($_SESSION[MANAGER_SESS_NAME], 5) && !matchesStrict($_SESSION[MANAGER_SESS_NAME]['isLogged'], true)) {
    setSession('session_token', MANAGER_FORM_TOKEN);
    $templateData = array();
    $templateData['title'] = 'Please, sign-in to ' . MANAGER_APP_NAME;


    /**
     * Display index view
     * @see system/functions.php display();
     */
    display('signin.index', false, $templateData);
} else {
    redirect(MANAGER_URI, true);
}
