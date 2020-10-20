<?php 
    header('Content-type:text/html; charset=UTF-8');
    session_start();
    ini_set('date.timezone','Asia/Shanghai');
    
    # 接收用户提交的课程评价 从session取得当前登录的用户名
	$username=$_SESSION['username'];
    //echo $username;
    $cid = trim($_POST['cid']);
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    //echo $cid;
    //echo $title;
    //echo $content;
    $mysqli=new mysqli('localhost','root','ZSXzsx123@','db1752528');
    if (mysqli_connect_errno())
	{
        echo "数据库连接失败，原因为：".mysqli_connect_error();
		exit();
    }
    else
    {
        //echo "连接成功";
    }
    $mysqli->set_charset("UTF-8");
    //先根据username 查询出uid 用于进一步操作
    $query = "select * from user_info where username='$username'";
    $result = $mysqli->query($query);
    if(!$result->num_rows)//没有查询到用户记录
	{
		header('refresh:3; url=login.html');//延迟转向 也就是隔几秒跳转
		echo "错误！用户不存在，请重新登录";
		exit;
	}
	else
	{	
        while($row=$result->fetch_assoc()){
            $uid=$row['uid'];
        }
        //echo $uid;
        //查询课号是否存在
        $query = "select * from course_info where cid='{$cid}'";
	    $result = $mysqli->query($query);
        if(!$result->num_rows)
        {//没有查询到课程记录
		    header('refresh:3; url=writeCom.html');//延迟转向 也就是隔几秒跳转
		    echo "错误！课程不存在，即将返回评价界面，请重新选择课程";
		    exit;
        }
        else
        {
            //课程存在
            //echo "课程存在 执行插入";
            $query = "INSERT INTO comments(cid,uid,title,content,ctime) VALUES({$cid},{$uid},'{$title}','{$content}',NOW())";
            if ($mysqli->query($query) == TRUE) {  //插入成功 返回
                echo "评价成功！即将返回评价界面";
                header('refresh:3; url=writeCom.html');
                exit;
            }
            else
            {
                echo "评价失败,数据库IO错误,即将返回评价界面,建议重新登录";
                header('refresh:3; url=writeCom.html');
            }
        }
    }
?>