<?php
//连接服务器
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//取数据
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$className = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];
//写语句
$sql= "INSERT INTO `student` VALUES (null,'$studentId','$name','$className','$birthday','$sex','$nation')";
//执行,返回值是true false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "插入失败,语句写错了,请检查!!";
}else{
	header("location:index.php");
}
?>
