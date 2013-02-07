<?php

if (php_sapi_name() != 'cli-server') {
    exit('Run only in PHP-cli server');
}

session_start();

define('APP', $_SERVER['DOCUMENT_ROOT']);
define('dt', date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']));
define('d', date('Y-m-d', $_SERVER['REQUEST_TIME']));
define('ip', $_SERVER['REMOTE_ADDR']);
define('url', $_SERVER['REQUEST_URI']);

require APP . '/system/functions.php';
require APP . '/system/core.php';

new core;