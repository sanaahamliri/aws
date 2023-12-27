<?php

require_once("../models/ModelQuestion.php");
require_once("../models/ModelReponse.php");

class ControllerQuiz {
    private $modelQuestion;
    private $modelReponse;

    public function __construct() {
        $this->modelQuestion = new ModelQuestion();
        $this->modelReponse = new ModelReponse();
    }

    public function getQuizData() {
      $questions = $this->modelQuestion->getAllQuestions();
  
      $quizArray = [];
      foreach ($questions as $question) {
          $reponses = $this->modelReponse->getReponsesByQuestionId($question['idQuestion']);
  
          // Trouver la réponse correcte
          $correctAnswerIndex = array_search('1', array_column($reponses, 'statut'));
          $correctAnswer = ($correctAnswerIndex !== false) ? $reponses[$correctAnswerIndex]['enonce_reponse'] : '';
  
          $quizArray[] = [
              'id' => $question['idQuestion'],
              'question' => $question['enonce_question'],
              'options' => array_column($reponses, 'enonce_reponse'),
              'correct' => $correctAnswer,
          ];
      }
  
      return $quizArray;
  }
}
