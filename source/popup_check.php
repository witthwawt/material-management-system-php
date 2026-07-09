<? include("config.php");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตรวจรับพัสดุ</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
<script language="javascript">
	function chknum(){
		//var txt_p = document.frm1.txt_p.value;
		//var txt_r = document.frm1.txt_r.value;
		//if(txt_r>txt_p){
			//document.frm1.txt_r.focus();
			//document.frm1.txt_r.value="";
			//return false;
			//}else 
			if(document.getElementById('txt_r').value == ""){
			alert('กรุณากรอก!!! ตรวจรับ');
			document.frm1.txt_r.focus();
			return false;
			}
		//alert(txt_r);
		}
</script>
</head>

<body>
<div class="container">
<p>
<center><h2>รหัสใบสั่งซื้อ : <?=$_GET["b"];?></h2></center><p>
<h3>ชื่อพัสดุ : <?=$_GET["pname"];?><p>
 รหัสพัสดุ : <?=$_GET["p_id"];?></h3>
<form name="frm1" method="post" class="form-group" action="" onSubmit="return chknum();">
<table class="table">
  <tr>
  <? 
	if($_GET["b_recive"]>0){?>
    <td>จำนวนค้างรับ :</td>
    <td><input type="text" class="form-control" name="txt_p" id="txt_p" value="<?=$_GET["b_recive"];?>" style="width: 150px;ext-align: center;" readonly></td>
  	<?
     }else{
	?>
    <td>จำนวนสั่งซื้อ :</td>
    <td><input type="text" class="form-control" name="txt_p" id="txt_p" value="<?=$_GET["unit"];?>" style="width: 150px;ext-align: center;" readonly></td>
  	<?
     }
	?>
  </tr>
  <tr>
    <td>จำนวนในสต๊อก :</td>
    <td><input type="text" class="form-control" name="txt_s" id="txt_s" value="<?=$_GET["stock"];?>" style="width: 150px;ext-align: center;" readonly></td>
  </tr>
  <tr>
    <td>ตรวจรับ :</td>
    <td><input type="text" class="form-control" name="txt_r" id="txt_r" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" style="width: 150px;ext-align: center;"></td>
  </tr>
</table>
 
 
    <input type="submit" class="btn btn-success hvr-bounce-in" name="btn1" id="btn1" value="ตรวจรับ">
 	<input type="hidden" name="btn2" id="btn2" value="ture">
</form>
</div>




<?
if(isset($_POST["btn2"])){
	if($_POST["btn2"]=="ture"){
		$p = $_POST["txt_p"];//จำนวนที่ค้างรับ หรือ จำนวนที่สั่งซื้อ
 		$r = $_POST["txt_r"];//จำนวนที่ตรวจรับ
		$s = $_POST["txt_s"];//จำนวนในสต๊อก
		$stock = $s + $r;//จำนวนในสต๊อก + จำนวนที่ตรวจรับ เก็บผลลัพไว้ในตัวแปร $stock
		
		if($r>$p){?>
		<meta http-equiv="refresh" content="0;url=http:popup_check.php?p_id=<?=$_GET["p_id"]; ?>&unit=<?=$_GET["unit"];?>&stock=<?=$_GET["stock"];?>&b=<?=$_GET["b"];?>&b_recive=<?=$_GET["b_recive"];?>&pname=<?=$_GET["pname"];?>">	
			<?
            break;	
		}else{
			if($r<$p){
				$rs = $p - $r;
				$st = "w";
				}elseif($r==$p){
					$rs = 0;
					$st = "y";
					}

		$sql = "update buy_orders_detail set b_recive = '$rs',b_st = '$st',b_date = '$dateN' where b_id = '".$_GET["b"]."' and p_id = '".$_GET["p_id"]."'";
		$result = mysql_query($sql);
		
		$sql2 = "update stock set stock = '$stock' where p_id = '".$_GET["p_id"]."'";
		$result2 = mysql_query($sql2);
		
		echo"<script language=javascript>";
	  	echo "window.opener.location.reload('check_add_order.php');window.close();";
	  	echo "</script>";
		
		}
	}
}

?>
</body>
</html>