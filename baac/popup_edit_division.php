<? session_start();
include("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แก้ไขแผนก</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/hover.css" rel="stylesheet" media="all">
<script type="text/javascript">
	function fncSubmit()
	{	
		 if(document.getElementById('txt1').value == ""){
			alert('กรุณากรอก!!! ชื่อแผนก');
			document.frm2.txt1.focus();
			return false;
		}
	}
</script>
</head>

<body>
<?
$sql = "select * from division where d_id = '".$_GET["d_id"]."'";
$result = mysql_query($sql) or die (mysql_error());
$show = mysql_fetch_array($result);
?>

<center><h2>แก้ไขแผนก</h2>
 <form name="frm2" method="post" action="" class="form-inline" onSubmit="JavaScript:return fncSubmit();">
  <input type="text" class="form-control" name="txt1" id="txt1" value="<?=$show["danme"];?>" style="width: 300px;ext-align: center;"><br>
  <input type="submit" class="btn btn-success hvr-bounce-in" name="button" id="button" value="บันทึก">
  <input type="hidden" name="btn1" id="btn1" value="Submit">
</form>
</center>

<? 
if( isset($_POST["btn1"])){
	if($_POST['btn1'] == "Submit"){
		
			$strSQL = "update division set danme = '".$_POST["txt1"]."' where d_id = '".$_GET["d_id"]."'";
			$objQuery = mysql_query($strSQL);		
		
					
		if($objQuery){
			echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
		?>
	<script language=javascript>
		window.opener.location.reload('mail.php?mn=division');window.close();
		</script>
		<?
		}
	}
}

?>	
</body>
</html>