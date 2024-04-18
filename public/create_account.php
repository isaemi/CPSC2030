<!DOCTYPE html>
<html>
<head>
    <title>CPSC Final Project</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Select a user name:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Choose a password:</label><br>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <?php
        if(isset($_SESSION["error"])) {
            echo '<span class="error">' . $_SESSION["error"] . '</span>';
            unset($_SESSION["error"]);
        }
        ?>
        <br>
        <input type="submit" value="Register">
    </form>
</body>
</html>