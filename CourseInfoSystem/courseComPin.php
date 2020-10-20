<?php
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

$cid=$_POST['cid'];
//echo $cid;

mysqli_query($mysqli,"set names utf-8");

$query="select comment_no,cname,tname,department,uid,title,content,ctime from course_info,comments  
where course_info.cid=comments.cid and comments.cid='{$cid}'";
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
