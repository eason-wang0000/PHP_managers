<?php
// ȡ��������
if (isset ( $_REQUEST ["userName"] )) {
	$userName = $_REQUEST ["userName"];
	$password = $_REQUEST ["password"];
	$password2 = $_REQUEST ["password2"];
	if(strlen($userName)<6||strlen($password)<6){
		header ( "location:register.php?error=�û��������볤�ȱ������6����" );
	}elseif ($password != $password2){
	// die("�������벻һ�£���<a href='register.php'>����</a>");
	header ( "location:register.php?error=�������벻һ�£���" );
	} else{
		// �������룺md5,32���ַ���sha1��40���ַ�
		$password = sha1 ( $password );
		// ���ӷ�����
		$conn = mysql_connect ( "localhost:3306", "root", "" );
		mysql_set_charset ( "gbk", $conn );
		mysql_select_db ( "gdmec" );
		// д��ѯ���
		$sql = "insert into account values(null,'$userName','$password','1')";
		echo $sql;
		// ��ѯ
		$result = mysql_query ( $sql, $conn );
		// ����ֵtrue/false
		if ($result) {
			header ( "location:login.php" );
		} else {
			echo "����ʧ�ܣ���";
		}
	}
}
?>
