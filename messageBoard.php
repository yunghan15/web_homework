<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    //get cookie
    $userName = $_COOKIE["userName"];

    //query topic
    $sql = "SELECT * FROM `topic`";
    $result = mysqli_query($db, $sql);


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
    </style>
 
    <title>Message Board</title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <div class="personalPage" id="userTitle">
            <center><h3>Message Board</h3></center>
        </div>
        <div class="newTopic">
            <h5>New Topic:</h5>
            <form action="newTopic.php" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                    <input type="hidden" name="userName" value="<?php echo $userName; ?>">
                    <center><button class="button" type="submit" class="btn btn-default">POST</button></center>
                </div>
            </form>
        </div>
        <div class="topicList">
            <h5>Topic List:</h5>
            <?php while($row = mysqli_fetch_object($result)) { 
                $content = ($row->content);
                $userName = ($row->userName);
                $id = ($row->id);
                $time = ($row->time);?>
                <div class="topic">
                    <h6>Autor: <?php echo $userName; ?></h6>
                    <div class="content">
                        <?php echo $content; ?>
                    </div>
                    <div class="reply" style="margin-left: 25px; margin-top:5px;">
                        <div class="replyContent">
                            <h6>Reply: </h6>
                            <?php $sql = "SELECT * FROM `reply` WHERE id = '{$id}'"; 
                            $replyResult = mysqli_query($db, $sql);
                            while($replyRow = mysqli_fetch_object($replyResult)) {
                                $replyContent = ($replyRow->content);
                                $replyId = ($replyRow->id);
                                $replyuserName = ($replyRow->userName);
                                $replyTime = ($replyRow->time); ?>
                                <h6>Autor: <?php echo $replyuserName; ?></h6>
                                <p><?php echo $replyContent; ?></p>
                            <?php }?>
                        </div>
                        <form action="reply.php" method="post">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="content"></textarea>
                                <input type="hidden" name="userName" value="<?php echo $userName; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <center><button class="button" type="submit" class="btn btn-default">REPLY</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
