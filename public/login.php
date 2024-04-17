<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$form_username = $_POST['username'];
$form_password = $_POST['password'];

$_POST['username'] = "";
$_POST['password'] = "";

// Query the database
$sql = "SELECT * FROM user WHERE username='$form_username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(password_verify($form_password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header('Location: index.php');
        } else {
            $_SESSION["error"] = "Username/Password incorrect";
            header('Location: index.php');
        }
    }
} else {
    $_SESSION["error"] = "Username/Password incorrect";
    header('Location: index.php');
}
$conn->close();
?>