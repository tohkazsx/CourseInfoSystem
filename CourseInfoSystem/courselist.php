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
mysqli_query($mysqli,"set names utf-8");
$query="select * from course_info";
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
