<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    //get count of total topic
    $sql = "SELECT * FROM `topic`";
    $result = mysqli_query($db, $sql);
    $time = date('Y-m-d H:i:s', time());

    //insert
    $userName = $_POST["userName"];
    $content = $_POST["content"];
    
    $sql = "INSERT into topic (userName, content, time) VALUES ('{$userName}', '{$content}', '{$time}')";

    $db->query($sql) or die($db->error . $sql);

    setcookie("userName", $userName, time()+15);
    header("Location: messageBoard.php?userName=".$userName); 

?>