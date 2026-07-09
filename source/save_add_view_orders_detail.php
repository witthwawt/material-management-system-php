<? session_start();
include("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?

if($_POST["button"]=="Print"){
	
	$p = $_POST["txt_p"];
	$s = $_POST["sl2"];
	$sql3 = "update buy_orders set price = '$p',s_id = '$s' where b_id = '".$_POST["txt_p_id"]."'";
	//break;
	//echo $sql3;
	$result3 = mysql_query($sql3) or die (mysql_error());
	if($result3){?>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=report_add_order_detail&b_id=<?=$_POST["txt_p_id"];?>">
	<?
	}
}
?>	
</body>
</html>