<? include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?
$sql_del = "delete from stock where p_id = '".$_GET['p_id']."' ";
mysql_query($sql_del) or die(mysql_error());
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=addproduct">
</body>
</html>