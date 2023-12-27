<?php

require_once("../config/conn.php");

class ModelReponse {
    private $pdo;
    private $idReponse;
    private $enonce_reponse;
    private $idQuestion;

    public function __construct() {
        $newConnection = Database::connectionCheck()->connect();
        $this->pdo = $newConnection;
    }

    public function getReponsesByQuestionId($idQuestion) {
        $query = "SELECT * FROM reponse WHERE idQuestion = :idQuestion";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":idQuestion", $idQuestion);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
