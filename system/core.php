<?php

/**
 * Main class
 *
 * @author dobs
 */
class core {

    protected $ver = '0.1';
    protected $lang; // default language

    private $url_name_module = '';

    function __construct() {
        $this->lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $this->url_name_module = $this->get_module_name(url);

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

        } elseif (strstr(url, '.')){
          exit('No direct acces!');

        } elseif ($this->check_module_exist($this->url_name_module)){
            $mod = $this->url_name_module;
            $LANG = $this::LoadLang($mod, $this->lang);

            $conf = array('LANG' => $LANG, 'lang' => $this->lang);
            $this->_LoadModule($mod, $conf);
        }

        else {
            header('Content-Type: text/plain');
            echo 'Load: ' . url . "\n" . 'This module not found';
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

    private function get_module_name($url){
      return preg_replace('/([^\/])*([^\/]$)|([^a-z])/', '', $url);
    }

    private function check_module_exist($modul){
      if ( file_exists(APP.'/modules/'.$modul) ){
        if ( is_dir(APP.'/modules/'.$modul) ){
          if ( file_exists(APP.'/modules/'.$modul.'/'.$modul.'.php') ){
            if ( is_file(APP.'/modules/'.$modul.'/'.$modul.'.php') ){
              return true;
            }
          }
        }
      }
      return false;
    }

    private function _LoadModule($modul, $conf) {
//        ini_set('display_errors', 1);
        require APP . '/modules/' . $modul . '/'. $modul . '.php';
        $mod = ucfirst($modul);
        new $mod($conf);
    }

}

?>
