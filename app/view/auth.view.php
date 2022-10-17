<?php

require_once './templates/smarty-4.2.1/libs/Smarty.class.php';

class Authview{
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); 
    }

    function showFormLogin($error = null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('login.tpl');
    }

}

?>