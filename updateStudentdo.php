<?php
//连接服务器
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
//取数据
$id = $_REQUEST['id'];
$studentId = $_REQUEST['studentId'];
$name = $_REQUEST['name'];
$className = $_REQUEST['className'];
$birthday = $_REQUEST['birthday'];
$sex = $_REQUEST['sex'];
$nation = $_REQUEST['nation'];
//写语句
$sql= "UPDATE `student` SET `id`='$id',`studentId`='$studentId',`name`='$name',`className`='$className'";
$sql .=	",`birthday`='$birthday',`sex`='$sex',`nation`='$nation' WHERE id = '$id'";
//执行,返回值是true false
$result = mysql_query($sql,$conn);
if(!$result){
	echo "修改失败,语句写错了,请检查!!";
}else{
	header("location:index.php");
}
?>
