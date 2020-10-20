<?php 
    header('Content-type:text/html; charset=UTF-8');
    session_start();
    ini_set('date.timezone','Asia/Shanghai');
	# 接收用户的补充信息
    $telephone = trim($_POST['telephone']);
    $email = trim($_POST['email']);
    $intro = trim($_POST['intro']);
    $username=$_SESSION['username'];
    //echo $telephone;
    //echo $email;
    //echo $intro;

	$mysqli=new mysqli('localhost','root','ZSXzsx123@','db1752528');
	if (mysqli_connect_errno())
	{
		echo "数据库连接失败，原因为：".mysqli_connect_error();
		exit();
	}
	$mysqli->set_charset("UTF-8");
	$sql = "select uid from user_info where username='{$username}'";
	$result=mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_row($result);
    $uid =$row[0];
    //echo $uid;
    //取得了uid
	$query = "select * from user_detail where uid='{$uid}'";
	$result = $mysqli->query($query);
	if($result->num_rows)
	{
        //有结果 说明该次提交是修改
        //echo "修改";
        $query = "update user_detail set telephone='{$telephone}',email='{$email}',intro='{$intro}' where uid=${uid}";
        if($mysqli->query($query)==TRUE)
        {
            header('refresh:3; url=profile.html');
            echo "修改成功，即将跳转回个人资料页面";
        }
        else
        {
            header('refresh:3; url=profile.html');
            echo "异常失败，即将跳转回个人资料页面";
        }
	}
	else
	{
        //否则添加一项
        //echo "添加";
        $query = "INSERT INTO user_detail values({$uid},'{$telephone}','{$email}','{$intro}')";
        //echo "构造语句";
        //echo $query;
        if($mysqli->query($query)==TRUE)
        {
            header('refresh:3; url=profile.html');
            echo "完善成功，即将跳转回个人资料页面";
        }
        else
        {
            header('refresh:3; url=profile.html');
            echo "异常失败，即将跳转回个人资料页面";
        }
	}
?>