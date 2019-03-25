<?php require("function.php");?>
<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <link rel = "stylesheet" href = "style.css">
    <script src = "//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>掲示板</title>
</head>
<body id = "main-form">
    <section class = "main-area">
       <?php if ( $msg !== '' ) echo '<p>' . $msg . '</p>'; ?>
        <h1>掲示板</h1>
        <form action = "" method = "post">
            <div class = "name">
                名前 <input id = "name" type = "text" name = "name" autocomplete = "off" value = ""><?php if ( $name !== '' ) echo '<p style = "color:#FF0105;">' . $name_err_msg . '</p>'; ?><br>
            </div>
            コメント<textarea id = "comment" name = "comment" cols = "30" rows = "10" value = ""></textarea><?php if ( $comment !== '' ) echo '<p style = "color:#FF0105;">' . $comment_err_msg . '</p>'; ?>
            <br>
            <input id = "bt" type="submit" value = "更新" name = "send" >
        </form>
    </section>
    <section class = "sub-area">
        <?php
            foreach ($data as $key => $val) {
                echo $val['name'] . '<br>' . $val['comment'] . '<br>';
            }
        ?>
    </section>
</body>
</html>
