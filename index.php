<?php require("function.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>掲示板</title>
    <script language="javascript" type="text/javascript">
        function emptycheck() {

            var name=document.getElementById("name").value;
            var name_error=document.getElementById("name_error");
            var comment=document.getElementById("comment").value;
            var comment_error=document.getElementById("comment_error");
            var complete = document.getElementById("complete");

            if(name == "" && comment == ""){

                name_error.style.color="red";
                name_error.innerHTML="名前を入力してください";
                name_error.style.display="block";
                comment_error.style.color="red";
                comment_error.innerHTML="コメントを入力してください";
                comment_error.style.display="block";
                return false;
            }
            if(name == ""){

                name_error.style.color="red";
                name_error.innerHTML="名前を入力してください";
                name_error.style.display="block";
                return false;

            }else{

                name_error.style.display="none";

            }

            if(comment == ""){

                comment_error.style.color="red";
                comment_error.innerHTML="コメントを入力してください";
                comment_error.style.display="block";

                return false;

            }else{

                comment_error.style.display="none";

            }

            if(name != "" && comment != ""){

                complete.innerHTML="更新完了";
                $("#name,#comment").val("");

            }else{

                complete.style.display="none";

            }

            $("ul").append("<li>"+name,comment+"</li>");

        }
    </script>

</head>
<body id="main-form">
    <section class="main-area">
        <h2><span id = "complete"></span></h2>
        <h1>掲示板</h1>
        <form action="" method="post">
            <div class="name">
                名前 <input id="name" type="text" name="name" autocomplete="off" value=""><span id="name_error"></span><br>
            </div>

            コメント<textarea id="comment"name="comment" id="" cols="30" rows="10" value=""></textarea><span id="comment_error"></span>
            <br>
            <input id="bt"   type="button" value="更新" name="send" onclick="emptycheck();">

        </form>

    </section>
    <section class="sub-area">

        <div>
            <ul>

            </ul>

        </div>
    </section>
</body>

</html>