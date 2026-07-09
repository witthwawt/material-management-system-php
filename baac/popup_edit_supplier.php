<? session_start();
include("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แก้ไขข้อมูล ตัวแทนจำหน่าย</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/hover.css" rel="stylesheet" media="all">
<script type="text/javascript">
	function fncSubmit()
	{	
		 if(document.getElementById('s_name').value == ""){
			alert('กรุณากรอก!!! ชื่อตัวแทนจำหน่าย');
			document.frm3.s_name.focus();
			return false;
		}else if(document.getElementById('txt_add').value == ""){
			alert('กรุณากรอก!!! ที่อยู่ตัวแทนจำหน่าย');
			document.frm3.txt_add.focus();
			return false;
		}else if(document.getElementById('txt_ta').value == ""){
			alert('กรุณากรอก!!! เลขประจำตัวผู้เสียภาษี');
			document.frm3.txt_ta.focus();
			return false;
		}else if(document.getElementById('txt_phon').value == ""){
			alert('กรุณากรอก!!! เบอร์โทร 10 หลัก');
			document.frm3.txt_phon.focus();
			return false;
		}else if(document.getElementById('filUpload').value == ""){
			alert('กรุณาเลือก!!! โลโก้');
			document.frm3.filUpload.focus();
			return false;
		}
		var cidLen = document.getElementById('txt_phon').value
			if(cidLen.length != 10){
				alert('กรุณากรอกเบอร์โทร 10 หลัก');
				document.frm3.txt_phon.focus();
				return false;
			}
			else{
				
			}
	}
</script>
</head>

<body>
<?
$sql = "select * from supplier where s_id = '".$_GET["s_id"]."'";
$result = mysql_query($sql) or die (mysql_error());
$rowshow = mysql_fetch_array($result);
?>
<center>
  <h2>แก้ไขข้อมูล ตัวแทนจำหน่าย</h2></center>
<form name="formmstock" method="post" action="" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
  <table width="500" border="0" align="center" cellpadding="3">
	  <tr>
	    <td align="right">ชื่อ : </td>
	    <td><p>
	      <input type="text" class="form-control" name="s_name" id="s_name" value="<?=$rowshow["s_name"]; ?>"/>
	    </p></td>
      </tr>
	  <tr>
	    <td align="right">ที่อยู่ : </td>
	    <td><p><textarea name="txt_add" cols="40" rows="4" id="txt_add" ><?=$rowshow["s_address"]; ?></textarea>
	    </p></td>
      </tr>
	  <tr>
	    <td align="right">เลขผู้เสียภาษี : </td>
	    <td><p>
            <input type="text" class="form-control" name="txt_ta" id="txt_ta" value="<?=$rowshow["tax"]; ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
          </p></tr>
	  <tr>
	    <td align="right">เบอร์โทร : </td>
	    <td><p><input type="text" class="form-control" name="txt_phon" id="txt_phon" value="<?=$rowshow["s_tel"]; ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
        </p></tr>
	  <tr>
	    <td align="right">โลโก้ :</td>
	    <td>
        <img class="img-rounded hvr-bounce-in" src="myfile/<? echo $rowshow['m_photo']; ?>" width="100px" height="100px" border="0"/><p/>      
      <input type="file" class="form-control" name="filUpload" id="filUpload"></tr>
	  <tr>
	    <td align="right">&nbsp;</td>
	    <td><input name="btnSubmit" class="btn btn-success hvr-bounce-in"  type="submit" value="แก้ไข"> 
        <input name="btnSubmit" type="hidden" value="ture">      
    </tr>
  </table>
</form>

<? 
if( isset($_POST["btnSubmit"])){
	if($_POST['btnSubmit'] == "ture"){
			//*** Update Record ***//
			
	
			$strSQL = "UPDATE supplier ";
			$strSQL .=" SET s_name = '".$_POST["s_name"]."',s_address = '".$_POST["txt_add"]."',tax = '".$_POST["txt_ta"]."',s_tel = '".$_POST["txt_phon"]."' WHERE s_id = '".$_GET["s_id"]."' ";
			$objQuery = mysql_query($strSQL);		
		//echo $strSQL;break;
					
					if($_FILES["filUpload"]["name"] != ""){
						if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
						{
							//*** Delete Old File ***//			
							@unlink("myfile/".$_POST["hdnOldFile"]);
							//*** Update New File ***//
							$strSQL = "UPDATE supplier ";
							$strSQL .=" SET m_photo = '".$_FILES["filUpload"]["name"]."' WHERE s_id = '".$_GET["s_id"]."' ";
							$objQuery = mysql_query($strSQL);		
						}
					}
					
		if($objQuery){
			echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
		?>
	<script language=javascript>
		window.opener.location.reload('mail.php?mn=add_supplier');window.close();
		</script>
		<?
		}
	}
}
?>	
</body>
</html>