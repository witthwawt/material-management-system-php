<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
<script type="text/javascript">
	function fncSubmit()
	{	
		 if(document.getElementById('txt_name').value == ""){
			alert('กรุณากรอก!!! ชื่อพนักงาน');
			document.frm1.txt_name.focus();
			return false;
		}else if(document.getElementById('txt_last').value == ""){
			alert('กรุณากรอก!!! นามสกุล');
			document.frm1.txt_last.focus();
			return false;
		}else if(document.getElementById('address').value == ""){
			alert('กรุณากรอก!!! ที่อยู่');txt_phone
			document.frm1.address.focus();
			return false;
		}else if(document.getElementById('txt_phone').value == ""){
			alert('กรุณากรอก!!! เบอร์โทร');
			document.frm1.txt_phone.focus();
			return false;
		}else if(document.getElementById('txt_user').value==""){
			window.alert("กรุณากรอก!!! Username")
			document.frm1.txt_user.focus();
			return false;
		}else if(document.getElementById('txt_pass').value  == ""  ){
			alert('กรุณากรอก!!! Password');
			document.frm1.txt_pass.focus();
			return false;
    	}
		var cidLen = document.getElementById('txt_phone').value
			if(cidLen.length != 10){
				alert('กรุณากรอกเบอร์โทร 10 หลัก');
				document.frm1.txt_phone.focus();
				return false;
			}
			else{
				
			}
	}
</script>
</head>
<body>
<?
$sqlshow = "select * from user where u_id = '".$_GET["u_id"]."'";
$resultshow = mysql_query($sqlshow) or die(mysql_error());
$rowshow = mysql_fetch_array($resultshow);

$sql = "select * from division";
$result2 = mysql_query($sql) or die (mysql_error());
?>

<center><h2>แก้ไขข้อมูลพนักงาน</h2></center>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
<form class="form-horizontal form-group" name="frm1" method="post" action="" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
  <table class="table table-condensed">
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">รูป :</label>
    <div class="col-sm-10">
    <div class="hvr-bounce-in img-rounded"><a href="myfile/<? echo $rowshow['FilesName']; ?>" rel="prettyPhoto" ><img class="img-rounded" src="myfile/<? echo $rowshow['FilesName']; ?>" width="100px" height="100px" border="0"/></a></div>
      
      <input type="file" class="form-control" name="filUpload" id="filUpload"></td>
      </div>
  </div><hr>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">คำนำหน้า :</label>
    <div class="col-sm-10">
      <input type="radio" name="rdot" id="rdot" value="นาย" <? if($rowshow["title_name"]=="นาย"){echo "checked";} ?>/> นาย<br>
      <input type="radio" name="rdot" id="rdot" value="นาง" <? if($rowshow["title_name"]=="นาง"){echo "checked";} ?>/> นาง<br>
      <input type="radio" name="rdot" id="rdot" value="นางสาว" <? if($rowshow["title_name"]=="นางสาว"){echo "checked";} ?>/> นางสาว<br>
      </div>
  </div><hr>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เพศ :</label>
    <div class="col-sm-10">
	    <input type="radio" name="rdos" id="rdos" value="ชาย" <? if($rowshow["sex"]=="ชาย"){echo "checked";} ?> /> ชาย
      <input type="radio" name="rdos" id="rdos" value="หญิง" <? if($rowshow["sex"]=="หญิง"){echo "checked";} ?> /> หญิง
      </div>
  </div><hr>
     <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เผนก :</label>
    <div class="col-sm-10">
      <? while($show = mysql_fetch_array($result2)){?>
           <input type="radio" name="rdo[]" value="<?=$show["d_id"];?>" id="rdo[]" <? if($show["d_id"]==$rowshow["d_id"]){echo "checked";} ?>> <?=$show["danme"];?><br>
                        <?
						}
						?>
          </div>
      </div><hr>
      <div class="form-group">
    <label for="input" class="col-sm-2 control-label">สถานะ :</label>
    <div class="col-sm-10">
        <input type="radio" name="rdost" value="0" id="rdost" <? if($rowshow["status"]=="0"){echo "checked";} ?>> ผู้ดูแลระบบ 
        <input type="radio" name="rdost" value="1" id="rdost" <? if($rowshow["status"]=="1"){echo "checked";} ?>> ผู้ใช้งาน
        <input type="radio" name="rdost" value="2" id="rdost" <? if($rowshow["status"]=="2"){echo "checked";} ?>> เจ้าหน้าที่ตรวจสอบ
    </div>
  </div><hr>
   <div class="form-group">
    <label for="input" class="col-sm-2 control-label">สถานะงาน:</label>
    <div class="col-sm-10">
        <input type="radio" name="rdosy" value="y" id="rdost" <? if($rowshow["status_work"]=="y"){echo "checked";} ?>> ทำงาน 
        <input type="radio" name="rdosy" value="n" id="rdost" <? if($rowshow["status_work"]=="n"){echo "checked";} ?>> ลาออก
    </div>
  </div><hr>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">ชื่อ :</label>
    <div class="col-sm-10">
	    <input type="text" class="form-control" name="txt_name" id="txt_name" value="<? echo $rowshow["name"]; ?>"/>
      </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">นามสกุล :</label>
    <div class="col-sm-10">
	    <input type="text" class="form-control" name="txt_last" id="txt_last" value="<? echo $rowshow["lastname"]; ?>" />
     </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">ที่อยู่ :</label>
    <div class="col-sm-10">
	    <textarea name="address" rows="3" value="" class="form-control" id="address" name="address" ><? echo $rowshow["address"]; ?></textarea>
     </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เบอร์โทร :</label>
    <div class="col-sm-10">
	    <input type="text" class="form-control" name="txt_phone" id="txt_phone" value="<? echo $rowshow["phone"]; ?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเบอร์โทร 10 หลัก'); this.value='';}">
      </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10">
	    <input type="text" class="form-control" name="txt_user" id="txt_user" value="<? echo $rowshow["username"]; ?>">
      </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
	    <input type="text" class="form-control" name="txt_pass" id="txt_pass" value="<? echo $rowshow["password"]; ?>">
      </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <a class="btn btn-warning" href="main.php?mn=viewuser" role="button"><span class="glyphicon glyphicon-arrow-left"></span>กลับ</a>
        <input type="submit" name="btnSubmit" class="btn btn-success" id="btnSubmit" value="แก้ไข" onClick="javascript:return confirm('ต้องการแก้ไขข้อมูล?')">
        <input type="hidden" name="btn1" id="btn1" value="ture">
   </div>
  </div>
  </table>
