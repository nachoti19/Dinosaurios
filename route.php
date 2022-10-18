<?php
require_once './app/controller/dinosaurios.controller.php';
require_once './app/controller/habitat.controller.php';
require_once './app/controller/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]){
    //paginas
    case 'login';
    $authcontroller = new AuthController();
        $authcontroller->showFormLogin();
    break;
    case 'home';
    $dinocontroller = new dinoController();
        $dinocontroller->showHome();
        break;
    case 'dinosaurios';
    $dinocontroller = new dinoController();
        $dinocontroller->showDinos();
        break;
    case 'agregardinos';
        $dinocontroller = new dinoController();
        $dinocontroller->showForm();
        break;
    case 'agregarhabitat';
    $habitatcontroller = new habitatController();
        $habitatcontroller->showFormHab();
        break;
    case 'editardinos';
    $dinocontroller = new dinoController();
        $id = $params[1];
        $dinocontroller->showFormEditDino($id);
        break;
    case 'habitats';
    $habitatcontroller = new habitatController();
        $habitatcontroller->showHabitats();
        break;
    case 'editarhabitat';
    $habitatcontroller = new habitatController();
    $id = $params[1];
        $habitatcontroller->showHabitatsEdit($id);
        break;
    case 'vermas';
    $dinocontroller = new dinoController();
    $id = $params[1];
        $dinocontroller->showMore($id);
        break;
    case 'listadinos';
    $habitatcontroller = new habitatController();
    $id = $params[1];
        $habitatcontroller->showListDinos($id);
        break;
    //acciones->DINOS
    case 'adddino';
    $dinocontroller = new dinoController();
        $dinocontroller->addDino();
        break;
    case 'editdino';
    $dinocontroller = new dinoController();
        $id = $params[1];
        $dinocontroller->edit_dino($id);
        break;
    case 'delete';
    $dinocontroller = new dinoController();
        $id = $params[1];
        $dinocontroller->DeleteDino($id);
        break;
    //acciones->HABITATS
    case 'addhabitat';
    $habitatcontroller = new habitatController();
        $habitatcontroller->addHab();
        break;
    case 'edithabitat';
    $habitatcontroller = new habitatController();
        $id = $params[1];
        $habitatcontroller->edit_habitat($id);
        break;
    case 'deletehab';
    $habitatcontroller = new habitatController();
        $id = $params[1];
        $habitatcontroller->deleteHab($id);
        break;
    //acciones->USUARIO
    case 'validate';
    $authcontroller = new AuthController();
        $authcontroller->validateUser();
        break;
    case 'logout';
    $authcontroller = new AuthController();
        $authcontroller->logout();
        break;
    default:
        echo('404 Page not found');
        break;
}

?>