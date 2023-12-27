<?php

require_once("../config/conn.php");

class Question{
  private $idQuestion;
  private $enonce_question;
  private $idTheme;
  private $pdo;
  public function __construct(){
    $newConnection = Database::connectionCheck()->connect();
    $this->pdo = $newConnection;
  }

  public function getRandQuestion($pastQuestions){
    $query = "SELECT * 
              FROM question as q 
              WHERE q.idQuestion 
              NOT IN ($pastQuestions)
              ORDER BY RAND()
              LIMIT 1;";
    $stmt = $this->pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getFirstQuestion(){
    $query = "SELECT * 
              FROM question  
              ORDER BY RAND()
              LIMIT 1;";
    $stmt = $this->pdo->query($query);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // SETTERS

  public function setID($newidQuestion){
    $this->idQuestion = $newidQuestion;
  }

  public function setContent($newenonce_question){
    $this->enonce_question = $newenonce_question;
  }

  public function setidTheme($newidTheme){
    $this->idTheme = $newidTheme;
  }

  // GETTERS

  public function getID(){
    return $this->idQuestion;
  }

  public function getContent(){
    return $this->enonce_question;
  }

  public function getidTheme(){
    return $this->idTheme;
  }

}