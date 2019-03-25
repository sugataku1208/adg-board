<?php

$db_host = 'localhost';
$db_name = 'board_db';
$db_user = 'board_user';
$db_pass = 'board_pass';

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

$msg = '';
$err_msg = '';

if(isset( $_POST['send']) === true){
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    if( $name !== '' && $comment !== ''){

        $query = "INSERT INTO board ("
                . " name,"
                ."comment"
                .") VALUES ("
                ."'". mysqli_real_escape_string( $link, $name) ."'"
                ."'". mysql_real_escape_string($link,$comment)
                ." ) ";

                $res = mysqli_query($link, $qurey);

                if( $res !== false){
                    $msg ='書き込みに成功しました';
                }else{
                    $err_msg ="書き込みに失敗しました";
                }
             }else{
                 $err_msg = '名前とコメントを記入してください';
             }

             $query = "SELECT id, name, comment, FROM board";
             $res = mysqli_query( $link,$query);
             $data = array();
             while($row = mysqli_fetch_assoc( $res )){
                 array_push($data, $row);
             }
             arsort( $data);
}else{
    echo "データベースの接続に失敗しました";
}

mysqli_close( $link );
?>