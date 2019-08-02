<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $msg = $_POST["msg"];
    $id = $_POST["id"];
    $userName = $_POST["userName"];
    $content = $_POST["content"];
    $time = date('Y-m-d H:i:s', time());
    
    //edit topic
    if($msg == "0") {
        $sql = "UPDATE `topic` SET `content` = '{$content}' ,`time` = '{$time}' WHERE id = {$id}";
    }
    //edit specific reply
    else if($msg == "1") {
        $sql = "UPDATE `reply` SET `content` = '{$content}' ,`time` = '{$time}' WHERE deleteId = {$id}";
    }        
    $db->query($sql) or die($db->error . $sql);
    header("Location: messageBoard.php?userName=".$userName);
?>
