<?php 
	header('Content-type:text/html; charset=UTF-8');
    ini_set('date.timezone','Asia/Shanghai');
	# 接收用户的注册信息
	$username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);
    $realname = trim($_POST['realname']);
    $department = trim($_POST['department']);
	$mysqli=new mysqli('localhost','root','ZSXzsx123@','db1752528');
	if (mysqli_connect_errno())
	{
		echo "数据库连接失败，原因为：".mysqli_connect_error();
		exit();
	}
	$mysqli->set_charset("UTF-8");
	$pass_md5=md5($password);
	$sql = "select uid from user_info where username='$username' and password='$pass_md5'";
	$result=mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_row($result);
	$uid =$row[0];
	$query = "select * from user_info where username='$username'";
	$rs = $mysqli->query($query);
	if($rs->num_rows)
	{
		header('refresh:3; url=register.html');
		echo "用户名已存在，请重新注册<br>系统将在3秒后跳转到注册界面,请重新填写注册信息!";
		exit;
	}
	else
	{
		if (!preg_match('/((^(?=.*[a-z])(?=.*[A-Z])(?=.*\W)[\da-zA-Z\W]{12,20}$)|(^(?=.*\d)(?=.*[A-Z])(?=.*\W)[\da-zA-Z\W]{12,20}$)|(^(?=.*\d)(?=.*[a-z])(?=.*\W)[\da-zA-Z\W]{12,20}$)|(^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z\W]{12,20}$))/',$password))
		//if(!preg_match('/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[A-Za-z0-9]{12,20}/',$password))
		{
			echo "<script>alert('密码必须包含大写字母+小写字母+数字+特殊字符中至少三种，且长度12~20位')</script>";
			header('refresh:0; url=register.html');
        }
        else if($password!=$repassword)
        {
            echo "<script>alert('两次输入密码不一致')</script>";
			header('refresh:0; url=register.html');
        }
		else
		{
			$pass_md5=md5($password);
			$sql = "INSERT INTO user_info(username,password,realname,department) VALUES ('$username','$pass_md5','$realname','$department')";
			if ($mysqli->query($sql) == TRUE) {
			echo '<br>';
				header('refresh:3; url=login.html');
			echo '<br>';
				echo "用户".$username."注册成功<br>";
				echo "系统将在3秒后跳转到登陆界面!";
			} 
			else {
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}
			exit;
		}
	}
?>