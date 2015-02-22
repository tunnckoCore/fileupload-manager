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
$sessionToken = normalize($_SESSION[MANAGER_SESS_NAME]['session_token'], 'trim|string');

if (issetMethod($_SESSION[MANAGER_SESS_NAME], MANAGER_SESS_VARS) && matchesStrict(getSession('isLogged'), true)) {
    if ((issetMethod($_POST, 4) || issetMethod($_POST, 5)) && matches($_POST['fum_session_token'], $sessionToken)) {
        /**
         * Normalize
         */
        $fumOldPassword = normalize($_POST['fum_old_password'], 'trim|string|html');
        $fumNewPassword = normalize($_POST['fum_new_password'], 'trim|string|html');
        $fumConfirmNew = normalize($_POST['fum_new_password_confirm'], 'trim|string|html');

        /**
         * Validation
         */
        if ((!minlength($fumOldPassword, 3) || !minlength($fumOldPassword, 3)) || (!minlength($fumNewPassword, 3) || !minlength($fumNewPassword, 3))) {
            sendProcessResponse('Old or New password is too short; must be >= 3', 'resetpassword');
        }
        if (!matchesStrict($fumConfirmNew, $fumNewPassword)) {
            sendProcessResponse('Passwords not match.', 'resetpassword');
        }
        if (matches($fumOldPassword, $fumConfirmNew) || matches($fumOldPassword, $fumNewPassword)) {
            sendProcessResponse('Old and New password must be different.', 'resetpassword');
        }
        if (matches(getSession('username'), $fumConfirmNew)) {
            sendProcessResponse('Username and New password must be different.', 'resetpassword');
        }
        /**
         * Custom Staff
         */
        $oldPasswordHash = tds5api($fumOldPassword);
        $oldPasswordSess = getSession('user_unique_id');
        $newPasswordHash = tds5api($fumConfirmNew);

        $userFolder = MANAGER_USERS . getSession('username');
        $realUser = realpath($userFolder);

        if (!matchesStrict($oldPasswordSess, $oldPasswordHash)) {
            sendProcessResponse('Wrong old password.', 'resetpassword');
        }

        /**
         * If all is OK unlink old password
         * and set new password
         */
        $userPasswordFile = $userFolder . DS . $oldPasswordSess . '.pwd'; //generate name of old password file
        $newPasswordFile = $userFolder . DS . $newPasswordHash . '.pwd'; //generate name of new password file

        /**
         * if password file and user dir exists
         * renew password file
         */
        if ($realUser || is_dir($userFolder) || is_file($userPasswordFile)) {
            unlink($userPasswordFile); //unlink old password
            touch($newPasswordFile); //create new password file
            chmod_R($userFolder, 0444, 0777); //reset permissions
            //force logout user
            redirect(MANAGER_URI . 'index.php?signout=yes', true);
        }
    } else {
        redirect(MANAGER_URI, true);
    }
} else {
    //else redirect to index if not logged
    redirect(MANAGER_URI, true);
}
