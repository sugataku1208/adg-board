<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$db_host = 'localhost';
$db_name = 'board_db';
$db_user = 'board_user';
$db_pass = 'board_pass';

$link = mysqli_connect( $db_host, $db_user, $db_pass, $db_name );
if ( $link !== false ) {
    $msg     = '';
    $err_msg = '';
    $name_err_msg = '';
    $comment_err_msg = '';
    $name = '';
    $comment = '';
    if ( isset( $_POST['send'] ) === true && $_SERVER["REQUEST_METHOD"]==="POST" ) {
        $name     = $_POST['name'];
        $comment = $_POST['comment'];
        if ( $name !== '' && $comment !== '' ) {
            $query = " INSERT INTO board ( "
                   . "    name , "
                   . "    comment "
                   . " ) VALUES ( "
                   . "'" . mysqli_real_escape_string( $link, $name ) ."', "
                   . "'" . mysqli_real_escape_string( $link, $comment ) . "'"
                   ." ) ";
            $res = mysqli_query( $link, $query );
            if ( $res !== false ) {
                $msg = '書き込み完了';
                header('Location:http://localhost/board/index.php');
            }else{
                $err_msg = '書き込みに失敗しました';
            }
        }else{
            $name_err_msg = '名前を記入してください';
            $comment_err_msg = 'コメントを記入してください';
        }
    }
    $query  = "SELECT id, name, comment FROM board";
    $res    = mysqli_query( $link,$query );
    $data = array();
    while( $row = mysqli_fetch_assoc( $res ) ) {
        array_push( $data, $row);
    }

    asort( $data );


} else {
    echo "データベースの接続に失敗しました";
}

mysqli_close( $link );
?>