</form>
</div>
</div>


	

<? 
$count = count($_POST['rdo']);
			for ($i = 0; $i < $count; $i++){
			$rdo3 = $_POST['rdo'][$i];
			//echo $rdo3;break;
			
if( isset($_POST["btn1"])){
	if($_POST['btn1'] == "ture"){
			//*** Update Record ***//
	
			$strSQL = "UPDATE user ";
			$strSQL .=" SET title_name = '".$_POST["rdot"]."',name = '".$_POST["txt_name"]."',lastname = '".$_POST["txt_last"]."',sex = '".$_POST["rdos"]."',address = '".$_POST["address"]."',phone = '".$_POST["txt_phone"]."',username = '".$_POST["txt_user"]."',password = '".$_POST["txt_pass"]."',d_id = '$rdo3',status = '".$_POST["rdost"]."',status_work = '".$_POST["rdosy"]."' WHERE u_id = '".$_GET["u_id"]."' ";
			$objQuery = mysql_query($strSQL);		
		
		if($_FILES["filUpload"]["name"] != "")
		{
			if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
			{
				//*** Delete Old File ***//			
				@unlink("myfile/".$_POST["hdnOldFile"]);
				//*** Update New File ***//
				$strSQL = "UPDATE user ";
				$strSQL .=" SET FilesName = '".$_FILES["filUpload"]["name"]."' WHERE u_id = '".$_GET["u_id"]."' ";
				$objQuery = mysql_query($strSQL);		
			}
			
		}
		if($objQuery){
			//echo "<script type='text/javascript'>alert('บันทึกแล้ว');";
				echo ("<script type='text/javascript'>alert('บันทึกแล้ว');</script>");
			}
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=viewuser">
        <?	
		}
	}
}
?>
</body>
</html>


