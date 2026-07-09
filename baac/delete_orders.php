<? session_start();
include('config.php');
if($_SESSION["u_id"] != ""){
$id = $_SESSION["u_id"];
$sql_show = "select * from user where u_id = '$id'";
$result_show = mysql_query($sql_show) or die(mysql_error());
$row_show = mysql_fetch_array($result_show);
}
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
mysql_query($sql_del) or die(mysql_error());

$count = count($_GET['o_id']);
	for ($i = 0; $i < $count; $i++){
		$sql_del2 = "delete from orders_detail where o_id = '".$_GET['o_id']."' ";
		mysql_query($sql_del2) or die(mysql_error());
	}
		
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_orders&u_id=<?=$row_show['u_id'] ?>">
</body>
</html>