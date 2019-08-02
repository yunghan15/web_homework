<?php
    //$connection = mysqli_connect("localhost","root","");
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $color = $_POST["color"];
    $gender = $_POST["gender"];

    $sql = "INSERT into register (userName, email, password, color, gender) VALUES ('{$userName}', '{$email}', '{$password}', '{$color}', '{$gender}')";

    $db->query($sql) or die($db->error . $sql);

    mysqli_close($db);
    header("Location: success.html"); 
?>