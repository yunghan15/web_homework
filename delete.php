<?php

    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");
    
    $msg = $_GET["msg"];
    $userName = $_GET["userName"];
    $ID = $_GET["id"];
    
    //delete topic and related reply
    if($msg == "0") {
        //delete topic
        $sql = "DELETE FROM `topic` WHERE id = {$ID}";
        $db->query($sql) or die($db->error . $sql);

        //delete related reply
        $sql = "DELETE FROM `reply` WHERE id = {$ID}";
        $db->query($sql) or die($db->error . $sql);
    }
    //delete specific reply
    else if($msg == "1") {
        $sql = "DELETE FROM `reply` WHERE deleteId = {$ID}";
        $db->query($sql) or die($db->error . $sql);
    }

    mysqli_close($db);
    header("Location: messageBoard.php?userName=".$userName);

?>