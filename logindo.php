<?php
//�û�����ϵͳʱ�����ȸ���session�ж��û��Ƿ��¼��δ��¼�û�����ϵͳʱǿ����ת����¼ҳ��
session_start();
if(isset($_SESSION["userName"])){
	header("location:index.php");
}
//ȡ��������
$userName = $_REQUEST["userName"];
$password = $_REQUEST["password"];
$password = sha1($password);
//���ӷ�����
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//д��ѯ���
$sql = "select * from account where userName='$userName' and password='$password'";
echo $sql;
//��ѯ
$result = mysql_query($sql,$conn);
if($result){
	//ȡ��������еĵ�һ��
	$row = mysql_fetch_assoc($result);
	//��ѯ����������û���������,$row�������ݲ�Ϊ�գ�$row��һ���������飬if(����ֵ)���Զ�����������ת��Ϊtrue
	if($row){
		//�����¼��Ϣ
		$_SESSION["userName"] = $userName;
		header("location:index.php");
	}else{
		//���û�м�¼�����Ϊnull,�Զ�ת��Ϊfalse
		echo "�û��������������<a href='3.1login.php'>���µ�¼</a>";
	}
}else{
	echo "��ѯʧ�ܣ���";
}
?>
