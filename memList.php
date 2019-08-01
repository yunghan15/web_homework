<?php    
    $db = new mysqli("localhost", "root", "", "web_homework");
    if ($db->connect_error) {
        die('無法連上資料庫：' . $db->connect_error);
    }
    
    $sql = "SELECT * FROM `register`";
    $result = mysqli_query($db, $sql);
?>
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
        .table {
            margin-top: 10px;
            border: none;
        }
        
    </style>
      
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/ab129dd4e6.js"></script>
      
    <title>MEMBER LIST</title>
  </head>
  <body>
    <div class="container form-control col-8 col-sm-8 col-xl-4">
        <center><h3>MEMBER LIST</h3></center>
        
        <table style="border: none;">
            <tr>
                <td width="100px"><center><i class="fas fa-user"></i></center></td>
                <td width="300px"><center><i class="fas fa-envelope"></i></center></td>
                <td width="75px"><center><i class="fas fa-venus-mars"></i></center></td>
            </tr>
            <?php 
                while($row = mysqli_fetch_object($result)) { 
                    $userName = $row->userName;
                    $email = $row->email;
                    $gender = $row->gender; ?>
            <tr>
                <td><center><?php echo $userName; ?></center></td>
                <td><center><?php echo $email; ?></center></td>
                <td><center><?php echo $gender; ?></center></td>                
            </tr> <?php } ?>

        </table>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>