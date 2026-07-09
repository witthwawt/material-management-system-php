<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
   <script type="text/javascript">
	function fncSubmit()
	{	
		if(document.frmmember.rdo1[0].checked== false && document.frmmember.rdo1[1].checked== false && document.frmmember.rdo1[2].checked== false ){
				window.alert("กรุณาเลือก!!! คำนำหน้าชื้่อ")
				document.frmmember.rdo1[0].focus();
				return false;
		}else if(document.getElementById('txt_name').value == ""){
			alert('กรุณากรอก!!! ชื่อพนักงาน');
			document.frmmember.txt_name.focus();
			return false;
		}else if(document.getElementById('txt_last').value == ""){
			alert('กรุณากรอก!!! นามสกุล');
			document.frmmember.txt_last.focus();
			return false;
		}else if(document.frmmember.rdo2[0].checked== false && document.frmmember.rdo2[1].checked== false){
				window.alert("กรุณาเลือก!!! เพศ")
				document.frmmember.rdo2[0].focus();
				return false;
		}else if(document.frmmember.rdo4[0].checked== false && document.frmmember.rdo4[1].checked== false && document.frmmember.rdo4[2].checked== false){
				window.alert("กรุณาเลือก!!! สถานะ")
				document.frmmember.rdo4[0].focus();
				return false;
		}else if(document.getElementById('txtadd').value == ""){
			alert('กรุณากรอก!!! ที่อยู่');txt_phone
			document.frmmember.txtadd.focus();
			return false;
		}else if(document.getElementById('txt_phone').value == ""){
			alert('กรุณากรอก!!! เบอร์โทร');
			document.frmmember.txt_phone.focus();
			return false;
		}else if(document.getElementById('filUpload').value==""){
			window.alert("กรุณาเลือก!!! รูปภาพ")
			document.frmmember.filUpload.focus();
			return false;
		}else if(document.getElementById('txt_user').value  == ""  ){
			alert('กรุณากรอก!!! Username');
			document.frmmember.txt_user.focus();
			return false;
    	}else if(document.getElementById('txt_pass').value  == ""  ){
			alert('กรุณากรอก!!! Password');
			document.frmmember.txt_pass.focus();
			return false;
    	}
		var cidLen = document.getElementById('txt_phone').value
			if(cidLen.length != 10){
				alert('กรุณากรอกเบอร์โทร 10 หลัก');
				document.frmmember.txt_phone.focus();
				return false;
			}
			else{
				
			}
			//var cc = document.frmmember.con.value
			//for(i=0;i<cc;i++){
				//var rdo = document.frmmember.elements["rdo[]"][i].value
				//if(document.frmmember.rdo.checked== false){
				//window.alert("กรุณาเลือก!!! เผนก")
				//document.frmmember.rdo[0].focus();
				//return false;
					//}
				//}
	}
</script>
</head>
<body>
	<?
	$count = count($_POST['rdo']);
			for ($i = 0; $i < $count; $i++){
			$rdo3 = $_POST['rdo'][$i];
			//break;
			
	if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"])){
		
		//*** Insert Record ***//
			$rdo1 = $_POST["rdo1"];
			 
			$rdo4 = $_POST["rdo4"];
			$txt_name = $_POST["txt_name"];
			$txt_last = $_POST["txt_last"];
			$rdo2 = $_POST["rdo2"];
			$txtadd = $_POST["txtadd"];
			$txt_phone = $_POST["txt_phone"];
			$txt_user = $_POST["txt_user"];
			$txt_pass = $_POST["txt_pass"];
			$photo = $_FILES["filUpload"]["name"];
			$sqlm = "INSERT INTO user (title_name,name,lastname,FilesName,sex,address,phone,username,password,d_id,status,status_work) values ('$rdo1','$txt_name','$txt_last','$photo','$rdo2','$txtadd','$txt_phone','$txt_user','$txt_pass','$rdo3','$rdo4','y')";
			//echo var_dump($sqlm);
			

 
			
			$result = mysql_db_query($dbname,$sqlm) or die(mysql_error());
			}
			if($result) {
				echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
				}else{
					echo "Error";
					}
			}

