<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$form_username = $_POST['username'];
$form_password = $_POST['password'];

if (!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $form_password)) {
    $_SESSION["error"] = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters";
    header("Location: create_account.php");
    exit;
}

$form_password = password_hash($form_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, password) VALUES ('$form_username', '$form_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo '<script>window.close();</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo '<script>window.close();</script>';
exit;
?>