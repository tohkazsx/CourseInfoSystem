<?php 
	header('Content-type:text/html; charset=UTF-8');
	// 开启Session
	session_start();
    ini_set('date.timezone','Asia/Shanghai');
	# 接收用户的登录信息
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);	
    //echo $username;
	//echo $password;
	// 判断提交的登录信息
	$mysqli=new mysqli('localhost','root','ZSXzsx123@','db1752528');
	if (mysqli_connect_errno())
	{
		echo "数据库连接失败，原因为：".mysqli_connect_error();
		exit();
	}
	$mysqli->set_charset("UTF-8");
	$pass_md5=md5($password);
	$query = "select * from user_info where username='$username' and password='$pass_md5'";
	//测试完改成md5
		
	$rs = $mysqli->query($query);//mysql_query() 函数执行一条 MySQL 查询。
	if(!$rs->num_rows)//没有查询到用户记录
	{
		header('refresh:3; url=login.html');//延迟转向 也就是隔几秒跳转
		echo "用户名或密码错误,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
		exit;
	}
	else
	{			
			$_SESSION['username'] = $username;
			$_SESSION['islogin'] = 1;
			// 处理完附加项后跳转到登录成功的首页
			header('location:index.html');//跳转到一个新的地址
			exit;
	}
?>