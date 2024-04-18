<?php
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "project_db";

$conn = new mysqli($sname, $uname, $password, $db_name);
$sql = "SELECT * FROM score";


    if($result = $conn -> query($sql)){
        foreach($result as $row){
            $gamename = $row['gamename'];
            $uname = $row['uname'];
            $score = $row['score'];
        }
    }
?>