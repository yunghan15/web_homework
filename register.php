<?php
    //$connection = mysqli_connect("localhost","root","");
    $db = new mysqli("localhost", "root", "", "register");
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

    /*echo 'Success!!!<br>';
    echo 'Username: ';
    echo $userName;
    echo '<br>';
    echo 'Email: ';
    echo $email;
    echo '<br>';
    echo 'Password: ';
    echo $password;
    echo '<br>';
    echo 'Favorite color: ';
    echo $color;
    echo '<br>';
    echo 'Gender: ';
    echo $gender;

    mysqli_close($db);*/
    header("Location: success.html"); 
?>