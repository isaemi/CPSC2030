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
                <form action="login.php" method="post">
                    <label for="username">UserName:</label><br>
                    <input type="text" id="username" name="username"><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password"><br>
                    <a href="#" onclick="window.open('create_account.php', 'newwindow', 'width=600,height=400'); return false;">Create Account</a>
                    <input type="submit" id="login" value="Login">
                </form>

        </div>
    </header>
    <div class="games">
        <div class="game">
            <img src="images/game1.png" alt="Logo">
            <br>
            <a href="gamePage1.php">
            <button class="gameButton"><a href="gamePage1.php">Play</a></button>
        </div>
        <div class="game">
        <img src="images/game2.png" alt="Logo">
        <br>
            <button class="gameButton"><a href="gamePage2.php">Play</a></button>
        </div>
        <div class="game">
        <img src="images/game3.png" alt="Logo">
        <br>
            <button class="gameButton"><a href="gamePage3.php">Play</a></button>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>