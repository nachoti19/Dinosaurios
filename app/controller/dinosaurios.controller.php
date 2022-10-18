<?php
//session_start();
require_once './app/model/dinosaurios.model.php';
require_once './app/view/dinosaurios.view.php';
require_once './app/model/habitat.model.php';
require_once './app/helper/auth.helper.php';
require_once './app/view/habitats.view.php';

class dinoController{
    private $model;
    private $view;
    private $habitat_model;
    private $habitatView;
    private $helper;

    public function __construct()
    {
        $this->model = new dinoModel();
        $this->view = new dinoView();
        $this->habitat_model = new habitatModel();
        $this->habitatView = new habitatView();
        $this->helper = new AuthHelper();
    }
    //vistas de paginas
    public function showHome(){
        $this->helper->IsLoggedIn();
        $this->view->mostrarHome();
    }

    public function showForm(){
        $this->helper->checkLoggedIn();
        $habitat = $this->habitat_model->getHabitat();
        $this->view->mostrarFormulario($habitat);
    }

    public function showDinos(){
        $this->helper->IsLoggedIn();
        $dinos = $this->model->getDinos();
        $habitat = $this->habitat_model->getHabitat();
        $this->view->mostrarDinos($dinos, $habitat);
    }

    public function showFormEditDino($id){
        $this->helper->checkLoggedIn();
        $habitat = $this->habitat_model->getHabitat();
        $habitatDino = $this->habitat_model->getHabitatDino($id);
        $dinos = $this->model->selectDinoEdit($id);
        $this->view->mostrarFormularioEditDinos($dinos, $habitat, $habitatDino);
    }

    function showMore($id){
        $habitatDino = $this->habitat_model->getHabitatDino($id);
        $dinos = $this->model->selectDinoEdit($id);
        $this->view->showMore($habitatDino, $dinos);
    }

    //DINOSAURIOS
    function addDino(){
        $this->helper->checkLoggedIn();
        $nombre = $_POST['nombre_dino'];
        $altura = $_POST['altura_dino'];
        $peso = $_POST['peso_dino'];
        $alimentacion = $_POST['alimentacion_dino'];
        $anos = $_POST['anos_vivos'];
        $id_habitat = $_POST['habitat'];
        $descripcion = $_POST['descripcion'];
        $imagen = $_FILES['imagen']['tmp_name'];
        
        if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
        || $_FILES['imagen']['type'] == "image/png" ){
            $this->model->insertarDino($nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion, $imagen);
        }
            else{
                $id = $this->model->insertarDino($nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion);
            }
        header("Location: " . BASE_URL . "dinosaurios");
    }

    function edit_dino($id){
        $this->helper->checkLoggedIn();
        $nombre = $_POST['nombre_dino'];
        $altura = $_POST['altura_dino'];
        $peso = $_POST['peso_dino'];
        $alimentacion = $_POST['alimentacion_dino'];
        $anos = $_POST['anos_vivos'];
        $id_habitat = $_POST['habitat'];
        $descripcion = $_POST['descripcion'];
        
        $this->model->actualizarDinos($nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion, $id);

        header("Location: " . BASE_URL . "dinosaurios");
    }

    function DeleteDino($id){
        $this->helper->checkLoggedIn();
        $this->model->DeleteDinos($id);
        header("Location: " . BASE_URL . "dinosaurios");
    }

}
?>