<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['username']);
$pass = validate($_POST['password']);


if(empty($username)){
    header ("Location: index.php?erro=User Name is required");
    exit();
}
else if(empty($pass)){
    header("Location: index.php?error=Password is required");
    exit(); 
}

$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
$result = mysqli_query($conn, $sql);


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