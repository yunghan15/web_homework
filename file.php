<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    $fileName = $_POST["fileName"];
    
    $sql = "SELECT * FROM `file` WHERE name = '{$fileName}'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_object($result);

    $size = ($row->size);
    $time = ($row->timestamp);
    $downloadLink = ($row->downloadLink);
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
        .download_rename {
            text-align: center;
            background: #AAAAAA;
            text-decoration: none;
            margin-top: 10px;
        }
        
    </style>

      
<title><?php echo $fileName; ?></title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <div class="fileName">
            <center><h3><?php echo $fileName; ?></h3></center>
        </div>
        <div class="fileInfo">
            <p>Size: <?php echo $size; ?> kb</p>
            <p>Upload Time: <?php echo $time; ?></p>
        </div>
        <div>   
            <form action="rename.php" method="post">
                <input type="text" class="form-control" placeholder="Enter a new name" name="newName">
                <input type="hidden" name="fileName" value="<?php echo $fileName; ?>">
                <input type="submit" class="button" value="Rename">
            </form>
        </div>            
        <div class="download_rename col-5 col-sm-4 col-xl-3">
            <a href="<?php echo $downloadLink ?>" download="<?php echo $fileName ?>" style="text-decoration:none; color:#ffffff;">Download</a>
        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>