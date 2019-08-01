<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    //insert
    $userName = $_POST["userName"];
    $content = $_POST["content"];
    $id = $_POST["id"];
    $time = date('Y-m-d H:i:s', time());
    
    $sql = "INSERT into reply (id, userName, content, time) VALUES ('{$id}', '{$userName}', '{$content}', '{$time}')";

    $db->query($sql) or die($db->error . $sql);

    header("Location: messageBoard.php");  

?>