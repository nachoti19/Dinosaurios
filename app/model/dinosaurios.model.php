<?php

class dinoModel{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=dinosaurios;charset=utf8', 'root', '');
    }

    //DINOSAURIOS
    //conseguir dinos y insertarlos en la db
    public function getDinos(){
        $query = $this->db->prepare("SELECT * from dinos");
        $query->execute();
        $dinos = $query->fetchAll(PDO::FETCH_OBJ);
        return $dinos;
    }

    function getDinoHab($id){
        $query = $this->db->prepare("SELECT * from dinos WHERE id_habitat_fk =?");
        $query->execute([$id]);
        $alldinoHab = $query->fetchAll(PDO::FETCH_OBJ);
        return $alldinoHab;

    }

    public function insertarDino($nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion,$imagen= null){
        //$pathImg = null;
        if($imagen){
            $pathImg = $this->uploadImg($imagen);
        }else{
            $pathImg = null;
        }
        $query = $this->db->prepare("INSERT INTO dinos(nombre_cientifico, altura, peso, alimentacion, anios_vivos, id_habitat_fk, descripcion, Imagen) VALUES(?,?,?,?,?,?,?,?)");
        $query->execute([$nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion, $pathImg]);

    }

    private function uploadImg($imagen){
        $target = "img/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION)); 
        move_uploaded_file($imagen, $target);
        return $target;
    }

    public function actualizarDinos($nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion, $id){
        $query = $this->db->prepare("UPDATE dinos SET nombre_cientifico = ?, altura = ?, peso = ?, alimentacion = ?, anios_vivos = ?, id_habitat_fk = ?, descripcion = ? WHERE id_dinosaurio = ?");
        $query->execute([$nombre, $altura, $peso, $alimentacion, $anos, $id_habitat, $descripcion, $id]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectDinoEdit($id){
        $query = $this->db->prepare("SELECT * from dinos WHERE id_dinosaurio=?");
        $query->execute([$id]);
        $dinos = $query->fetch(PDO::FETCH_OBJ);
        return $dinos;
    }

    private function borrarImagen($imagen){
        unlink($imagen);
    }

    public function DeleteDinos($id){
        $dinosaurio = $this->selectDinoEdit($id);
        $this->borrarImagen($dinosaurio->Imagen);
        $query = $this->db->prepare('DELETE FROM dinos WHERE id_dinosaurio=?');
        $query->execute([$id]);
    }


}


?>