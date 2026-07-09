<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
<?
$id = $_GET["p_id"];
$sqlshow = "select * from stock where p_id = '$id'";
$resultshow = mysql_query($sqlshow) or die(mysql_error());
$rowshow = mysql_fetch_array($resultshow);

?>
<div class="container">
<center><h2>แก้ไขข้อมูลพนักงาน</h2></center>
<form name="formmstock" method="post" action="" enctype="multipart/form-data">
  <table width="500" border="0" align="center" cellpadding="3">
    <tr>
	    <td align="right">รูปภาพ :</td>
      <td><img src="myfile/<?php echo $rowshow['Picture']; ?>"width="100px" height="100px" border="0" /><p/>
      <input type="file" name="filUpload"></td>
      </tr>
	  <tr>
	    <td align="right">ชื่อ : </td>
	    <td><input type="text" class="form-control" name="txt_name" value="<? echo $rowshow["pname"]; ?>"/></td>
      </tr>
	  <tr>
	    <td align="right">นามสกุล :</td>
	    <td><input type="text" class="form-control" name="txt_last" value="<? echo $rowshow["stock"]; ?>" /></td>
      </tr>
	  <tr>
	  <tr>
	    <td align="right">&nbsp;</td>
	    <td><input name="btnSubmit"  type="submit" value="แก้ไข"> &nbsp;
        <input type="button" name="button" id="button" value="กลับ" onClick="document.location.href='main.php?mn=addproduct'"></td>
    </tr>
  </table>
</form>
</div>

	

<? 
if($_POST['btnSubmit'] == "แก้ไข"){
		//*** Update Record ***//

		$strSQL = "UPDATE stock ";
		$strSQL .=" SET pname = '".$_POST["txt_name"]."',stock = '".$_POST["txt_last"]."' WHERE p_id = '".$_GET["p_id"]."' ";
		$objQuery = mysql_query($strSQL);		
	
	if($_FILES["filUpload"]["name"] != "")
	{
		if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{
			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			//*** Update New File ***//
			$strSQL = "UPDATE stock ";
			$strSQL .=" SET Picture = '".$_FILES["filUpload"]["name"]."' WHERE p_id = '".$_GET["p_id"]."' ";
			$objQuery = mysql_query($strSQL);		
		}
	}
	echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
			header("Location: main.php?mn=addproduct");
}
?>
</body>
</html>


