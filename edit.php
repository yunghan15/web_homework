<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");
    
    $msg = $_GET["msg"];
    $userName = $_GET["userName"];
    $ID = $_GET["id"];
    //edit topic
    if($msg == "0")
        $sql = "SELECT `content` FROM `topic` WHERE id = {$ID}";
    //edit reply
    else if($msg == "1")
        $sql = "SELECT `content` FROM `reply` WHERE deleteId = {$ID}";

    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_object($result);
    $content = $row->content;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #92c8d3;
        }
        .container {
            height:auto;
            background: #fff;
        }
        .msgBtn {
                background-color: #407072;
                border: none;
                color: white;
                padding: 5px 10px;
                text-align: center;
                display: inline-block;
                margin: 20px;
                border-radius: 10px;
        }
    </style>
      
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/ab129dd4e6.js"></script>
 
    <title>Edit</title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <div class="personalPage" id="userTitle">
            <center><h3>Edit</h3></center>
        </div>
        <form action="editDB.php" method="post">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="content"><?php echo $content; ?></textarea>
                <input type="hidden" name="userName" value="<?php echo $userName; ?>">
                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                <input type="hidden" name="msg" value="<?php echo $msg; ?>">
                <center><button class="msgBtn" type="submit">SUBMIT</button></center>
            </div>
        </form>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>