<?php
session_start ();
if (! isset ( $_SESSION ["userName"] )) {
	header ( "location:login.php" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<script type="text/javascript" src="js/Calendar3.js"></script>
<title>查询</title>
</head>
<body>
	<div align='right'>
用户名：<?=$_SESSION["userName"]?><input type='button'
			onclick="window.location.href='loginout.php'" value='退出' />
	</div>
	<input type="button" name="add"
		onclick="window.location.href='insert.php'" value="增加学生信息">
	<br />
	<br />
	<div>
		<form name='query' action='index.php'>
			<select name='key'>
				<option value='studentId'>学号</option>
				<option value='name'>姓名</option>
				<option value='className'>班级</option>
				<option value='birthday'>生日</option>
				<option value='sex'>性别</option>
				<option value='nation'>民族</option>
			</select> <input type='text' name='value' /> <input type='submit'
				name='aa' value='查询' />
		</form>
	</div>
<?php
// / 连接服务器
$conn = mysql_connect ( "localhost:3306", "root", "" ) or die ( "不能连接到服务器" . mysql_error () );
// 设定字符集
mysql_set_charset ( "gbk", $conn );
// 选择数据库
$sel = mysql_select_db ( "gdmec" );
if ($sel) {
	// 每一页显示 多少条记录
	$pageNumber = 2;
	// 当前页页码是$page
	if (isset ( $_REQUEST ['page'] )) {
		$page = $_REQUEST ['page'];
	} else {
		$page = 1;
	}
	//写sql语句
	if (isset ( $_REQUEST ['key'] ) && $_REQUEST ['value'] != "") {
		$key = $_REQUEST ['key'];
		$value = $_REQUEST ['value'];
		$sql = "SELECT * FROM `student` where $key like '%$value%'";
		$sqlCount = "SELECT count(*) as sum FROM `student` where $key like '%$value%'";
	} else {
		// 生成查询语句
		$sql = "SELECT * FROM `student`";
		$sqlCount = "SELECT count(*) as sum FROM `student`";
	}
	// 查询总记录数
	$resultTotal = mysql_query ( $sqlCount, $conn );
	$rowCount = mysql_fetch_assoc ( $resultTotal );
	$totalREcord = $rowCount ['sum'];
	// 总页数 round(）四舍五入 ceil天花板 floor地板
	$maxPage = ceil ( $totalREcord / $pageNumber );
	
	//限制页码为有效页
	if ($page < 1) {
		$page = 1;
	}
	if ($page > $maxPage) {
		$page = $maxPage;
	}
	//计算当页的起始记录号
	$start = ($page - 1) * $pageNumber;
	$limit = " limit $start,$pageNumber";
	$sql .= $limit;
	// 查询结果是一个二维（多行多列）的表状结构
	// 如果查询结果为空，注意不是查询失败，只不过$result是空记录集
	$result = mysql_query ( $sql, $conn );
	
	echo "<center><b>查询结果</b></center>";
	echo "<hr>";
	echo "<table width='100%' border=1 cellpadding=2 >";
	echo "<tr><th>编号</th><th>学号</th><th>姓名</th><th>班级</th><th>生日</th><th>性别</th><th>民族</th><th>操作</th></tr>";
	// 取出一行,MYSQL_ASSOC是一个常量，注意不加双引号，表示返回结果是关联数组
	if ($result) {
		
		// mysql_fetch_array，取出一行后，指针会自动指向下一行
		while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
			// 关联数组的键名是表中的字段名
			$id = $row ["id"];
			echo "<tr>";
			echo "<td>" . $row ["id"] . "</td><td>" . $row ["studentId"] . "</td><td>" . $row ["name"] . "</td><td>\n";
			echo $row ["className"] . "</td><td>" . $row ["birthday"] . "</td><td>" . $row ["sex"];
			echo "</td><td>" . $row ["nation"] . "</td><td><a href='delete.php?id=$id'>删除</a>&nbsp;&nbsp;<a href='update.php?id=$id'>编辑</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo "查询失败";
	}
} else {
	echo "数据库不存在！！！";
}
?>

<?php
echo "<br/>";
echo "<center>";
echo "<table><tr><td>";
echo "总记录数:" . $totalREcord . "，&nbsp;";
echo "每页显示:" . $pageNumber . "条记录，&nbsp;";
echo "分:" . $pageNumber . "页显示，&nbsp;";
if ($page <= 1) {
	echo "首页&nbsp;&nbsp;&nbsp;";
	echo "前一页&nbsp;&nbsp;&nbsp;";
} else {
	$prevPage = $page - 1;
	echo "<a href='index.php?page=1'>首页</a>&nbsp;&nbsp;&nbsp;";
	echo "<a href='index.php?page=" . $prevPage . "'>前一页</a>&nbsp;&nbsp;&nbsp;";
}
echo $page . "&nbsp;&nbsp;&nbsp;";
if ($page >= $maxPage) {
	echo "下一页&nbsp;&nbsp;&nbsp;";
	echo "末页&nbsp;&nbsp;&nbsp;";
} else {
	$nextPage = $page + 1;
	echo "<a href='index.php?page=" . $nextPage . "'>下一页</a>&nbsp;&nbsp;&nbsp;";
	echo "<a href='index.php?page=$maxPage'>末页</a>&nbsp;&nbsp;&nbsp;";
}
echo "</td>";
?>
<td>
		<form action='index.php'>
			<input type='text' size='4' name='page' /> <input type='submit'
				value='到指定页' />
		</form>
	</td>
	</tr>
	</table>
	</center>
</body>
</html>
