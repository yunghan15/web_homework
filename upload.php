<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");
    $time = date('Y-m-d H:i:s', time());
    $downloadLink = "upload/".$_FILES["file"]["name"];

    $sql = "INSERT into file (name, downloadLink, size, uploader, timestamp) VALUES ('{$_FILES["file"]["name"]}', '{$downloadLink}', '{$_FILES["file"]["size"]}', '{$_POST["userName"]}', '{$time}')";

    

    /*msg:0-----upload successfully
    1----same file name
    */
    if(file_exists("upload/".$_FILES["file"]["name"])){
        setcookie("msg", "1", time()+10);
    }
    else {
        $db->query($sql) or die($db->error . $sql);
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
        setcookie("msg", "0", time()+10);
    }
    setcookie("userName", $_POST["userName"], time()+36000);
    header("Location: personal_page.php");    
    
    
  
?>
