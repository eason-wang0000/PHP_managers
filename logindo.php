<?php
//用户访问系统时，首先根据session判定用户是否登录。未登录用户访问系统时强制跳转到登录页面
session_start();
if(isset($_SESSION["userName"])){
	header("location:index.php");
}
//取出表单数据
$userName = $_REQUEST["userName"];
$password = $_REQUEST["password"];
$password = sha1($password);
//连接服务器
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//写查询语句
$sql = "select * from account where userName='$userName' and password='$password'";
echo $sql;
//查询
$result = mysql_query($sql,$conn);
if($result){
	//取出结果集中的第一行
	$row = mysql_fetch_assoc($result);
	//查询存在输入的用户名和密码,$row变量内容不为空，$row是一个关联数组，if(布尔值)，自动将关联数组转换为true
	if($row){
		//保存登录信息
		$_SESSION["userName"] = $userName;
		header("location:index.php");
	}else{
		//如果没有记录，结果为null,自动转换为false
		echo "用户名或者密码错！！<a href='3.1login.php'>重新登录</a>";
	}
}else{
	echo "查询失败！！";
}
?>
