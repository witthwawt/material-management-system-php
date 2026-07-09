<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
include('config.php');
session_start();
if($_SESSION["u_id"] != ""){
$id = $_SESSION["u_id"];
$sql_show = "select * from user where u_id = '$id'";
$result_show = mysql_query($sql_show) or die(mysql_error());
$row_show = mysql_fetch_array($result_show);
}

  $u_id = $row_show["u_id"];

  $strSQL = "INSERT INTO orders (o_date,u_id,st_id) VALUES ('$dateN','$u_id','1')";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO orders_detail (o_id,p_id,s_qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_POST['txt_o'][$i]."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }
unset($_SESSION["intLine"]); 
//mysql_close();
//session_unset("intLine");

//session_destroy();

//header("location:finish_order.php?OrderID=".$strOrderID);
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_orders&u_id=<?= $id ?>">
</body>
</html>