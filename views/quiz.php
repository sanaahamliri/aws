<?php
session_start();

require_once("../controllers/ControllerQuiz.php");

$controllerQuiz = new ControllerQuiz();
$quizArray = $controllerQuiz->getQuizData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css">
    <title>AwsQuizz</title>
</head>

<body>
    <div class="start-screen">
        <button id="start-button">Start</button>
    </div>
    <div id="display-container" class="hide">
        <div class="header">
            <div class="number-of-count">
                <span class="number-of-question">1 of <?php echo count($quizArray); ?> questions</span>
            </div>
            <div class="timer-div">
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/time-and-date/stopwatch-icon.png" width="20px" />
                <span class="time-left">10s</span>
            </div>
        </div>
        <div id="container">
            <?php foreach ($quizArray as $question): ?>
                <div class="quiz-question hide" data-question-id="<?php echo $question['id']; ?>">
                    <p class="question"><?php echo $question['question']; ?></p>
                    <?php foreach ($question['options'] as $option): ?>
                        <button class="option-div" onclick="checker(this)"><?php echo $option; ?></button>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <button id="next-button">Next</button>
    </div>
    <div class="score-container hide">
        <div id="user-score">Demo Score</div>
        <button id="restart">Restart</button>
    </div>

    <script src="../script.js"></script>
</body>

</html>