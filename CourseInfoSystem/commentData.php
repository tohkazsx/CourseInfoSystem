<?php
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="ZSXzsx123@";
    $dbname="db1752528";
 
$mysqli=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
{
	echo "���ݿ�����ʧ�ܣ�ԭ��Ϊ��".mysqli_connect_error();
	exit();
}
mysqli_query($mysqli,"set names utf-8");
$query="select comments.cid,cname,tname,comment_no,title,ctime from comments,course_info where comments.cid=course_info.cid order by ctime desc LIMIT 20";
$result=$mysqli->query($query);
 
if($result->num_rows==0)
{
    echo json_encode(['data'=>'<h2>δ�ҵ����������ļ�¼</h2>','sql'=>$query]);
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
