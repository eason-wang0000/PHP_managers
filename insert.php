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
<title>��ѯ</title>
</head>
<body>
<div>
�û�����<?=$_SESSION["userName"]?>
</div>
<center>
	<b>����ѧ��</b>
</center>
<form name="form1" method="post" action="insertStudentdo.php">
	<table width="300" border="0" align="center" cellpadding="2"
		cellspacing="2">
		<tr>
			<td width="150"><div align="right">ѧ�ţ�</div></td>
			<td width="150"><input type="text" name="studentId"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">������</div></td>
			<td width="150"><input type="text" name="name"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">�༶��</div></td>
			<td width="150"><input type="text" name="className"></td>
		</tr>
		<tr>
			<td width="150"><div align="right">���գ�</div></td>
			<td width="150"><input type='text' id='birthday' name="birthday" size="10" maxlength="10" onclick="new Calendar().show(this);"></input></td>
		</tr>
		<tr>
			<td width="150"><div align="right">�Ա�</div></td>
			<td width="150"><input type="radio" name="sex" value='��' checked>��</input> <input
				type="radio" name="sex" value='Ů'>Ů</input></td>
		</tr>
		<tr>
			<td width="150"><div align="right">���壺</div></td>
			<td width="150"><select name='nation'>
					<option value='����'>����</option>
					<option value='����'>����</option>
					<option value='ά�����'>ά�����</option>
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
/// ���ӷ�����
$conn = mysql_connect ( "localhost:3306", "root", "" ) or die ( "�������ӵ�������" . mysql_error () );
// �趨�ַ���
mysql_set_charset ( "gbk", $conn );
// ѡ�����ݿ�
$sel = mysql_select_db ( "gdmec" );
if ($sel) {
	// ���ɲ�ѯ���
	$sql = "SELECT * FROM `student` LIMIT 0, 30 ";
	// ��ѯ�����һ����ά�����ж��У��ı�״�ṹ
	// �����ѯ���Ϊ�գ�ע�ⲻ�ǲ�ѯʧ�ܣ�ֻ����$result�ǿռ�¼��
	$result = mysql_query ( $sql, $conn );
	
	echo "<center><b>��ѯ���</b></center>";
	echo "<hr>";
	echo "<table width='100%' border=1 cellpadding=2 >";
	echo "<tr><th>���</th><th>ѧ��</th><th>����</th><th>�༶</th><th>����</th><th>�Ա�</th><th>����</th><th>����</th></tr>";
	// ȡ��һ��,MYSQL_ASSOC��һ��������ע�ⲻ��˫���ţ���ʾ���ؽ���ǹ�������
	if ($result) {
		
		// mysql_fetch_array��ȡ��һ�к�ָ����Զ�ָ����һ��
		while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
			// ��������ļ����Ǳ��е��ֶ���
			$id = $row ["id"];
			echo "<tr>";
			echo "<td>" . $row ["id"] . "</td><td>" . $row ["studentId"] . "</td><td>" . $row ["name"] . "</td><td>\n";
			echo $row ["className"] . "</td><td>" . $row ["birthday"] . "</td><td>" . $row ["sex"] ;
			echo "</td><td>" . $row ["nation"] . "</td><td><a href='delete.php?id=$id'>ɾ��</a>&nbsp;&nbsp;<a href='update.php?id=$id'>�༭</a></td></tr>" ;
			
		}
		echo "</table>";
	} else {
		echo "��ѯʧ��";
	}
} else {
	echo "���ݿⲻ���ڣ�����";
}
?>

</body>
</html>
