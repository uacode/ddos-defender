<?php

if(!APP)
    exit('No direct access!');

/**
 * (c) VisionsCMS.com
 */

function pre($v, $return = '0') {
    if ($return)
        return '<pre>' . print_r($v, 1) . '</pre>';
    else
        echo '<pre>' . print_r($v, 1) . '</pre>';
}

/**
 * Redirect to $url, if empty - redirect to main page
 */
function redirect($url = '/') {
    header('Location: ' . $url);
    exit;
}

/**
 * Return in human redable file size (kB, MB,GB...)
 */
function fSize($bytes) {
    if ($bytes < 1000 * 1024)
        return number_format($bytes / 1024, 2) . ' kB';
    elseif ($bytes < 1000 * 1048576)
        return number_format($bytes / 1048576, 2) . ' MB';
    elseif ($bytes < 1000 * 1073741824)
        return number_format($bytes / 1073741824, 2) . ' GB';
    else
        return number_format($bytes / 1099511627776, 2) . ' TB';
}


/**
 * Return cleaned string
 */
function clear($val, $make_html = 0) {
    $val = trim($val);
    $val = strip_tags($val);
    if (!$make_html)
        $val = htmlspecialchars($val);
    if (get_magic_quotes_gpc())
        $val = stripslashes($val);
    return $val;
}

function ipInArray($ip, $ips) {
    if (is_array($ips)) {
        $co = count($ips);
        for ($i  = 0; $i < $co; $i++) {
            $cnt = preg_match('/^' . str_replace(array('\*', '\?'), array('(.*?)', '[0-9]'), preg_quote($ips[$i])) . '$/', $ip);
            if ($cnt) {
                $cnt = 1;
                break;
            }
        }
    } elseif (!$ips) {
        return 0;
    } else {
        $cnt = preg_match('/^' . str_replace(array('\*', '\?'), array('(.*?)', '[0-9]'), preg_quote($ips)) . '$/', $ip);
    }

    return $cnt;
}

