<?php

    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $newName = $_POST["newName"];
    $fileName = $_POST["fileName"];
    $newDownloadLink = "upload/".$newName;

    //query the old data
    $sql = "SELECT * FROM `file` WHERE name = '{$fileName}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_object($result);
    $userName = ($row->uploader);
    
    //rename
    rename("upload/".$fileName, "upload/".$newName);
    $sql = "UPDATE file 
            SET downloadLink = '{$newDownloadLink}' WHERE name = '{$fileName}'";
    $sql2 = "UPDATE file 
            SET name = '{$newName}' WHERE name = '{$fileName}'";
    
    $db->query($sql) or die($db->error . $sql);
    $db->query($sql2) or die($db->error . $sql2);

    setcookie("userName", $userName, time()+3600);
    header("Location: personal_page.php");  
?>
