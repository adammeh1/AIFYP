const menu = document.querySelector('#header-mobile-menu');
const menuLinks = document.querySelector('.header__menu');

menu.addEventListener('click', function() {
  menu.classList.toggle('is-active');
  menuLinks.classList.toggle('active');
});


// quiz code 

  const questions = document.querySelectorAll('.question');
  const submitBtn = document.getElementById('submitBtn');
  const resultDiv = document.getElementById('result');
  const alertDiv = document.getElementById('alert');
  const scoreDisplay = document.getElementById('score');
  let currentQuestion = 0;
  let score = 0;

  function showNextQuestion() {
    // Check if the user has selected an option for the current question
    const selectedOption = document.querySelector(`input[name="q${currentQuestion + 1}"]:checked`);
    if (!selectedOption) {
      alert("Please select an option before proceeding.");
      return;
    }

    if (currentQuestion < questions.length - 1) {
      questions[currentQuestion].classList.remove('active');
      currentQuestion++;
      questions[currentQuestion].classList.add('active');
      if (currentQuestion === questions.length - 1) {
        submitBtn.textContent = 'Submit';
      }
    } else {
      calculateScore();
    }
  }

  function calculateScore() {
    const answers = ['b', 'd', 'c','c', 'b', 'a','a', 'a', 'd','b']; // Add correct answers for all questions
    for (let i = 0; i < answers.length; i++) {
      const selectedOption = document.querySelector(`input[name="q${i + 1}"]:checked`);
      if (selectedOption && selectedOption.value === answers[i]) {
        score++;
      }
    }
    showResult();
  }

  function showResult() {
    scoreDisplay.textContent = `Your score: ${score}/${questions.length}`;
    resultDiv.style.display = 'block';
  }

  submitBtn.addEventListener('click', function(event) {
    event.preventDefault();
    showNextQuestion();
  });
