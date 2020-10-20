<?php 
    header('Content-type:text/html; charset=UTF-8');
    session_start();
    ini_set('date.timezone','Asia/Shanghai');
    if(!empty($_SESSION['username'])){       //判断存储用户名的  Session 会话变量是否为空
        $username = $_SESSION['username'];     //将会话变量赋予一个变量
      }
      else
      echo "是空的";
    echo $username;
?>