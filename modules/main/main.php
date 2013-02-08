<?php

/**
 * Description of main
 *
 * @author dobs
 */
class Main {

    function __construct($conf) {
        $this->LANG = $conf['LANG'];

        if (!$_SESSION['login']) {
            $modul = 'auth';
            $LANG  = core::LoadLang($modul, $conf['lang']);

            require APP . '/modules/' . $modul . '/main.php';
            $conf = array('LANG' => $LANG, 'lang' => $this->lang);
            $mod   = ucfirst($modul);
            new $mod($conf);
        } else {
            echo 'main module...';
        }
    }

}

?>
