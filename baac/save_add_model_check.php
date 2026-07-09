<? include("config.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$sql = "select * from buy_orders_detail where p_id = '".$_GET["p_id"]."' and b_id = '".$_GET["bin"]."'";
//echo $sql;break;
$result = mysql_query($sql) or die (mysql_error());
$objResult = mysql_fetch_array($result);

if($objResult){
	$total = $objResult["unit"] + 1;
	$sql2 = "update buy_orders_detail set unit = '$total' where b_id = '".$_GET["bin"]."' and p_id = '".$_GET["p_id"]."'";
	$result2 = mysql_query($sql2);

?>
	<script language=javascript>
	window.opener.location.reload('main.php?mn=check_add_order&o_id=$_GET["bin"];');window.close();
	</script>
<?
}else{
	$sql3 = "insert into buy_orders_detail (b_id,p_id,unit,b_st) values ('".$_GET["bin"]."','".$_GET["p_id"]."','1','n')";
	$result3 = mysql_query($sql3);

?>
	<script language=javascript>
	window.opener.location.reload('main.php?mn=check_add_order&o_id=$_GET["bin"];');window.close();
	</script>
<?
}




?>
</body>
</html>