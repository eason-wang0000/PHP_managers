<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>

<body>

	<form name="form1" method="post" action="registerdo.php">
		<table width="300" border="0" align="center" cellpadding="2"
			cellspacing="2">
			<tr>
				<td colspan='2' align='center'><?php
				if (isset ( $_REQUEST ['error'] )) {
					echo "<font color='red'>".$_REQUEST ['error']."</font>";
				}
				?></td>
			</tr>
			<tr>
				<td width="150"><div align="right">�û�����</div></td>
				<td width="150"><input type="text" name="userName"></td>
			</tr>
			<tr>
				<td><div align="right">���룺</div></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><div align="right">�ظ����룺</div></td>
				<td><input type="password" name="password2"></td>
			</tr>
		</table>
		<p align="center">
			<input type="submit" name="submit" value="ע��"> <input type="reset"
				name="Reset" value="����">
		</p>
	</form>
</body>
</html>
