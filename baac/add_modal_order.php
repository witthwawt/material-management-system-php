<?

$sqlc = "select * from stock_category ORDER BY c_id ASC";
$resultc = mysql_query($sqlc);

$sqlc1 = "select * from supplier ORDER BY s_id ASC";
$resultc1 = mysql_query($sqlc1) or die (mysql_error());

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
 
 <script type="text/javascript">
	function fncSubmit()
	{
		if(document.getElementById('txt_p').value == ""){
			alert('กรุณากรอกชื่อ!!! พัสดุ');
			document.frm2.txt_p.focus();
			return false;
		}else if(document.getElementById('txt_pr').value == ""){
			alert('กรุณากรอกราคา!!! พัสดุ');
			document.frm2.txt_pr.focus();
			return false;
		}else if(document.getElementById('filUpload').value==""){
			window.alert("กรุณาเลือก!!! รูปภาพ")
			document.frm2.filUpload.focus();
			return false;
		}else if(document.getElementById('sl1').value  == "0"  ){
			alert('กรุณาเลือกประเภท!!! พัสดุ');
			document.frm2.sl1.focus();
			return false;
    	}else if(document.getElementById('sl2').value  == "0"  ){
			alert('กรุณาเลือก!!! บริษัท');
			document.frm2.sl2.focus();
			return false;
    	}
	}
</script>

</head>

<body>
   <?
   if(isset($_POST["inst"])){
	   if($_POST["inst"]=="TRUE"){
	if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"])){
		
		//*** Insert Record ***//
		$yn = date("Y")+543;
		$dateN = date("d-m-").$yn;
			$txt_pname = $_POST["txt_p"];
			$txt_price = $_POST["txt_pr"];
			$photo = $_FILES["filUpload"]["name"];
			$sl1 = $_POST["sl1"];
			$sl2 = $_POST["sl2"];
			$zero = "0";
$sqlm = "INSERT INTO stock (pname,stock,price,Picture,date,c_id,s_id) values ('$txt_pname','$zero','$txt_price','$photo','$dateN','$sl1','$sl2')";
			$result = mysql_query($sqlm) or die(mysql_error());
			if($result) {
					echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
				}else{
					echo "<script type='text/javascript'>alert('error');</script>";
				}
			}
		}
   }
?>
<div class="row">
	<div class="col-xs-6 col-md-1"></div>
		<div class="col-xs-12 col-sm-6 col-md-11">
		
            <form name="form1" method="post" action="" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">
            </form>

            <form name="frm2" method="post" action="" class="form-inline" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label for="exampleInputName2">ชื่อพัสดุ : </label>
                    <input type="text" class="form-control" name="txt_p" id="txt_p" style="width: 300px;ext-align: center;">
                  </div><br><br>
                  
                  <div class="form-group">
                    <label for="exampleInputName2">ราคาพัสดุ : </label>
                	<input type="text" class="form-control" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" name="txt_pr" id="txt_pr"/>			
                  </div><br><br>
                  
                  <div class="form-group">
                    <label for="exampleInputName2">รูปภาพพัสดุ : </label>
                	<input type="file" class="form-control" name="filUpload" id="filUpload"><br>
                  </div><br><br>
                  
                  <div class="form-group">
                    <label for="exampleInputName2">ประเภทพัสดุ : </label>
                	<select name="sl1" id="sl1" class="form-control">
                                <option value="0">กรุณาเลือกประเภทพัสดุ</option>
                                <? while($showc=mysql_fetch_array($resultc)){?>
                                <option value="<? echo $showc["c_id"];?>"><? echo $showc["category"];?></option>
                                <?
                                  }
                                ?>
                              </select>
                   </div><br><br>
                   
                   <div class="form-group">
                    <label for="exampleInputName2">ตัวแทนจำหน่าย : </label>
                              <select name="sl2" id="sl2" class="form-control">
                                <option value="0">กรุณาเลือกตัวแทนจำหน่าย</option>
                                 <? while($showc1=mysql_fetch_array($resultc1)){?>
                                <option value="<? echo $showc1["s_id"];?>"><? echo $showc1["s_name"];?></option>
                                <?
                                  }
                                ?>
                              </select>
                    </div><br><br>
                <input type="submit" class="btn btn-success" name="button" id="button" value="เพิ่มรายการพัสดุ">
                <input type="hidden" name="inst" id="inst" value="TRUE">
            </form>
		</div>
	</div>
</div>
</body>
</html>