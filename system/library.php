<?php
/**
 * FileUpload Manager
 * @author      Charlike Mike Reagent <https://github.com/tunnckoCore>
 * @license     MIT License <http://opensource.org/licenses/MIT>
 * @link        https://github.com/tunnckoCore/FileUpload-Manager
 * @link        http://www.charlike.pw/fileupload-manager/
 */
/**
 * Looks up the MIME-Type for the passed filename
 * @param string $strFilename
 * @return array[type, suffix]
 */
function mimeType($strFilename)
{
    $arrMime = array();

    $arrMime["doc"] = array("application/msword", "doc");
    $arrMime["xls"] = array("application/msexcel", "xls");
    $arrMime["bin"] = array("application/octet-stream", "bin");
    $arrMime["dms"] = array("application/octet-stream", "dms");
    $arrMime["lha"] = array("application/octet-stream", "lha");
    $arrMime["lzh"] = array("application/octet-stream", "lzh");
    $arrMime["exe"] = array("application/octet-stream", "exe");
    $arrMime["class"] = array("application/octet-stream", "class");
    $arrMime["so"] = array("application/octet-stream", "so");
    $arrMime["dll"] = array("application/octet-stream", "dll");
    $arrMime["dmg"] = array("application/octet-stream", "dmg");
    $arrMime["oda"] = array("application/oda", "oda");
    $arrMime["ogg"] = array("application/ogg", "ogg");
    $arrMime["pdf"] = array("application/pdf", "pdf");
    $arrMime["ai"] = array("application/postscript", "ai");
    $arrMime["eps"] = array("application/postscript", "eps");
    $arrMime["ps"] = array("application/postscript", "ps");
    $arrMime["rdf"] = array("application/rdf+xml", "rdf");
    $arrMime["vxml"] = array("application/voicexml+xml", "vxml");
    $arrMime["vcd"] = array("application/x-cdlink", "vcd");
    $arrMime["dcr"] = array("application/x-director", "dcr");
    $arrMime["dir"] = array("application/x-director", "dir");
    $arrMime["dxr"] = array("application/x-director", "dxr");
    $arrMime["dvi"] = array("application/x-dvi", "dvi");
    $arrMime["js"] = array("application/x-javascript", "js");
    $arrMime["latex"] = array("application/x-latex", "latex");
    $arrMime["swf"] = array("application/x-shockwave-flash", "swf");
    $arrMime["sit"] = array("application/x-stuffit", "sit");
    $arrMime["tar"] = array("application/x-tar", "tar");
    $arrMime["tcl"] = array("application/x-tcl", "tcl");
    $arrMime["tex"] = array("application/x-tex", "tex");
    $arrMime["texinfo"] = array("application/x-texinfo", "texinfo");
    $arrMime["texi"] = array("application/x-texinfo", "texi");
    $arrMime["xhtml"] = array("application/xhtml+xml", "xhtml");
    $arrMime["xht"] = array("application/xhtml+xml", "xht");
    $arrMime["xslt"] = array("application/xslt+xml", "xslt");
    $arrMime["xml"] = array("application/xml", "xml");
    $arrMime["xsl"] = array("application/xml", "xsl");
    $arrMime["dtd"] = array("application/xml-dtd", "dtd");
    $arrMime["zip"] = array("application/zip", "zip");
    $arrMime["mid"] = array("audio/midi", "mid");
    $arrMime["midi"] = array("audio/midi", "midi");
    $arrMime["kar"] = array("audio/midi", "kar");
    $arrMime["mpga"] = array("audio/mpeg", "mpga");
    $arrMime["mp2"] = array("audio/mpeg", "mp2");
    $arrMime["mp3"] = array("audio/mpeg", "mp3");
    $arrMime["aif"] = array("audio/x-aiff", "aif");
    $arrMime["aiff"] = array("audio/x-aiff", "aiff");
    $arrMime["aifc"] = array("audio/x-aiff", "aifc");
    $arrMime["m3u"] = array("audio/x-mpegurl", "m3u");
    $arrMime["ram"] = array("audio/x-pn-realaudio", "ram");
    $arrMime["ra"] = array("audio/x-pn-realaudio", "ra");
    $arrMime["rm"] = array("application/vnd.rn-realmedia", "rm");
    $arrMime["wav"] = array("audio/x-wav", "wav");
    $arrMime["bmp"] = array("image/bmp", "bmp");
    $arrMime["cgm"] = array("image/cgm", "cgm");
    $arrMime["gif"] = array("image/gif", "gif");
    $arrMime["ief"] = array("image/ief", "ief");
    $arrMime["jpeg"] = array("image/jpeg", "jpeg");
    $arrMime["jpg"] = array("image/jpeg", "jpg");
    $arrMime["jpe"] = array("image/jpeg", "jpe");
    $arrMime["png"] = array("image/png", "png");
    $arrMime["svg"] = array("image/svg+xml", "svg");
    $arrMime["tiff"] = array("image/tiff", "tiff");
    $arrMime["tif"] = array("image/tiff", "tif");
    $arrMime["djvu"] = array("image/vnd.djvu", "djvu");
    $arrMime["djv"] = array("image/vnd.djvu", "djv");
    $arrMime["wbmp"] = array("image/vnd.wap.wbmp", "wbmp");
    $arrMime["pnm"] = array("image/x-portable-anymap", "pnm");
    $arrMime["pbm"] = array("image/x-portable-bitmap", "pbm");
    $arrMime["pgm"] = array("image/x-portable-graymap", "pgm");
    $arrMime["ppm"] = array("image/x-portable-pixmap", "ppm");
    $arrMime["rgb"] = array("image/x-rgb", "rgb");
    $arrMime["xbm"] = array("image/x-xbitmap", "xbm");
    $arrMime["xpm"] = array("image/x-xpixmap", "xpm");
    $arrMime["xwd"] = array("image/x-xwindowdump", "xwd");
    $arrMime["ics"] = array("text/calendar", "ics");
    $arrMime["ifb"] = array("text/calendar", "ifb");
    $arrMime["css"] = array("text/css", "css");
    $arrMime["html"] = array("text/html", "html");
    $arrMime["htm"] = array("text/html", "htm");
    $arrMime["asc"] = array("text/plain", "asc");
    $arrMime["txt"] = array("text/plain", "txt");
    $arrMime["php"] = array("text/php", "php");
    $arrMime["rtx"] = array("text/richtext", "rtx");
    $arrMime["rtf"] = array("text/rtf", "rtf");
    $arrMime["sgml"] = array("text/sgml", "sgml");
    $arrMime["sgm"] = array("text/sgml", "sgm");
    $arrMime["tsv"] = array("text/tab-separated-values", "tsv");
    $arrMime["wml"] = array("text/vnd.wap.wml", "wml");
    $arrMime["wmls"] = array("text/vnd.wap.wmlscript", "wmls");
    $arrMime["etx"] = array("text/x-setext", "etx");
    $arrMime["mpeg"] = array("video/mpeg", "mpeg");
    $arrMime["mpg"] = array("video/mpeg", "mpg");
    $arrMime["mpe"] = array("video/mpeg", "mpe");
    $arrMime["qt"] = array("video/quicktime", "qt");
    $arrMime["mov"] = array("video/quicktime", "mov");
    $arrMime["mxu"] = array("video/vnd.mpegurl", "mxu");
    $arrMime["m4u"] = array("video/vnd.mpegurl", "m4u");
    $arrMime["avi"] = array("video/x-msvideo", "avi");
    $arrMime["movie"] = array("video/x-sgi-movie", "movie");

    $arrMime["default"] = array("application/force-download", "");

    //Determing the type
    $strType = "";
    if (strpos($strFilename, ".") !== false) {
        $strType = substr($strFilename, strrpos($strFilename, ".") + 1);
    } else {
        $strType = $strFilename;
    }

    $strType = strtolower($strType);

    //Known Type?
    if (isset($arrMime[$strType])) {
        $arrReturn = $arrMime[$strType];
    } else {
        $arrReturn = $arrMime["default"];
        $arrReturn[1] = $strType;
    }

    return $arrReturn;
}