$sql = "select * from division";
$result2 = mysql_query($sql) or die (mysql_error());
?>

<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3 hvr-glow">
      	<center><div class="hvr-bounce-in"><h2>เพิ่มพนักงาน</h2></div></center><br>
            <form name="frmmember" class="form-horizontal" method="post" action="" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">
                 <div class="form-group">
                    <label for="input" class="col-sm-3 control-label">คำนำหน้า:</label>
                    	<div class="col-sm-9">
                          <input type="radio" name="rdo1" id="rdo1" value="นาย" /> นาย<br>
                          <input type="radio" name="rdo1" id="rdo1" value="นาง" /> นาง<br>
                          <input type="radio" name="rdo1" id="rdo1" value="นางสาว" /> นางสาว<br>
                      	</div>
                  </div>
               <hr>
                  <div class="form-group">
                    <label for="input" class="col-sm-3 control-label">ชื่อ :</label>
                   		<div class="col-sm-9">
                        	<input type="text" class="form-control" name="txt_name" id="txt_name" >
                      </div>
                  </div>
                  <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">นามสกุล :</label>
                		<div class="col-sm-9">
                    		<input type="text" class="form-control" name="txt_last" id="txt_last"/>
                  		</div>
                  </div>
               <hr>
                  <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">เพศ :</label>
                		<div class="col-sm-9">
                      		<input type="radio" name="rdo2" value="ชาย" id="rdo2"> ชาย </label><br>
                        	<input type="radio" name="rdo2" value="หญิง" id="rdo2"> หญิง</label>
                        </div>
                 </div>
              <hr>
                 <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">แผนก :</label>
                		<div class="col-sm-9">
                        <? while($show = mysql_fetch_array($result2)){?>
                        <input type="radio" name="rdo[]" value="<?=$show["d_id"];?>" id="rdo[]"> <?=$show["danme"];?><br>
                        <?
						}
						?>
                       </div>
                </div>
             <hr>
                <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">สถานะ :</label>
                        <div class="col-sm-9">
                        	<input type="radio" name="rdo4" value="0" id="rdo4"> ผู้ดูแลระบบ
                            <input type="radio" name="rdo4" value="1" id="rdo4"> พนักงาน
                            <input type="radio" name="rdo4" value="2" id="rdo4"> เจ้าหน้าที่ตรวจสอบ
                       </div>
                </div>
             <hr>
                <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">ที่อยู่ :</label>
                		<div class="col-sm-9">
                    		<textarea name="txtadd" class="form-control" id="txtadd"></textarea>
                       </div>
                  </div>
                <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">เบอร์โทร :</label>
                		<div class="col-sm-9">
                    		<input type="text" class="form-control" name="txt_phone" id="txt_phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเบอร์โทร 10 หลัก'); this.value='';}" >
                       </div>
                  </div>
                <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">รูปภาพ :</label>
               		 	<div class="col-sm-9">
                    		<input type="file" class="form-control" name="filUpload" id="filUpload" >
                     	</div>
                  </div>
                <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">Username:</label>
                		<div class="col-sm-9">
                    		<input type="text" class="form-control" name="txt_user" id="txt_user" >
                       </div>
                 </div>
                 <div class="form-group">
                	<label for="input" class="col-sm-3 control-label">Password:</label>
                		<div class="col-sm-9">
                    		<input type="text" class="form-control" name="txt_pass" id="txt_pass" >
                    	</div>
                  </div>
                 <div class="form-group">
                	<label for="input" class="col-sm-3 control-label"></label>
                		<div class="col-sm-9">
                   			<input name="btnSubmit" class="btn btn-success btn-lg" type="submit" value="บันทึก">
                 		</div>
                  </div>	
            </form>
    	</div>
    </div>
</div>
<br>
</body>
</html>