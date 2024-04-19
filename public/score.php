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
        <div class="login-info">
            <?php

            session_start();
            if (isset($_SESSION['username'])) {
                echo '<span>Welcome, ' . $_SESSION['username'] . '!</span>';
                echo '<button class="log">Score</button>';
            } else {
                echo '<a href="score.php">Score</a>';
            }
            if (isset($_SESSION['username'])) {
                echo '<span>Welcome, ' . $_SESSION['username'] . '!</span>';
                echo '<button class="log">Logout</button>';
            } else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </div>

    </header>
    <div class="games">
        <div class="game">
            <h1>Score</h1>
            <?php
            
            require ('../model/database.php');

            function print_scores($scores) {
                echo '<table border="1">
                        <tr>
                            <th>Game Name</th>
                            <th>Name</th>
                            <th>score</th>
                        </tr>';
                foreach ($scores as $score) {
                    echo '<tr>
                            <td>' . $score['gamename'] .' </td>
                            <td>' . $score['uname'] . '</td>
                            <td>' . $score['score'] . '</td>
                        </tr>';
                }
                echo '</table>';
            }

            $query = "SELECT * FROM score ORDER BY score DESC";
            $result = $conn->query($query);
            
            if ($result == false) {
                $error_message = $db->error;
                echo "<p>An error occurred: $error_message</p>";
            } else {
                $scores = $result->fetch_all(MYSQLI_ASSOC);

                print_scores($scores);
            }    
            ?>
        </div>

    </div>
    <script src="script.js"></script>
</body>

</html>

<!--
  session_start();
  if (isset($_SESSION['score'])) {
  echo '<p>Your Score: ' . $_SESSION['score'] . '</p>';
  ?> -->