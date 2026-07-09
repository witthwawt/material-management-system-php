<? session_start();
$b = $_GET["b"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function doUpdate(){
		var t1=document.f1.t1.value*1;
		var t2=document.f1.t2.value*1;
		document.f1.t3.value=t1-t2;
			if (document.f1.t3.value=="NaN"){
			document.f1.t3.value="0";
			}
	}
</script>
</head>

<body>
<? 
$sql = "SELECT *  FROM buy_orders_detail INNER JOIN stock on (buy_orders_detail.p_id = stock.p_id) and (buy_orders_detail.b_id = '$b')";
//echo var_dump($sql);
$re = mysql_query($sql);//จอย ตาราง 2 ตาราง
?>
<div class="container media services-wrap wow fadeInDown animated">
  <div class="row">
    <div class="media services-wrap wow fadeInDown animated">
		<center><h2 class="hvr-bounce-in">แก้ไขใบรับพัสดุ</h2>
		</center>
	</div>
    <br>
    <h4>เลขที่ใบสั่งซื้อ <?=$b;?></h4>
    <form name="f1" method="post" action="main.php?mn=save_check_add_order">
one <input name="t1" onkeyup="doUpdate()"><br>
two <input name="t2" onkeyup="doUpdate()"><br>
result <input readonly name="t3"><br>
      <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th><center>รหัสสินค้า</center></th>
              <th><center>ชื้อสินค้า</center></th>
              <th><center>ราคาต่อหนวย</center></th>
              <th><center>จำนวนสั่งซื้อ</center></th>
              <th><center>ลบ</center></th>
            </tr>
        </thead>
        <tbody>
<?
while($result=mysql_fetch_array($re)){
	
	//$sql1 = "select * from stock where p_id = '".$result["p_id"]."'";
	//$ewsult1 = mysql_query($sql1) or die (mysql_error());
	//$show1 = mysql_fetch_array($ewsult1);
?>
            <tr>
              <td><center><?=$result["p_id"];?><input type="hidden" name="txt_pid[]" id="txt_pid[]" value="<?=$result["p_id"];?>"></center></td>
              <td><center><?=$result["pname"];?></center></td>
              <td><center><?=$result["price"];?></center></td>
              <td><center><?=$result["unit"];?></center></td>           
              
              
              <td><center><a class="btn btn-danger" href="JavaScript:if(confirm('ลบ!!! <? echo $result["pname"];?> ')==true){window.location='delete_view_ream_detail.php?p_id=<? echo $result["p_id"];?>&b_id=<?=$b_id;?>';}" role="button"><span class="glyphicon glyphicon-remove"></span></a></center></td>
            </tr>
<?
}
?>
        </tbody>
      </table><br>
      <center><input type="submit" class="btn btn-success btn-lg hvr-bounce-in" name="txt_id" id="txt_id" value="บันทึก"></center>
    <br>
    </form>
    </div>
</div>
<br>
</body>
</html>