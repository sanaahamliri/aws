// References
let timeLeft = document.querySelector(".time-left");
let quizContainer = document.getElementById("container");
let nextBtn = document.getElementById("next-button");
let countOfQuestion = document.querySelector(".number-of-question");
let displayContainer = document.getElementById("display-container");
let scoreContainer = document.querySelector(".score-container");
let restart = document.getElementById("restart");
let userScore = document.getElementById("user-score");
let startScreen = document.querySelector(".start-screen");
let startButton = document.getElementById("start-button");
let questionCount = 0;
let scoreCount = 0;
let count = 10; // Change to 10 seconds
let countdown;

// Restart Quiz
restart.addEventListener("click", () => {
    initial();
    displayContainer.classList.remove("hide");
    scoreContainer.classList.add("hide");
});

// Next Button
nextBtn.addEventListener("click", () => {
    questionCount += 1;
    if (questionCount == document.querySelectorAll(".quiz-question").length) {
        displayContainer.classList.add("hide");
        scoreContainer.classList.remove("hide");
        userScore.innerHTML =
            "Your score is " + scoreCount + " out of " + questionCount;
    } else {
        countOfQuestion.innerHTML =
            questionCount + 1 + " of " + document.querySelectorAll(".quiz-question").length + " questions";
        quizDisplay(questionCount);
        count = 10; // Reset the countdown
        clearInterval(countdown);
        timerDisplay();
    }
});

// Timer
const timerDisplay = () => {
    countdown = setInterval(() => {
        count--;
        timeLeft.innerHTML = `${count}s`;
        if (count == 0) {
            clearInterval(countdown);
            displayNext();
        }
    }, 1000);
};

// Display quiz
const quizDisplay = (questionCount) => {
    let quizQuestions = document.querySelectorAll(".quiz-question");
    quizQuestions.forEach((question) => {
        question.classList.add("hide");
    });
    quizQuestions[questionCount].classList.remove("hide");
};

// Checker Function to check if the option is correct or not
function checker(userOption) {
  let userSolution = userOption.innerText;
  let question = document.querySelectorAll(".quiz-question")[questionCount];
  let options = question.querySelectorAll(".option-div");

  options.forEach((element) => {
      let isCorrect = element.getAttribute("data-correct") === "1";
      let isSelected = userSolution === element.innerText;

      if (isSelected) {
          if (isCorrect) {
              userOption.classList.add("correct");
              scoreCount++;
          } else {
              userOption.classList.add("incorrect");
              element.classList.add("correct");
          }
      }

      element.disabled = true;
  });

  clearInterval(countdown);
}


// Initial setup
function initial() {
    questionCount = 0;
    scoreCount = 0;
    count = 10;
    clearInterval(countdown);
    timerDisplay();
    quizDisplay(questionCount);
}

// When the user clicks on the start button
startButton.addEventListener("click", () => {
    startScreen.classList.add("hide");
    displayContainer.classList.remove("hide");
    initial();
});

// Hide the quiz and display the start screen
window.onload = () => {
    startScreen.classList.remove("hide");
    displayContainer.classList.add("hide");
};
