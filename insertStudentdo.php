<?php
//���ӷ�����
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//ȡ����
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$className = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];
//д���
$sql= "INSERT INTO `student` VALUES (null,'$studentId','$name','$className','$birthday','$sex','$nation')";
//ִ��,����ֵ��true false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "����ʧ��,���д����,����!!";
}else{
	header("location:index.php");
}
?>
