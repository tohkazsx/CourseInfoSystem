<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="ZSXzsx123@";
    $dbname="db1752528";
 
    $comment_no=$_GET['comment_no'];
    $new_content=$_POST['content'];
    //echo "hello";
    //echo $comment_no;
    $mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno())
    {
	    echo "数据库连接失败，原因为：".mysqli_connect_error();
	    exit();
    }
    else
    {
        mysqli_query($mysqli,"set names utf-8");
        $sql = "UPDATE comments set content='{$new_content}' where comment_no={$comment_no}";
        if ($mysqli->query($sql) == TRUE) {
            header('refresh:3; url=myCom.html');
            echo "修改成功,即将返回我的评价页面";
        }
        else
        {
            header('refresh:3; url=myCom.html');
            echo "修改失败,即将返回我的评价页面";
        }
    }
?>
