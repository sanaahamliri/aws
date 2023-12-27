<?php

require_once("../config/conn.php");

class ModelQuestion {
    private $pdo;
    private $idQuestion;
    private $enonce_question;
    private $idTheme;

    public function __construct() {
        $newConnection = Database::connectionCheck()->connect();
        $this->pdo = $newConnection;
    }

    public function getAllQuestions() {
        $query = "SELECT * FROM question";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getQuestionById($idQuestion) {
        $query = "SELECT * FROM question WHERE idQuestion = :idQuestion";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":idQuestion", $idQuestion);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
