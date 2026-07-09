<? session_start();
include("config.php");


$strSQL = "UPDATE user SET ";
while($objResult2 = mysql_fetch_array($strSQL)){
$objResult2 .="stock = '".$_POST["txt_stock"]."' ";
$objResult2 .="WHERE u_id = '".$_SESSION["u_id"]."' ";
$objQuery = mysql_query($objResult2);
}
if($objQuery){
	echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
}else{
	echo "Error Save [".$strSQL."]";
}

?>
