<?
include('config.php');
session_start();
if($_SESSION["u_id"] != ""){
$id = $_SESSION["u_id"];
$sql_show = "select * from user where u_id = '$id'";
$result_show = mysql_query($sql_show) or die(mysql_error());
$row_show = mysql_fetch_array($result_show);
}

if($_POST['submitck'] == "แก้ไข"){
	$strSQL = "UPDATE user SET ";
	$strSQL .="username = '".$_POST["textfield2"]."' ";
	$strSQL .=",password = '".$_POST["textfield3"]."' ";
	$strSQL .="WHERE u_id = '".$_SESSION["u_id"]."' ";
	$objQuery = mysql_query($strSQL);
	
		if($objQuery){
			//echo "<script type='text/javascript'>alert('บันทึกแล้ว');";
			echo iconv('UTF-8','TIS-620',"<script type='text/javascript'>alert('บันทึกแล้ว');</script>");
		}else{
			echo "Error Save [".$strSQL."]";
		}
}
?>

<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=editaccount">


