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


$sql_del = "delete from orders_detail where d_id = '".$_GET['d_id']."' ";
$del = mysql_query($sql_del) or die(mysql_error());
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_orders_detail&o_id=<?=$_GET['o_id'];?>">
</body>
</html>