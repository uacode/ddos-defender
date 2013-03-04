<?php

/**
 * Main class
 *
 * @author dobs
 */
class core {

    protected $ver = '0.1';
    protected $lang; // default language

    function __construct() {
        $this->lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

        if (isset($_COOKIE['lang']))
            $this->lang = substr($_COOKIE['lang'], 0, 2);

        $this->Router();
    }

    private function Router() {
        if (url == '/') {
            $mod  = 'main';
            $LANG = $this::LoadLang($mod, $this->lang);

            $conf = array('LANG' => $LANG, 'lang' => $this->lang);
            $this->_LoadModule($mod, $conf);
        } elseif (strstr(url, '.'))
            exit('No direct acces!');
        else {
            echo 'url ' . url;
        }
    }

    static public function LoadLang($file, $lang) {
        $file .= '.php';
        if (!is_dir(APP . '/system/language/' . $lang . '/'))
            $lang = 'en'; // default language

        $lang_folder = APP . '/system/language/' . $lang . '/';
        require $lang_folder . 'main.php'; // Global file

        if (is_file($lang_folder . $file)) {
            require $lang_folder . $file;
            return $LANG;
        } else
            return '404 language for file ' . $file . ' not found!';
    }

    private function _LoadModule($modul, $conf) {
//        ini_set('display_errors', 1);
        require APP . '/modules/' . $modul . '/main.php';
        $mod = ucfirst($modul);
        new $mod($conf);
    }

}
