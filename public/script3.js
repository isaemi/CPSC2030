const words = [
  "hangman",
  "computer",
  "javascript",
  "programming",
  "developer",
  "Science",
  "Samsung",
  "Langara",
  "Apple",
];

// Define the game variables
let solution = getRandomWord();
let gameBoard = Array(solution.length).fill("-");
let guesses = [];
let numGuesses = 0;
let maxWrongGuesses = 8; // Maximum number of wrong guesses before game over

// Function to select a random word from the array
function getRandomWord() {
  const randomIndex = Math.floor(Math.random() * words.length);
  return words[randomIndex].toLowerCase();
}

// Function to update the game board
function updateGameBoard() {
  document.getElementById("gameBoard").textContent = gameBoard.join("");
}

// Function to update the guessed letters
function updateGuessedLetters() {
  document.getElementById("guesses").textContent =
    "Guesses made: " + guesses.join(", ");
}

// Function to handle user's guess
function makeGuess() {
  let guess = document.getElementById("guessInput").value.toLowerCase();
  if (guess.length !== 1 || !/[a-z]/.test(guess)) {
    document.getElementById("message").textContent =
      "Please enter a single letter.";
    return;
  }
  if (guesses.includes(guess)) {
    document.getElementById("message").textContent =
      "You already guessed that letter.";
    return;
  }

  guesses.push(guess);
  let correctGuess = false;

  for (let i = 0; i < solution.length; i++) {
    if (solution[i] === guess) {
      gameBoard[i] = guess;
      correctGuess = true;
    }
  }

  if (correctGuess) {
    document.getElementById("message").textContent = "Correct!";
  } else {
    document.getElementById("message").textContent = "Incorrect";
    numGuesses++;
    drawHangman();
  }

  updateGameBoard();
  updateGuessedLetters();

  if (!gameBoard.includes("-")) {
    document.getElementById("message").textContent = "You Win!";
    document.getElementById("guessInput").disabled = true;
  } else if (numGuesses === maxWrongGuesses) {
    document.getElementById("message").textContent = "Game Over! You Lost.";
    document.getElementById("guessInput").disabled = true;
  } else {
    document.getElementById("guessInput").value = "";
  }
}

// Function to draw the hangman
function drawHangman() {
  const canvas = document.getElementById("hangmanCanvas");
  const ctx = canvas.getContext("2d");

  // Draw the hangman parts based on the number of wrong guesses
  switch (numGuesses) {
    case 1:
      // Draw the head
      ctx.beginPath();
      ctx.arc(160, 60, 20, 0, Math.PI * 2);
      ctx.stroke();
      break;
    case 2:
      // Draw the body
      ctx.moveTo(160, 80);
      ctx.lineTo(160, 140);
      ctx.stroke();
      break;
    case 3:
      // Draw the left arm
      ctx.moveTo(160, 90);
      ctx.lineTo(130, 110);
      ctx.stroke();
      break;
    case 4:
      // Draw the right arm
      ctx.moveTo(160, 90);
      ctx.lineTo(190, 110);
      ctx.stroke();
      break;
    case 5:
      // Draw the left leg
      ctx.moveTo(160, 140);
      ctx.lineTo(130, 180);
      ctx.stroke();
      break;
    case 6:
      // Draw the right leg
      ctx.moveTo(160, 140);
      ctx.lineTo(190, 180);
      ctx.stroke();
      break;
    case 7:
      // Draw the rope
      ctx.beginPath();
      ctx.moveTo(160, 40);
      ctx.lineTo(220, 40); // Making the rope longer
      ctx.stroke();
      break;
    case 8:
      // Draw the beam
      ctx.beginPath();
      ctx.moveTo(220, 40);
      ctx.lineTo(220, 240); // Making the pole longer
      ctx.stroke();
      break;
  }
}

// Initialize the game board and guessed letters display
window.onload = function () {
  updateGameBoard();
  updateGuessedLetters();
};
