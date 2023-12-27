<?php

require_once("../models/model_question.php");

class QuestionControl extends Question{
  
  public function getNextQuestion($list){
    $DbQuestion = $this->getRandQuestion($list);
    $randQuestion = new Question;
    $randQuestion->setID($DbQuestion['idQuestion']);
    $randQuestion->setContent($DbQuestion['enonce_question']);
    $randQuestion->setidTheme($DbQuestion['idTheme']);
    return $randQuestion;
  }

  public function getStartQuestion(){
    $DbQuestion = $this->getFirstQuestion();
    $firstQuestion = new Question;
    $firstQuestion->setID($DbQuestion['idQuestion']);
    $firstQuestion->setContent($DbQuestion['enonce_question']);
    $firstQuestion->setidTheme($DbQuestion['idTheme']);
    return $firstQuestion;
  }
}