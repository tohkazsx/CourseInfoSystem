<?php
    header('Content-type:text/html; charset=UTF-8');
    session_start();
    ini_set('date.timezone','Asia/Shanghai');

    # 从session取得当前登录的用户名
    $username=$_SESSION['username'];
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="ZSXzsx123@";
    $dbname="db1752528";
 
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
{
	echo "数据库连接失败，原因为：".mysqli_connect_error();
	exit();
}
mysqli_query($mysqli,"set names utf-8");
$query="select comments.cid,cname,tname,comment_no,title,ctime from comments,course_info,user_info 
where comments.cid=course_info.cid and comments.uid=user_info.uid and user_info.username='{$username}'";
$result=$mysqli->query($query);
 
if($result->num_rows==0)
{
    echo json_encode(['data'=>'<h2>未找到符合条件的记录</h2>','sql'=>$query]);
    $mysqli->close();
    return ;
}
else
{
    //insert a new row in the table for each person returned
    while($row = $result->fetch_assoc()) {
        echo json_encode($row,JSON_UNESCAPED_UNICODE).' ';
    }
}
$mysqli->close();
?>
