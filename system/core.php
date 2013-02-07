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

        if ($_COOKIE['lang'])
            $this->lang = substr($_COOKIE['lang'], 0, 2);

        $this->Router();
    }

    private function Router() {
        if (url == '/') {
            $mod  = 'auth';
            $LANG = $this->LoadLang($mod);
            require APP . '/tpl/' . $mod . '.php';
        } elseif (strstr(url, '.'))
            exit('No direct acces!');
        else {
            echo 'url ' . url;
        }
    }

    private function LoadLang($file) {
        $file .= '.php';
        if (!is_dir(APP . '/system/language/' . $this->lang . '/'))
            $this->lang = 'en'; // default language

        $lang_folder = APP . '/system/language/' . $this->lang . '/';
        require $lang_folder.'main.php'; // Global file

        if (is_file($lang_folder . $file)) {
            require $lang_folder . $file;
            return $LANG;
        } else
            return '404 language for file ' . $file . ' not found!';
    }

}

?>
