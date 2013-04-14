<?php

/*
// API-module
*/

class Api {

    function __construct($conf) {
        $this->LANG = $conf['LANG'];

        if (!isset($_SESSION['login'])) {

          header('HTTP/1.1 403 Forbidden');

        } else {

          header('Content-Type: text/plain');
          echo 'test' . "\n";
          if(isset($_GET['query'])){ echo $_GET['query']; };

        }

    }
}

?>


