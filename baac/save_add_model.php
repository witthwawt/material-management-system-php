<? include("config.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$sql = "select * from orders_detail where p_id = '".$_POST["p_id"]."' and o_id = '".$_POST["bin"]."'";//ดึงข้อมูลที่ตรงกับ p_id และ bin ขึ้นมา
$result = mysql_query($sql) or die (mysql_error());
$objResult = mysql_fetch_array($result);

if($objResult){//ถ้ามีข้อมูลก็สั่งให้มันบวกกับข้อมูลเก่าแล้วอัพเดทลงไป
	$total = $objResult["s_qty"] + $_POST["txtQty"];
	$sql2 = "update orders_detail set s_qty = '$total' where o_id = '".$_POST["bin"]."' and p_id = '".$_POST["p_id"]."'";
	$result2 = mysql_query($sql2);

?>
	<script language=javascript>
	window.opener.location.reload('main.php?mn=view_ream_detail&o_id=<?=$_POST["bin"];?>');window.close();
	</script>
<?
}else{//ถ้าไม่มีข้อมูลก็ให้มัน insert ลงไปใหม่
	$sql3 = "insert into orders_detail (o_id,p_id,s_qty) values ('".$_POST["bin"]."','".$_POST["p_id"]."','".$_POST["txtQty"]."')";
	$result3 = mysql_query($sql3);

?>
	<script language=javascript>
	window.opener.location.reload('main.php?mn=view_ream_detail&o_id=<?=$_POST["bin"];?>');window.close();
	</script>
<?
}




?>
</body>
</html>