<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */

/**
 * Check isset and counting results in array
 * @param array $method - $_POST, $_GET, $_SESSION or etc.
 * @param int $num number of parameters
 * @return boolean true|false
 */
function issetMethod($method, $num)
{
    if (is_array($method) && $num && $num >= 1) {
        if (isset($method) && count($method) == $num) {
            return true;
        }
    }
    if (!$num) {
       if (isset($method)) {
            return true;
        }
    }
    return false;
}

/**
 * Rendering default layout structure
 * @param string $template Required. Template to render
 * @oaran array $templateData (otional) - template data array - ex. templateData['title']
 * @param boolean $single (optional) true - single preview of template. false - with header and footer
 * @param boolean $return (optional) true - return as string, false - echo to browser
 * @return string
 */
function display($template, $single = false, $templateData = false, $return = false)
{
    if (!$template) {
        exit('First and second param are required');
    }
    // Here we have title & template 100%;
    ob_start();
    if (!$single) {
        require_once MANAGER_VIEWS . 'header.php';
        require MANAGER_VIEWS . $template . '.php';
        require_once MANAGER_VIEWS . 'footer.php';
    } else {
        require MANAGER_VIEWS . $template . '.php';
    }
    $content = ob_get_clean();
    
    // Template for email or ... ?
    if ($return) {
        return normalize($content, 'trim|string');
    }
    echo normalize($content, 'trim|string');
}

/**
 * Get full uri
 * @param boolean $return (optional) false - return Uri, true - print Uri
 * @return string
 */
function getUri($return = false)
{
    $https = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    
    $uri = 'http' . $https . '://' . $_SERVER['SERVER_NAME'] . str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    if (!$return) {
        return normalize($uri, 'trim|string');
    } else {
        echo normalize($uri, 'trim|string');
    }
}

/**
 * Get stylesheet uri
 * @param boolean $return (optional) false - return Uri, true - print Uri
 * @return string
 */
function getStyle($return = false)
{
    $uri = getUri() . MANAGER_STYLE;
    if (!$return) {
        return normalize($uri, 'trim|string') . '?'. MANAGER_ANTI_CACHE;
    }
    echo normalize($uri, 'trim|string') . '?'. MANAGER_ANTI_CACHE;
}

/**
 * Redirect to root Uri if $relative not passed, else to full uri + $relative
 * @param string|null $relative (optional) Relative path to redirect to
 */
function redirect($relative, $isRemote = false)
{
    if ($isRemote) {
        header("Location: ". $relative);
        exit;
    } else {
        $https = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
        $uri = 'http' . $https . '://' . $_SERVER['SERVER_NAME'];
        header("Location: ".$uri.MANAGER_SITEPATH.$relative);
        exit;
    }
    
    
    
}

/**
 * Shortcut to response redirects
 * @param string $text
 * @param string $action
 * @param string $response
 * @return void
 */
function sendProcessResponse($text, $action = 'signin', $response = 'error')
{
    redirect(MANAGER_URI . 'index.php?action='.$action.'&response='.$response.'&msg=' . urlencode($text), true);
}

function getSession($value)
{
    return $_SESSION[MANAGER_SESS_NAME][$value];
}

function setSession($key, $value)
{
    return $_SESSION[MANAGER_SESS_NAME][$key] = $value;
}

/**
 * Generates links for settings controller
 * @param string $type
 * @param string $filename
 * @return string
 */
function settingsLink($type, $filename)
{
    return MANAGER_CONTROLLERS . 'settings.controller.php?action='.$type.'&username=' . getSession('username') . '&basename=' . $filename;
}