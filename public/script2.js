const gameBoard = document.getElementById('gameBoard');
const scoreDisplay = document.getElementById('score');
const highScoreDisplay = document.getElementById('highScore');
const startButton = document.getElementById('startButton');

let cells = [];
let score = 0;
let activeCellIndex = -1;
let gameTimer;
let highScore = localStorage.getItem('highScore') || 0;
highScoreDisplay.textContent = highScore;

function setupBoard() {
    for (let i = 0; i < 9; i++) {
        const cell = document.createElement('div');
        cell.classList.add('cell');
        cell.dataset.index = i;
        gameBoard.appendChild(cell);
        cells.push(cell);
        cell.addEventListener('click', () => {
            if (parseInt(cell.dataset.index) === activeCellIndex) {
                increaseScore();
                deactivateCell(activeCellIndex);
            }
        });
    }
}

function startGame() {
    resetScore();
    startButton.disabled = true;
    activateRandomCell();
    gameTimer = setInterval(activateRandomCell, 1000);
    setTimeout(() => {
        clearInterval(gameTimer);
        startButton.disabled = false;
    }, 15000); // Run the game for 15 seconds
}

function activateRandomCell() {
    deactivateCell(activeCellIndex);
    const randomIndex = Math.floor(Math.random() * cells.length);
    cells[randomIndex].classList.add('active');
    activeCellIndex = randomIndex;
}

function deactivateCell(index) {
    if (index !== -1) {
        cells[index].classList.remove('active');
    }
}

function increaseScore() {
    score++;
    scoreDisplay.textContent = score;
    if (score > highScore) {
        highScore = score;
        highScoreDisplay.textContent = highScore;
        localStorage.setItem('highScore', highScore);
    }
}

function resetScore() {
    score = 0;
    scoreDisplay.textContent = score;
}

setupBoard();
startButton.addEventListener('click', startGame);
