<?php

require_once("../config/conn.php");

class ModelReponse {
  private $idReponse;
  private $enonce_reponse;
  private $idQuestion;
  private $statut;
  private $pdo;

  public function __construct() {
    $newConnection = Database::connectionCheck()->connect();
    $this->pdo = $newConnection;
  }
  public function getReponsesByQuestionId($idQuestion) {
    $query = "SELECT * FROM reponse WHERE idQuestion = :idQuestion";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(":idQuestion", $idQuestion);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

  // SETTERS

  public function setID($newidReponse) {
    $this->idReponse = $newidReponse;
  }

  public function setContent($newenonce_reponse) {
    $this->enonce_reponse = $newenonce_reponse;
  }

  public function setidQuestion($newidQuestion) {
    $this->idQuestion = $newidQuestion;
  }

  public function setStatut($newStatut) {
    $this->statut = $newStatut;
  }

  // GETTERS

  public function getID() {
    return $this->idReponse;
  }

  public function getContent() {
    return $this->enonce_reponse;
  }

  public function getidQuestion() {
    return $this->idQuestion;
  }
  
  public function getStatut() {
    return $this->statut;
  }
}