/**
 * Get time interval between
 * @param int $later
 * @param int $earlier
 * @return array
 */
function getTimeInterval($later, $earlier)
{

    $diff = $later - $earlier;

    $one_second = 1;
    $one_minute = $one_second * 60;
    $one_hour = $one_minute * 60;
    $one_day = $one_hour * 24;
    $one_week = $one_day * 7;
    $one_month = $one_day * 30;
    $one_year = $one_day * 365;

    $ago = array();

    $ago['year'] = floor($diff / $one_year);
    $diff -= $ago['year'] * $one_year;
    $ago['month'] = floor($diff / $one_month);
    $diff -= $ago['month'] * $one_month;
    $ago['week'] = floor($diff / $one_week);
    $diff -= $ago['week'] * $one_week;
    $ago['day'] = floor($diff / $one_day);
    $diff -= $ago['day'] * $one_day;
    $ago['hour'] = floor($diff / $one_hour);
    $diff -= $ago['hour'] * $one_hour;
    $ago['minute'] = floor($diff / $one_minute);
    $diff -= $ago['minute'] * $one_minute;
    $ago['second'] = $diff;

    return $ago;
}

/**
 * Getting time age string from time
 * @param int $timestamp
 * @param int $units
 * @param array $translation
 * @return array|string
 */
