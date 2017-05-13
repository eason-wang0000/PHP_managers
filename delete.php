<?php
if(!isset($_REQUEST['id'])){
	header("location:index.php");
}
//取出删除记录号
$id = $_REQUEST['id'];
//连接服务器
$conn = mysql_connect("localhost:3306","root","");
mysql_set_charset("gbk",$conn);
mysql_select_db("gdmec");
$sql = "delete from student where id='$id'";
//注意删除的返回值是true/false
$reuslt = mysql_query($sql,$conn);
if(!$reuslt){
	echo "系统内部错！！！";
}else{
	header("location:index.php");
}
?>
