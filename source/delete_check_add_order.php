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
//$sql_del = "delete from orders where o_id = '".$_GET['o_id']."' ";
//mysql_query($sql_del) or die(mysql_error());
$sql_del = "delete from buy_orders_detail where b_id = '".$_GET['b_id']."' and p_id = '".$_GET["p_id"]."' ";
$del = mysql_query($sql_del) or die(mysql_error());

?>


<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=check_add_order&b=<?=$_GET['b_id'];?>">
</body>
</html>