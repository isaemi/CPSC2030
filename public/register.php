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

// Validate password
if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $form_password)) {
    $_SESSION["error"] = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    header("Location: create_account.php");
    exit;
}

$form_password = password_hash($form_password, PASSWORD_DEFAULT);

// Insert the new user into the database
$sql = "INSERT INTO user (username, password) VALUES ('$form_username', '$form_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo '<script>window.close();</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect back to the login page
echo '<script>window.close();</script>';
exit;
?>