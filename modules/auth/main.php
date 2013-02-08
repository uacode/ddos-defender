<?php

class Auth {

    function __construct($conf) {
        $this->LANG = $conf['LANG'];

        if (isset($_POST['auth']))
            $this->_processAUTH();

        if (!$_SESSION['login'])
            $this->_getAuthForm();
    }

    private function _makeAUTH() {
        require APP . '/config/users.php';
        $login = $_POST['login'];
        $password = $_POST['password'];
        if($users[$login]['pass'] == md5(md5($password)))
            return 1;
        else
            return 0;
    }

    private function _processAUTH() {
        if (!$_POST['login'] || !$_POST['password'])
            $this->e_mess = $this->LANG['FillAll'];
        else {
            if(!$this->_makeAUTH())
                $this->e_mess = $this->LANG['LoginIncorrect'];
            else {
                $_SESSION['login'] = $_POST['login'];
                header('Location: '.url);
            }
        }
    }

    private function _getAuthForm() {
        require APP . '/tpl/auth.php';
    }

}

?>
