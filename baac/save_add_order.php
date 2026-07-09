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
  $name = $row_show["name"];
  $sum = $_POST["txt_sum"];


  $strSQL = "INSERT INTO buy_orders (u_id,price,date,status_buy) VALUES ('$u_id','$sum','$dateN','1')";
  mysql_query($strSQL) or die(mysql_error());

  $strOrderID = mysql_insert_id();

  for($i=0;$i<=(int)$_SESSION["intLine1"];$i++)
  {
	  if($_SESSION["strProductID1"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO  buy_orders_detail (b_id,p_id,unit,b_recive,b_st)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID1"][$i]."','".$_POST['strQty1'][$i]."','','n')";
			  mysql_query($strSQL) or die(mysql_error());
			 // echo var_dump($strSQL);

	  }
	  
  }
  //break;
unset($_SESSION["intLine1"]); 
//mysql_close();
//session_unset("intLine");

//session_destroy();

//header("location:main.php?mn=view_add_order.php");
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_add_order">
</body>
</html>