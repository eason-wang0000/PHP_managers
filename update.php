<?php
if(!isset($_REQUEST['id'])){
	header("location:index.php");
}
//ȡ����¼��
$id = $_REQUEST['id'];
//���ӷ�����
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
$sql = "select * from student where id='$id'";
//ע�ⷵ��ֵ�Ǽ�¼/false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "ϵͳ�ڲ�������";
}else{
	$row = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<script type="text/javascript" src="js/Calendar3.js"></script>
<title>�༭ѧ����Ϣ</title>
</head>
<body>
<center>
<b>�༭ѧ����Ϣ</b>
</center>
<hr>
<form name="form1" method="post" action="updateStudentdo.php">
<table width="300" border="0" align="center" cellpadding="2"
		cellspacing="2">
		<input type="hidden" name="id" value='<?=$row['id']?>'>
		<tr>
		<td width="150"><div align="right">ѧ�ţ�</div></td>
		<td width="150"><input type="text" name="studentId" value='<?=$row['studentId']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">������</div></td>
		<td width="150"><input type="text" name="name" value='<?=$row['name']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">�༶��</div></td>
		<td width="150"><input type="text" name="className" value='<?=$row['className']?>'></td>
		</tr>
		<tr>
		<td width="150"><div align="right">���գ�</div></td>
		<td width="150"><input type='text' id='birthday' name="birthday" size="10" maxlength="10" value='<?=$row['birthday']?>' onclick="new Calendar().show(this);"></input></td>
		</tr>
		<tr>
		<td width="150"><div align="right">�Ա�</div></td>
		<td width="150"><input type="radio" name="sex" value='��' <?='��'==$row['sex']?"checked='checked'":'' ?>>��</input> <input
		type="radio" name="sex" value='Ů' <?='Ů'==$row['sex']?"checked='checked'":'' ?>>Ů</input></td>
		</tr>
		<tr>
		<td width="150"><div align="right">���壺</div></td>
		<td width="150"><select name='nation'>
		<option value='����' <?='����'==$row['nation']?"selected='selected'":'' ?>>����</option>
		<option value='����' <?='����'==$row['nation']?"selected='selected'":'' ?>>����</option>
		<option value='ά�����' <?='ά�����'==$row['nation']?"selected='selected'":'' ?>>ά�����</option>
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
