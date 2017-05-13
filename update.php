<?php
if(!isset($_REQUEST['id'])){
	header("location:index.php");
}
//取出记录号
$id = $_REQUEST['id'];
//连接服务器
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
$sql = "select * from student where id='$id'";
//注意返回值是记录/false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "系统内部错！！！";
}else{
	$row = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<script type="text/javascript" src="js/Calendar3.js"></script>
<title>编辑学生信息</title>
</head>
<body>
<center>
<b>编辑学生信息</b>
</center>
<hr>
<form name="form1" method="post" action="updateStudentdo.php">
<table width="300" border="0" align="center" cellpadding="2"
		cellspacing="2">
		<input type="hidden" name="id" value='<?=$row['id']?>'>
		<tr>
		<td width="150"><div align="right">学号：</div></td>
		<td width="150"><input type="text" name="studentId" value='<?=$row['studentId']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">姓名：</div></td>
		<td width="150"><input type="text" name="name" value='<?=$row['name']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">班级：</div></td>
		<td width="150"><input type="text" name="className" value='<?=$row['className']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">生日：</div></td>
		<td width="150"><input type='text' id='birthday' name="birthday" size="10" maxlength="10" value='<?=$row['birthday']?>' onclick="new Calendar().show(this);"></input></td>
		</tr>
		<tr>
		<td width="150"><div align="right">性别：</div></td>
		<td width="150"><input type="radio" name="sex" value='男' <?='男'==$row['sex']?"checked='checked'":'' ?>>男</input> <input
		type="radio" name="sex" value='女' <?='女'==$row['sex']?"checked='checked'":'' ?>>女</input></td>
		</tr>
		<tr>
		<td width="150"><div align="right">民族：</div></td>
		<td width="150"><select name='nation'>
		<option value='汉族' <?='汉族'==$row['nation']?"selected='selected'":'' ?>>汉族</option>
		<option value='回族' <?='回族'==$row['nation']?"selected='selected'":'' ?>>回族</option>
		<option value='维吾尔族' <?='维吾尔族'==$row['nation']?"selected='selected'":'' ?>>维吾尔族</option>
		</select></td>
		</tr>
		</table>
		<p align="center">
		<input type="submit" name="Submit" value="Submit"> <input type="reset"
				name="Reset" value="Reset">
				</p>
				</form>
				</body>
				</html>
