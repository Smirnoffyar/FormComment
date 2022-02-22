<?php require 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script type="text/javascript" src="/app/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="/app/script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="image">
        <img src="/image/mercedes_cl_1x1280x1024.jpg" alt="auto">
    </div>
    <form action="sendMessage.php" method="post" name="form">
        <div class="author">
            <h3>Автор: </h3><input type="text" name="author" class="author_input" id="author">
        </div>
        <div class="comments">
            <h3>Комментарий: </h3><textarea name="comment" id="comment" cols="30" rows="5"></textarea>
        </div>
        <input name="script" type="hidden" value="no" id="script">
        <button type="submit" id="send" name="button" class="button">Отправить</button>
    </form>

    <div class="clear">

    </div>

    <p>Комментарии к фото</p>

    <div id="commentBlock">
    <?php
            $result = $mysql->query("SELECT * FROM `comment`");
            $comment = $result->fetch_assoc();
            do{echo "<div class='comment' style='border: 1px solid gray; margin-top: 1%; border-radius: 5px; padding: 0.5%;'>Автор: <strong>".$comment['author']."</strong><br>".$comment['comment']."</div>";
          }while($comment = $result->fetch_assoc());
          ?>

    </div>
    
</body>
</html>