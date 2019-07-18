<?php
    $db = new mysqli("localhost", "root", "", "register");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $userName = $_POST["userName"];

    $sql = "SELECT * FROM `register` WHERE userName = '{$userName}'";
    $result = mysqli_query($db, $sql);
    //echo gettype($result);

    while($obj = mysqli_fetch_object($result)) {
       $email = ($obj->email);
       $password = ($obj->password);
       $color = ($obj->color);
       $gender = ($obj->gender);
    }

    mysqli_close($db);

    /*session_start(); 
    $_SESSION["userName"] = $userName;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["color"] = $color;
    $_SESSION["gender"] = $gender;*/

    setcookie("userName", $userName, time()+3600);
    setcookie("email", $email, time()+3600);
    setcookie("password", $password, time()+3600);
    setcookie("color", $color, time()+3600);
    setcookie("gender", $gender, time()+3600);
    
    header("Location: login2.html"); 
?>