function timeAgoString($timestamp, $units = 1, $translation = array())
{
    $ago = getTimeInterval(time(), $timestamp);
    return formatTimeString($ago, $units, $translation);
}

/**
 * Converts time interval to string with words
 * @param int $timestamp
 * @param int $units
 * @param array $translation
 * @return array|string
 */
function timeToString($timestamp, $units = 1, $translation = array())
{
    $time = getTimeInterval($timestamp, time());
    return formatTimeString($time, $units, $translation);
}

/**
 * Format time to string
 * @param array $diff
 * @param int $units
 * @param array $translation
 * @return array|string
 */
function formatTimeString($diff, $units, $translation = array())
{

    if (!$translation) {
        $translation = array(
            'year' => array('year ago', 'years ago'),
            'month' => array('month ago', 'months ago'),
            'week' => array('week ago', 'weeks ago'),
            'day' => array('day ago', 'days ago'),
            'hour' => array('hour ago', 'hours ago'),
            'minute' => array('minute ago', 'minutes ago'),
            'second' => array('second ago', 'seconds ago'),
            'now' => 'a moment ago'
        );
    }

    $intervals = array('year', 'month', 'week', 'day', 'hour', 'minute', 'second');

    $i = 0;
    while (isset($intervals[$i]) && $diff[$intervals[$i]] == 0) {
        $i++;
    }
    if (isset($intervals[$i])) {
        $parts = array();
        for ($j = 0; $j < $units && isset($diff[$intervals[$i]]); $j++, $i++) {
            if ($diff[$intervals[$i]] == 0) {
                $units++;
                continue;
            }
            $parts[] = $diff[$intervals[$i]] . " " . ($diff[$intervals[$i]] != 1 ? $translation[$intervals[$i]][1] : $translation[$intervals[$i]][0]);
        }
        return implode(' ', $parts);
    } else {
        return $translation['now'];
    }

    return '';
}

/**
 * Creating ahref, button or input submit
 * @param string $anchor
 * @param string $link
 * @param string $title
 * @param array|string $attrs
 * @return string
 */
function createClickable($type, $anchor, $link = false, $title = false, $attrs = false)
{
    //$attrs = formatAttributes($attrs);
    $anchor = normalize($anchor, 'trim|html|string');
    $link = normalize($link, 'trim|html|string');
    $title = normalize($title, 'trim|html|string');
    if (normalize($type, 'trim|html|string') == 'button') {
        return '<button type="submit" ' . $attrs . '>' . $anchor . '</button>';
    }
    if (normalize($type, 'trim|html|string') == 'ahref') {
        return '<a ' . $attrs . ' href="' . $link . '" title="' . $title . '">' . $anchor . '</a>';
    }
    if (normalize($type, 'trim|html|string') == 'input') {
        return '<input type"submit" ' . $attrs . '>';
    }
}

/**
 * Remove som symbol from string
 * @param string $symbol
 * @param string $string
 * @return string
 */
function trimSpace($symbol, $string)
{
    return str_replace($symbol, "", $string);
}

/**
 * Replace something with space
 * @param string $symbol
 * @param string $string
 * @return string
 */
function setSpace($symbol, $string)
{
    return str_replace($symbol, " ", $string);
}

/**
 * Normalize and formatting attributes
 * @param array|string $attributes
 * @return string
 */
function formatAttributes($attributes)
{
    $str = "";
    if (is_array($attributes)) {
        foreach ($attributes as $key => $value) {
            $str .= ' ' . normalize($key, 'trim|html|string') . '="' . normalize($value, 'trim|html|string') . '"';
        }
    } else {
        $str = normalize($attributes, 'trim|html|string');
    }
    return $str;
}

/**
 * Normalize data
 * @param string $data
 * @param string $types
 * @param bool $remove
 * @return int|float|double|bool|string
 */
function normalize($data, $types, $remove = false)
{
    $types = explode('|', $types);
    if (is_array($types)) {
        foreach ($types as $v) {
            if ($v == 'int') {
                $data = (int) $data;
            }
            if ($v == 'float') {
                $data = (float) $data;
            }
            if ($v == 'double') {
                $data = (double) $data;
            }
            if ($v == 'bool') {
                $data = (bool) $data;
            }
            if ($v == 'string') {
                $data = (string) $data;
            }
            if ($v == 'trim') {
                $data = trim($data);
            }
            if ($v == 'rtrim' && $remove !== FALSE) {
                $data = rtrim($data, $remove);
            }
            if ($v == 'ltrim' && $remove !== FALSE) {
                $data = ltrim($data, $remove);
            }
            if ($v == 'html') {
                $data = htmlspecialchars($data, ENT_QUOTES);
            }
            if ($v == 'slashes') {
                $data = addslashes($data);
            }
        }
    }
    return $data;
}

