<?php
if(!isset($_REQUEST['id'])){
	header("location:index.php");
}
//ȡ��ɾ����¼��
$id = $_REQUEST['id'];
//���ӷ�����
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
$sql = "delete from student where id='$id'";
//ע��ɾ���ķ���ֵ��true/false
$reuslt = mysql_query($sql,$conn);
if(!$reuslt){
	echo "ϵͳ�ڲ�������";
}else{
	header("location:index.php");
}
?>
