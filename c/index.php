<?php

include('config.php');

mysql_connect($mysql['host'], $mysql['login'], $mysql['password']);
mysql_select_db($mysql['dbName']);

if (@$_POST['login'] && @$_POST['content']) {

    $time = time();
    $login = $_POST['login'];
    $content = $_POST['content'];

    mysql_query("INSERT INTO `chat` (`login`, `data`, `content`) VALUES ('$login', '$time', '$content') ");
}



$posts = mysql_query("SELECT * FROM `chat` ORDER BY `id` DESC LIMIT 20");



echo '<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
    
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


<script>

$(function(){
    $(document).scrollTop($(document).height());
});

</script>

</head>

<body>';





while ($post = mysql_fetch_assoc($posts)) {
    
    echo '<div>
        <div><small>'.date("d-m-Y H:i", $post['data']).'</small></div>
        <strong>'.$post['login'].':</strong> '.$post['content'].'

        <hr />
    </div>';
}




echo '

<form action="" method="post">
<table>
    <tr>
        <td style="width: 20%">
            Login:
        </td>
        <td>
            <input type="text" name="login" value="'.(@$_POST['login']).'" />
        </td>
    </tr>
    <tr>
        <td>
            Wiadomość:
        </td>
        <td>
            <textarea style="width: 100%; max-width: 100%; min-width: 100%; height: 70px;" name="content" ></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2">
        <input type="submit" value="wyślij" />
        </td>
    </tr>
</form> 

</body>
</html>';
