<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<title>My Game Website</title>
<script src="https://kit.fontawesome.com/977a29eff2.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">    
                <img src="images/logo2.png" alt="Logo" width="200">
            </a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="login-info">
            <?php

            session_start();
            if (isset($_SESSION['username'])) {
                echo '<span>Welcome, ' . $_SESSION['username'] . '!</span>';
                echo '<button>Score</button>';
            } else {
                echo '<a href="score.php">Score</a>';
            }
            if (isset($_SESSION['username'])) {
                echo '<span>Welcome, ' . $_SESSION['username'] . '!</span>';
                echo '<button>Logout</button>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>
    </header>
    <div class="games">
        <div class="game">
    <h1>Welcome to Hangman!</h1>
    <div id="game">
        <p id="gameBoard"></p>
        <p id="message"></p>
        <p id="guesses"></p>
        <input type="text" id="guessInput" placeholder="Enter your guess">
        <button onclick="makeGuess()">Guess</button>
    </div>
    <br>
    <br>
    <canvas id="hangmanCanvas" width="300" height="200"></canvas>


         </div>
    </div>
    <script src="script3.js"></script>
</body>
</html>
