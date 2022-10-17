<?php
    require_once './templates/smarty-4.2.1/libs/Smarty.class.php';

    class dinoView{
        private $smarty;

        function __construct()
        {
            $this->smarty = new Smarty();
        }

        function mostrarDinos($dinos, $habitat){
            //cuenta cantidad de dinos $this->smarty->assign('count', count($Dinos));
            $this->smarty->assign('dinos', $dinos);
            $this->smarty->assign('habitat', $habitat);
            $this->smarty->display('cartaDino.tpl');
        }

        function mostrarHome(){
            $this->smarty->display('home.tpl');
        }

        function mostrarFormulario($habitat){
            $this->smarty->assign('habitat', $habitat);
            $this->smarty->display('agregarDino.tpl');
        }

        function mostrarFormularioEditDinos($dinos, $habitat, $habitatDino){
            $this->smarty->assign('habitatDino', $habitatDino);
            $this->smarty->assign('habitat', $habitat);
            $this->smarty->assign('dinos', $dinos);
            $this->smarty->display('editDino.tpl');
        }

        function showMore($habitatDino, $dinos){
            $this->smarty->assign('habitat', $habitatDino);
            $this->smarty->assign('dinos', $dinos);
            $this->smarty->display('verMas.tpl');
        }


    }
?>