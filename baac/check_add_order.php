<? session_start();
$b = $_GET["b"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script language="javascript">
function js_popup(theURL,width,height) { //v2.0
	leftpos = (screen.availWidth - width) / 2;
    	toppos = (screen.availHeight - height) / 2;
  	window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
}
</script>
</head>

<body>
<? 
$sql = "SELECT *  FROM buy_orders_detail INNER JOIN stock on (buy_orders_detail.p_id = stock.p_id) and (buy_orders_detail.b_id = '$b') where b_st = 'n' or b_st = 'w'";
//echo var_dump($sql);
$re = mysql_query($sql);//จอย ตาราง 2 ตาราง
$num = mysql_num_rows($re);
if($num<=0){
	//echo "ไม่มีข้อมูล";
	$sql2 = "update buy_orders set status_buy = 2 where b_id = '$b'";
	mysql_query($sql2);
	}
?>
<div class="container media services-wrap wow fadeInDown animated">
  <div class="row">
    <div class="media services-wrap wow fadeInDown animated">
		<center><h2 class="hvr-bounce-in">รับพัสดุ</h2></center>
	</div>
    <br>
    <h4>เลขที่ใบสั่งซื้อ <?=$b;?></h4>
    &nbsp;&nbsp;&nbsp;<a class="btn btn-link hvr-bounce-in" href="#" onClick="js_popup('add_modal_check_order.php?bin=<?=$b;?>',580,600); return false;" role="button">เพิ่มรายการ</a>
    <form name="f1" method="post" action="">
      <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th><center>รหัสสินค้า</center></th>
              <th><center>ชื้อสินค้า</center></th>
              <th><center>ราคาต่อหนวย</center></th>
              <th><center>จำนวนสั่งซื้อ</center></th>
              <th><center>จำนวนในสต๊อก</center></th>
              <th><center>จำนวนค้างรับ</center></th>
              <th><center>ลบ</center></th>
              <th><center>ตรวจรับ</center></th>
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
              <td><center><?=$result["p_id"];?></center></td>
              <td><center><?=$result["pname"];?></center></td>
              <td><center><?=$result["price"];?></center></td>
              <td><center><?=$result["unit"];?></center></td>
              <td><center><?=$result["stock"];?></center></td>
              <td><center><?=$result["b_recive"];?></center></td>
              <td><center><a class="btn btn-danger hvr-bounce-in" href="JavaScript:if(confirm('ลบ!!! <? echo $result["pname"];?> ')==true){window.location='delete_check_add_order.php?p_id=<?=$result["p_id"];?>&b_id=<?=$b;?>';}" role="button"><span class="glyphicon glyphicon-trash"></span></a></center></td>
              <td><center>
              <a class="btn btn-success hvr-bounce-in" href="#" onClick="js_popup('popup_check.php?p_id=<?=$result["p_id"]; ?>&unit=<?=$result["unit"];?>&stock=<?=$result["stock"];?>&b=<?=$b;?>&b_recive=<?=$result["b_recive"];?>&pname=<?=$result["pname"];?>',440,360); return false;" role="button">ตรวจรับ</a>
              </center></td>
            </tr>
<?
}
?>

        </tbody>
      </table>
      <br>
    </form>
    </div>
</div>
<br>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการ</h4>
      </div>
      <div class="modal-body">
        <? include('add_modal_buy_order.php');?>
        
        
        
        
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</body>
</html>