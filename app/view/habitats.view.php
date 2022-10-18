<?php

    require_once './libs/smarty-4.2.1/libs/Smarty.class.php';
    
    class habitatView{
        private $smarty;

        function __construct()
        {
            $this->smarty = new Smarty();
        }

        function mostrarHabitat($habitat, $error = null){

            $this->smarty->assign('habitat', $habitat);
            $this->smarty->assign('error', $error);
            $this->smarty->display('ListHab.tpl');
        }

        function mostrarFormularioHab(){
            $this->smarty->display('agregarhabitat.tpl');
        }

        function mostrarFormularioHabEdit($habitat){
            $this->smarty->assign('habitat', $habitat);
            $this->smarty->display('editHab.tpl');
        }

        function showListDino($dinoHab){
            $this->smarty->assign('habitat', $dinoHab);
            $this->smarty->display('ListaDinos.tpl');
        }
    }

?>