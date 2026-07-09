<? session_start();
include('config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$sql_del = "delete from orders where o_id = '".$_GET['o_id']."' ";
mysql_query($sql_del) or die (mysql_error());

$count = count($_GET['o_id']);
	for ($i = 0; $i < $count; $i++){
		$sql = "delete from orders_detail where o_id = '".$_GET['o_id']."' ";
		mysql_query($sql) or die (mysql_error());
	}
?>


<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_ream">
</body>
</html>