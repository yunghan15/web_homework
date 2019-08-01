<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    //get cookie
    /*msg=0: upload successfully
    msg=1: file exists 
    msg=2: post a topic*/
    $msg = $_COOKIE["msg"];
    $userName = $_COOKIE["userName"];

    //query personal information
    $sql = "SELECT * FROM `register` WHERE userName = '{$userName}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_object($result);

    $email = ($row->email);
    $gender = ($row->gender);
    $color = ($row->color);

    //query file information
    $sql = "SELECT * FROM `file` WHERE uploader = '{$userName}'";
    $result = mysqli_query($db, $sql);
    $fileName = "";
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
        #userTitle {
            text-transform: uppercase;
        }
        
        .personalPage {
            margin-top: 20px;
        }
        
        .fileName {
            text-decoration:none; 
            color:dimgray; 
            background: none; 
            border: none;
        }
        .container {
            height:auto;
            background: #fff;
        }
    </style>
      
    <script>
        if(<?php echo $msg ?> == "1")
            alert("File already existst!")
    </script>
        

    <title><?php echo $userName; ?></title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <div class="personalPage" id="userTitle">
            <center><h3><?php echo $userName; ?></h3></center>
        </div>
        <div class="personalPage" id="memInfo">
            <p>Email: <?php echo $email; ?></p>
            <p>Favorite Color: <?php echo $color; ?></p>
            <p>Gender: <?php echo $gender; ?></p>
        </div>
        <div class="personalPage" id="upload">
            <h5>Add File:</h5>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" id="file" class="btnFile"/>
                <input type="submit" name="submit" class="btnFile" value="Upload"/>
                <input type="hidden" name="userName" value="<?php echo $userName; ?>">
            </form>
        </div >
        <div class="personalPage" id="file">
            <h5>File:</h5>
            <form action="file.php" method="post">
                <?php
                    while ($row = mysqli_fetch_object($result)) {
                        $fileName = ($row->name);
                        ?><input class="fileName" type="submit" name="fileName" value="<?php echo $fileName; ?>">
                    <?php }?>
            </form>
        </div>
        <div class="messageBoard">
            <h5>Message Board:</h5>
                <?php setcookie("nserName", $userName); ?>
                <a href="messageBoard.php" style="font-decoration: none; color: gray;">Click me!</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
