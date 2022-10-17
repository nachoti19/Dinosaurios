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

$dinocontroller = new dinoController();
$habitatcontroller = new habitatController();
$authcontroller = new authController();
$authHelper = new AuthHelper();

switch ($params[0]){
    //paginas
    case 'login';
        $authcontroller->showFormLogin();
    break;
    case 'home';
        $dinocontroller->showHome();
        break;
    case 'dinosaurios';
        $dinocontroller->showDinos();
        break;
    case 'agregardinos';
        $authHelper->checkLoggedIn();
        $dinocontroller->showForm();
        break;
    case 'agregarhabitat';
        $authHelper->checkLoggedIn();
        $habitatcontroller->showFormHab();
        break;
    case 'editardinos';
        $authHelper->checkLoggedIn();
        $id = $params[1];
        $dinocontroller->showFormEditDino($id);
        break;
    case 'habitats';
        $habitatcontroller->showHabitats();
        break;
    case 'editarhabitat';
        $authHelper->checkLoggedIn();
    $id = $params[1];
        $habitatcontroller->showHabitatsEdit($id);
        break;
    case 'vermas';
    $id = $params[1];
        $dinocontroller->showMore($id);
        break;
    case 'listadinos';
    $id = $params[1];
        $habitatcontroller->showListDinos($id);
        break;
    //acciones->DINOS
    case 'adddino';
        $authHelper->checkLoggedIn();
        $dinocontroller->addDino();
        break;
    case 'editdino';
        $authHelper->checkLoggedIn();
        $id = $params[1];
        $dinocontroller->edit_dino($id);
        break;
    case 'delete';
    $authHelper->checkLoggedIn();
        $id = $params[1];
        $dinocontroller->DeleteDino($id);
        break;
    //acciones->HABITATS
    case 'addhabitat';
        $authHelper->checkLoggedIn();
        $habitatcontroller->addHab();
        break;
    case 'edithabitat';
        $authHelper->checkLoggedIn();
        $id = $params[1];
        $habitatcontroller->edit_habitat($id);
        break;
    case 'deletehab';
        $authHelper->checkLoggedIn();
        $id = $params[1];
        $habitatcontroller->deleteHab($id);
        break;
    //acciones->USUARIO
    case 'validate';
        $authcontroller->validateUser();
        break;
    case 'logout';
        $authcontroller->logout();
        break;
    default:
        echo('404 Page not found');
        break;
}

?>