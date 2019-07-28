<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $userName = $_POST["userName"];
    $inputPassword = $_POST["password"];

    $sql = "SELECT * FROM `register` WHERE userName = '{$userName}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_object($result); 

    setcookie("redirection", "true", time()+3600);
    
    //no such usename in databaswe
    if(empty($row)) {
        setcookie("errNo", "0", time()+3600); //errNo 0: no such account
        header("Location: login.html");
    }
    //query success
    else {
        $password = ($row->password);
        
        //wrong password
        if ($password != $inputPassword) {
            setcookie("errNo", "1", time()+3600); //errNo 0: wrong password
            header("Location: login.html");
        }
        //success and redirect to personal page
        else {
            setcookie("userName", $userName, time()+36000);
            setcookie("msg", "0", time()+36000);
            header("Location: personal_page.php");           
        }
    }
    mysqli_free_result($result);
    mysqli_close($db);
?>