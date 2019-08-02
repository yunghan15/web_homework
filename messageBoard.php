<?php
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    $db->set_charset("utf8");

    //get userName
    $userName = $_GET["userName"];

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
 
    <title>Message Board</title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <div class="personalPage" id="userTitle">
            <center><h3>Message Board</h3></center>
        </div>
        <div class="newTopic">
            <center><h4>New Topic</h4></center>
            <form action="newTopic.php" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                    <input type="hidden" name="userName" value="<?php echo $userName; ?>">
                    <center><button class="msgBtn" type="submit">POST</button></center>
                </div>
            </form>
        </div>
        <div class="topicList">
            <center><h4>Topic List</h4></center>
            <?php while($row = mysqli_fetch_object($result)) { 
                $topicContent = ($row->content);
                $topicUserName = ($row->userName);
                $topicId = ($row->id);
                $topicTime = ($row->time);?>
                <div class="topic">
                    <h5 style="text-transform: uppercase;">
                        <?php echo $topicUserName; 
                        if ($userName == $topicUserName) { ?>
                            <a href="edit.php?msg=0&id=<?php echo $topicId; ?>&userName=<?php echo $userName; ?>" style="color: #407072; text-decoration: none;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete.php?msg=0&id=<?php echo $topicId; ?>&userName=<?php echo $userName; ?>" style="color: #407072;  text-decoration: none;">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        <?php } ?>
                    </h5>
                    <div class="content" style="word-break: break-all;">
                        <?php echo $topicContent; ?>
                        <p style="font-size: 13px; color: #828282;">
                            <?php echo $topicTime; ?>
                        </p>                       
                    </div>
                    <div class="reply" style="margin-left: 25px; margin-right: 25px; margin-top: 25px;">
                        <div class="replyContent">
                            <?php $sql = "SELECT * FROM `reply` WHERE id = '{$topicId}'"; 
                            $replyResult = mysqli_query($db, $sql);
                            while($replyRow = mysqli_fetch_object($replyResult)) {
                                $replyContent = ($replyRow->content);
                                $replyId = ($replyRow->id);
                                $replyTime = ($replyRow->time); 
                                $replyUserName = ($replyRow->userName);
                                $deleteId = ($replyRow->deleteId); ?>
                                <h6 style="text-transform: uppercase;">
                                    <?php echo $replyUserName;                        
                                    if ($userName == $replyUserName) { ?>
                                        <a href="edit.php?msg=1&id=<?php echo $deleteId; ?>&userName=<?php echo $userName; ?>" style="color: #407072;  text-decoration: none;">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete.php?msg=1&id=<?php echo $deleteId; ?>&userName=<?php echo $userName; ?>" style="color: #407072;  text-decoration: none;">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php } ?>
                                </h6>
                                <p><?php echo $replyContent; ?></p>
                                <p style="font-size: 12px; color: #828282;">
                                    <?php echo $topicTime; ?>
                                </p>                                
                            <?php }?>
                        </div>
                        <form action="reply.php" method="post">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="content"></textarea>
                                <input type="hidden" name="userName" value="<?php echo $userName; ?>">
                                <input type="hidden" name="id" value="<?php echo $topicId; ?>">
                                <center><button class="msgBtn" type="submit">REPLY</button></center>
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
