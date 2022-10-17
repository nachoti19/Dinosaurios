<?php
require_once './app/model/habitat.model.php';
require_once './app/model/dinosaurios.model.php';
require_once './app/helper/auth.helper.php';
require_once './app/view/habitats.view.php';


class habitatController{
    private $habitat_model;
    private $dinoView;
    private $habitatView;
    private $model;

    public function __construct()
    {
        $this->habitat_model = new habitatModel();
        $this->view = new dinoView();
        $this->habitatView = new habitatView();
        $this->model = new dinoModel();
    }

    //VISTAS
    public function showHabitats(){
        $habitat = $this->habitat_model->getHabitat();
        $this->habitatView->mostrarHabitat($habitat);
    }

    public function showFormHab(){
        $this->habitatView->mostrarFormularioHab();
    }

    function showHabitatsEdit($id){
        $habitat = $this->habitat_model->selectHabitatEdit($id);
        $this->habitatView->mostrarFormularioHabEdit($habitat);
    }

    function showListDinos($id){
        $habitat = $this->habitat_model->listDino($id);
        $this->habitatView->showListDino($habitat);
    }

    //ACCIONES
    function addHab(){
        $continente = $_POST['continente'];
        $bioma = $_POST['bioma'];
        $temperatura = $_POST['temperatura'];

        $id = $this->habitat_model->insertarHab($continente, $bioma, $temperatura); 

        header("Location: " . BASE_URL ."habitats");
    }

    function edit_habitat($id){
        $continente = $_POST['continente'];
        $bioma = $_POST['bioma'];
        $temperatura = $_POST['temperatura'];

        $this->habitat_model->actualizarHabitat($continente, $bioma, $temperatura, $id);
        header("Location: " . BASE_URL . "habitats");
    }

    function allDinos($error = null){
        $alldinos = $this->habitat_model->getHabitat();
        $this->habitatView->mostrarHabitat($alldinos, $error);

    }

    function deleteHab($id){
        $habitatdino = $this->model->getDinoHab($id);
        if ($habitatdino){
            $this->allDinos("ERROR, no puede borrar un habitat teniendo dinosaurios en el, pobrecitos :c");
        }else{
            $this->habitat_model->DeleteHab($id);
            header("Location: " . BASE_URL . "habitats");
        }
    }
}

?>