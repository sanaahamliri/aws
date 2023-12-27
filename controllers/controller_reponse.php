<?php

require_once("../models/model_reponse.php");

class AnswerControl extends Answer{
  
  public function getAnswers($idQuestion){
    $DbAnswers = $this->getQuestionAnswers($idQuestion);
    $Answers = array();
    $i = 0;
    foreach($DbAnswers as $A){
      $Answers[$i] = new Answer;
      $Answers[$i]->setID($A['idReponse']);
      $Answers[$i]->setContent($A['enonce_reponse']);
      $Answers[$i]->setidQuestion($A['idQuestion']);
      $Answers[$i]->setidQuestion($A['statut']);

      $i++;
    }
    return $Answers;
  }

}