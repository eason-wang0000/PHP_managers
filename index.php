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
<title>��ѯ</title>
</head>
<body>
	<div align='right'>
�û�����<?=$_SESSION["userName"]?><input type='button'
			onclick="window.location.href='loginout.php'" value='�˳�' />
	</div>
	<input type="button" name="add"
		onclick="window.location.href='insert.php'" value="����ѧ����Ϣ">
	<br />
	<br />
	<div>
		<form name='query' action='index.php'>
			<select name='key'>
				<option value='studentId'>ѧ��</option>
				<option value='name'>����</option>
				<option value='className'>�༶</option>
				<option value='birthday'>����</option>
				<option value='sex'>�Ա�</option>
				<option value='nation'>����</option>
			</select> <input type='text' name='value' /> <input type='submit'
				name='aa' value='��ѯ' />
		</form>
	</div>
<?php
// / ���ӷ�����
$conn = mysql_connect ( "localhost:3306", "root", "" ) or die ( "�������ӵ�������" . mysql_error () );
// �趨�ַ���
mysql_set_charset ( "gbk", $conn );
// ѡ�����ݿ�
$sel = mysql_select_db ( "gdmec" );
if ($sel) {
	// ÿһҳ��ʾ ��������¼
	$pageNumber = 2;
	// ��ǰҳҳ����$page
	if (isset ( $_REQUEST ['page'] )) {
		$page = $_REQUEST ['page'];
	} else {
		$page = 1;
	}
	//дsql���
	if (isset ( $_REQUEST ['key'] ) && $_REQUEST ['value'] != "") {
		$key = $_REQUEST ['key'];
		$value = $_REQUEST ['value'];
		$sql = "SELECT * FROM `student` where $key like '%$value%'";
		$sqlCount = "SELECT count(*) as sum FROM `student` where $key like '%$value%'";
	} else {
		// ���ɲ�ѯ���
		$sql = "SELECT * FROM `student`";
		$sqlCount = "SELECT count(*) as sum FROM `student`";
	}
	// ��ѯ�ܼ�¼��
	$resultTotal = mysql_query ( $sqlCount, $conn );
	$rowCount = mysql_fetch_assoc ( $resultTotal );
	$totalREcord = $rowCount ['sum'];
	// ��ҳ�� round(���������� ceil�컨�� floor�ذ�
	$maxPage = ceil ( $totalREcord / $pageNumber );
	
	//����ҳ��Ϊ��Чҳ
	if ($page < 1) {
		$page = 1;
	}
	if ($page > $maxPage) {
		$page = $maxPage;
	}
	//���㵱ҳ����ʼ��¼��
	$start = ($page - 1) * $pageNumber;
	$limit = " limit $start,$pageNumber";
	$sql .= $limit;
	// ��ѯ�����һ����ά�����ж��У��ı�״�ṹ
	// �����ѯ���Ϊ�գ�ע�ⲻ�ǲ�ѯʧ�ܣ�ֻ����$result�ǿռ�¼��
	$result = mysql_query ( $sql, $conn );
	
	echo "<center><b>��ѯ���</b></center>";
	echo "<hr>";
	echo "<table width='100%' border=1 cellpadding=2 >";
	echo "<tr><th>���</th><th>ѧ��</th><th>����</th><th>�༶</th><th>����</th><th>�Ա�</th><th>����</th><th>����</th></tr>";
	// ȡ��һ��,MYSQL_ASSOC��һ��������ע�ⲻ��˫���ţ���ʾ���ؽ���ǹ�������
	if ($result) {
		
		// mysql_fetch_array��ȡ��һ�к�ָ����Զ�ָ����һ��
		while ( $row = mysql_fetch_array ( $result, MYSQL_ASSOC ) ) {
			// ��������ļ����Ǳ��е��ֶ���
			$id = $row ["id"];
			echo "<tr>";
			echo "<td>" . $row ["id"] . "</td><td>" . $row ["studentId"] . "</td><td>" . $row ["name"] . "</td><td>\n";
			echo $row ["className"] . "</td><td>" . $row ["birthday"] . "</td><td>" . $row ["sex"];
			echo "</td><td>" . $row ["nation"] . "</td><td><a href='delete.php?id=$id'>ɾ��</a>&nbsp;&nbsp;<a href='update.php?id=$id'>�༭</a></td></tr>";
		}
		echo "</table>";
	} else {
		echo "��ѯʧ��";
	}
} else {
	echo "���ݿⲻ���ڣ�����";
}
?>

<?php
echo "<br/>";
echo "<center>";
echo "<table><tr><td>";
echo "�ܼ�¼��:" . $totalREcord . "��&nbsp;";
echo "ÿҳ��ʾ:" . $pageNumber . "����¼��&nbsp;";
echo "��:" . $pageNumber . "ҳ��ʾ��&nbsp;";
if ($page <= 1) {
	echo "��ҳ&nbsp;&nbsp;&nbsp;";
	echo "ǰһҳ&nbsp;&nbsp;&nbsp;";
} else {
	$prevPage = $page - 1;
	echo "<a href='index.php?page=1'>��ҳ</a>&nbsp;&nbsp;&nbsp;";
	echo "<a href='index.php?page=" . $prevPage . "'>ǰһҳ</a>&nbsp;&nbsp;&nbsp;";
}
echo $page . "&nbsp;&nbsp;&nbsp;";
if ($page >= $maxPage) {
	echo "��һҳ&nbsp;&nbsp;&nbsp;";
	echo "ĩҳ&nbsp;&nbsp;&nbsp;";
} else {
	$nextPage = $page + 1;
	echo "<a href='index.php?page=" . $nextPage . "'>��һҳ</a>&nbsp;&nbsp;&nbsp;";
	echo "<a href='index.php?page=$maxPage'>ĩҳ</a>&nbsp;&nbsp;&nbsp;";
}
echo "</td>";
?>
<td>
		<form action='index.php'>
			<input type='text' size='4' name='page' /> <input type='submit'
				value='��ָ��ҳ' />
		</form>
	</td>
	</tr>
	</table>
	</center>
</body>
</html>
