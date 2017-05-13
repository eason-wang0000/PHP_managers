<?php
// 取出表单数据
if (isset ( $_REQUEST ["userName"] )) {
	$userName = $_REQUEST ["userName"];
	$password = $_REQUEST ["password"];
	$password2 = $_REQUEST ["password2"];
	if(strlen($userName)<6||strlen($password)<6){
		header ( "location:register.php?error=用户名和密码长度必须大于6！！" );
	}elseif ($password != $password2){
	// die("两次密码不一致！！<a href='register.php'>返回</a>");
	header ( "location:register.php?error=两次密码不一致！！" );
	} else{
		// 加密密码：md5,32个字符。sha1：40个字符
		$password = sha1 ( $password );
		// 连接服务器
		$conn = mysql_connect ( "localhost:3306", "root", "" );
		mysql_set_charset ( "gbk", $conn );
		mysql_select_db ( "gdmec" );
		// 写查询语句
		$sql = "insert into account values(null,'$userName','$password','1')";
		echo $sql;
		// 查询
		$result = mysql_query ( $sql, $conn );
		// 返回值true/false
		if ($result) {
			header ( "location:login.php" );
		} else {
			echo "保存失败！！";
		}
	}
}
?>