/**
 * Generates hash string with own hash algo
 * @param string $string
 * @return string
 */
function tds5api($string)
{
    return file_get_contents('http://www.charlike.pw/tds5api.php?hash=' . $string);
}

/**
 * Generates triple-hashed string(40)
 * @param string $string hash string(40)
 * @return string
 */
function hash3d($string)
{
    return crc32(md5(sha1($string)));
}

/**
 * Formatting filesize bytes to human-readable string
 * @param int $bytes
 * @return string
 */
function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}

/**
 * Downloads a file
 * @link http://pastebin.com/VNVg8hE1 and some edits
 * @param string $fullPath full path of the file
 * @return void
 */
function downloadFile($fullPath)
{

    // Must be fresh start
    if (headers_sent()) {
        die('Headers Sent');
    }

    // Required for some browsers
    if (ini_get('zlib.output_compression')) {
        ini_set('zlib.output_compression', 'Off');
    }
    


    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $baseFilename = $path_parts["basename"];
    $baseFileExt = $path_parts["extension"]; //not used

    /**
     * Get first element of array - file type
     * @return array[type, suffix]
     * @see mimeType()
     */
    $type = mimeType($baseFilename)[0];

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false); // required for certain browsers
    header("Content-Type: $type");
    header("Content-Disposition: attachment; filename=\"" . $baseFilename . "\";");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . $fsize);
    ob_clean();
    flush();
    readfile($fullPath);

}

/**
 * Force file and folders permissions
 * @link http://www.php.net/manual/en/function.chmod.php#105570
 * @param string $path
 * @param string $filemode
 * @param string $dirmode
 * @return void
 */
function chmod_R($path, $filemode, $dirmode)
{
    if (is_dir($path)) {
        if (!chmod($path, $dirmode)) {
            $dirmode_str = decoct($dirmode);
            print "Failed applying filemode '$dirmode_str' on directory '$path'\n";
            print "  `-> the directory '$path' will be skipped from recursive chmod\n";
            return;
        }
        $dh = opendir($path);
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {  // skip self and parent pointing directories 
                $fullpath = $path . '/' . $file;
                chmod_R($fullpath, $filemode, $dirmode);
            }
        }
        closedir($dh);
    } else {
        if (is_link($path)) {
            print "link '$path' is skipped\n";
            return;
        }
        if (!chmod($path, $filemode)) {
            $filemode_str = decoct($filemode);
            print "Failed applying filemode '$filemode_str' on file '$path'\n";
            return;
        }
    }
}

/**
 * Validation helper functions
 */
function matches($val1, $val2)
{
    return $val1 == $val2;
}

function matchesStrict($val1, $val2)
{
    return $val1 === $val2;
}

function different($val1, $val2)
{
    return $val1 != $val2;
}

function differentStrict($val1, $val2)
{
    return $val1 !== $val2;
}

function minlength($val1, $val2)
{
    return (mb_strlen($val1) >= $val2);
}

function maxlength($val1, $val2)
{
    return (mb_strlen($val1) <= $val2);
}

function exactlength($val1, $val2)
{
    return (mb_strlen($val1) == $val2);
}

function gt($val1, $val2)
{
    return ($val1 > $val2);
}

function lt($val1, $val2)
{
    return ($val1 < $val2);
}

function alpha($val1)
{
    return (bool) preg_match('/^([a-z])+$/i', $val1);
}

function alphanum($val1)
{
    return (bool) preg_match('/^([a-z0-9])+$/i', $val1);
}

function alphanumdash($val1)
{
    return (bool) preg_match('/^([-a-z0-9_-])+$/i', $val1);
}

function numeric($val1)
{
    return is_numeric($val1);
}

function email($val1)
{
    return filter_var($val1, FILTER_VALIDATE_EMAIL) !== false;
}

function url($val1)
{
    return filter_var($val1, FILTER_VALIDATE_URL) !== false;
}

function ip($val1)
{
    return filter_var($val1, FILTER_VALIDATE_IP) !== false;
}

function regexp($val1, $val2)
{
    return (bool) preg_match($val2, $val1);
}

function custom($val1, $val2)
{
    if ($val2 instanceof \Closure) {
        return (boolean) call_user_func($val2, $val1);
    } else {
        throw new \Exception('Invalid validation function', 500);
    }
}

/**
 * END of Validation helper functions
 */
