<?php 
session_start();
if(!isset($_SESSION["userName"])){
	header("location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<script type="text/javascript" src="js/Calendar3.js"></script>
<title>查询</title>
</head>
<body>
<div>
用户名：<?=$_SESSION["userName"]?>
</div>
<center>
	<b>增加学生</b>
</center>
<form name="form1" method="post" action="insertStudentdo.php">
	<table width="300" border="0" align="center" cellpadding="2"
		cellspacing="2">
		<tr>
			<td width="150"><div align="right">学号：</div></td>
			<td width="150"><input type="text" name="studentId"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">姓名：</div></td>
			<td width="150"><input type="text" name="name"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">班级：</div></td>
			<td width="150"><input type="text" name="className"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">生日：</div></td>
			<td width="150"><input type='text' id='birthday' name="birthday" size="10" maxlength="10" onclick="new Calendar().show(this);"></input></td>
		</tr>
		<tr>
			<td width="150"><div align="right">性别：</div></td>
			<td width="150"><input type="radio" name="sex" value='男' checked>男</input> <input
				type="radio" name="sex" value='女'>女</input></td>
		</tr>
		<tr>
			<td width="150"><div align="right">民族：</div></td>
			<td width="150"><select name='nation'>
					<option value='汉族'>汉族</option>
					<option value='回族'>回族</option>
					<option value='维吾尔族'>维吾尔族</option>
			</select></td>
		</tr>
	</table>
	<p align="center">
		<input type="submit" name="Submit" value="Submit"> <input type="reset"
			name="Reset" value="Reset">
	</p>
</form>
<hr>
<?php
/// 连接服务器
$conn = mysql_connect ( "localhost:3306", "root", "" ) or die ( "不能连接到服务器" . mysql_error () );
// 设定字符集
mysql_set_charset ( "gbk", $conn );
// 选择数据库
$sel = mysql_select_db ( "gdmec" );
if ($sel) {
	// 生成查询语句
	$sql = "SELECT * FROM `student` LIMIT 0, 30 ";
	// 查询结果是一个二维（多行多列）的表状结构
	// 如果查询结果为空，注意不是查询失败，只不过$result是空记录集
	$result = mysql_query ( $sql, $conn );
	
	echo "<center><b>查询结果</b></center>";
	echo "<hr>";
	echo "<table width='100%' border=1 cellpadding=2 >";
	echo "<tr><th>编号</th><th>学号</th><th>姓名</th><th>班级</th><th>生日</th><th>性别</th><th>民族</th><th>操作</th></tr>";
	// 取出一行,MYSQL_ASSOC是一个常量，注意不加双引号，表示返回结果是关联数组
	if ($result) {
		
		// mysql_fetch_array，取出一行后，指针会自动指向下一行
		while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
			// 关联数组的键名是表中的字段名
			$id = $row ["id"];
			echo "<tr>";
			echo "<td>" . $row ["id"] . "</td><td>" . $row ["studentId"] . "</td><td>" . $row ["name"] . "</td><td>\n";
			echo $row ["className"] . "</td><td>" . $row ["birthday"] . "</td><td>" . $row ["sex"] ;
			echo "</td><td>" . $row ["nation"] . "</td><td><a href='delete.php?id=$id'>删除</a>&nbsp;&nbsp;<a href='update.php?id=$id'>编辑</a></td></tr>" ;
			
		}
		echo "</table>";
	} else {
		echo "查询失败";
	}
} else {
	echo "数据库不存在！！！";
}
?>

</body>
</html>
