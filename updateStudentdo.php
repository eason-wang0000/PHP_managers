<?php
//���ӷ�����
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//ȡ����
$id = $_REQUEST['id'];
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$className = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];
//д���
$sql= "UPDATE `student` SET `id`='$id',`studentId`='$studentId',`name`='$name',`className`='$className'";
$sql .=	",`birthday`='$birthday',`sex`='$sex',`nation`='$nation' WHERE id = '$id'";
//ִ��,����ֵ��true false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "�޸�ʧ��,���д����,����!!";
}else{
	header("location:index.php");
}
?>
