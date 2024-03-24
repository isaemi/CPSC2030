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
            <img src="images/logo2.png" alt="Logo" width="200">
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="login-info">
            <?php
                session_start();
                if(isset($_SESSION['username'])) {
                    echo '<span>Welcome, '.$_SESSION['username'].'!</span>';
                    echo '<button>Logout</button>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
            ?>
        </div>
    </header>
    <div class="games">
        <div class="game">
            <h2>Game 1</h2>
            <p>Description of Game 1</p>
            <button>Play</button>
        </div>
        <div class="game">
            <h2>Game 2</h2>
            <p>Description of Game 2</p>
            <button>Play</button>
        </div>
        <div class="game">
            <h2>Game 3</h2>
            <p>Description of Game 3</p>
            <button>Play</button>
        </div>
    </div>
</body>
</html>
