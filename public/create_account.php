<!DOCTYPE html>
<html>
<head>
    <title>CPSC Final Project</title>
    <style>
        <style>
       
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 4px 4px 8px rgba(0, 0,0,0.05);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background: pink;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #EC297B;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #EC297B;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
    </style>
</head>
<body>
    <form action="register.php" method="post">
        <br>
        <label for="username">User Name:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>

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