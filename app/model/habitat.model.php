<?php

class habitatModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=dinosaurios;charset=utf8', 'root', '');
    }

    public function getHabitat(){
        $query = $this->db->prepare("SELECT * from habitats");
        $query->execute();
        $habitat = $query->fetchAll(PDO::FETCH_OBJ);
        return $habitat;
    }

    public function getHabitatDino($id){
        $query = $this->db->prepare("SELECT id_habitat_fk FROM dinos WHERE id_dinosaurio = $id");
        $query -> execute();
        $IdDinoHab = $query->fetch(PDO::FETCH_OBJ);
        $qsy = $this->db->prepare("SELECT * from habitats WHERE id_habitat = $IdDinoHab->id_habitat_fk");
        $qsy->execute();
        $habitatDino = $qsy->fetch(PDO::FETCH_OBJ);
        return $habitatDino;
    }

    function listDino($id){
        $query = $this->db->prepare("SELECT id_habitat FROM habitats WHERE id_habitat = $id");
        $query -> execute();
        $habitat = $query->fetch(PDO::FETCH_OBJ);
        $qsy = $this->db->prepare("SELECT * from dinos WHERE id_habitat_fk = $habitat->id_habitat");
        $qsy -> execute();
        $dinoHab = $qsy->fetchAll(PDO::FETCH_OBJ);
        return $dinoHab;
    }

    public function insertarHab($continente, $bioma, $temperatura){
        $query = $this->db->prepare("INSERT INTO habitats(continente, bioma, temperatura) VALUES(?,?,?)");
        $query->execute([$continente, $bioma, $temperatura]);

        return $this->db->lastInsertId();
    }

    public function selectHabitatEdit($id){
        $query = $this->db->prepare("SELECT * from habitats WHERE id_habitat=?");
        $query->execute([$id]);
        $habitat = $query->fetch(PDO::FETCH_OBJ);
        return $habitat;
    }

    public function actualizarHabitat($continente, $bioma, $temperatura, $id){
        $query = $this->db->prepare("UPDATE habitats SET continente = ?, bioma = ?, temperatura = ? WHERE id_habitat = ?");
        $query->execute([$continente, $bioma, $temperatura, $id]);
        $query->fetchAll(PDO::FETCH_OBJ);
    }

    function DeleteHab($id){
        $query = $this->db->prepare('DELETE FROM habitats WHERE id_habitat = ?');
        $query->execute([$id]);
    }
}

?>