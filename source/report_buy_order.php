<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style type="text/css">
.green {
	color: #0C0;
}
</style>
<style type="text/css">
	window.addEvent('load', function() {
	new DatePicker('.demo_allow_empty', {
		pickerClass: 'datepicker_dashboard',
		allowEmpty: true
	});
});	
</style>

</head>
<body>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<center><h3>รายงานการสั่งซื้อพัสดุ</h3></center>
    </div>

<?
//SELECT * FROM buy_orders inner join user on (buy_orders.u_id = user.u_id) WHERE (date BETWEEN '25-07-2559' AND '31-07-2559');
   $sql = "SELECT * FROM buy_orders inner join user on (buy_orders.u_id = user.u_id) WHERE s_id > 0";
   $que = mysql_query($sql) or die (mysql_error());
   
   //$sql2 = "select SUM(price) from buy_orders";
   $sql2 = "SELECT SUM(price) FROM buy_orders WHERE s_id > 0"; 
   $que2 = mysql_query($sql2) or die (mysql_error());
	$show = mysql_fetch_array($que2);
	
	
	
	
	
?>


<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<th ><center>ลำดับ</center></th>
                    	<th ><center>เลขที่ใบสั่งซื้อ</center></th>
                        <th ><center>ชื่อผู้สั่งซื้อ</center></th>
                        <th ><center>วันที่สั่งซื้อ</center></th>
                        <th ><center>ราคารวม</center></th>
                        <th ><center>สถนะ</center></th> 
                  </tr>
                </thead>
                <tbody>
<?

while($result=mysql_fetch_array($que)){	
$i10++;
?>
  <tr>				
  					<td align="center"><?=$i10;?></td>		
  					<td align="center"><? echo $result['b_id']; ?></td>
                    <td align="center"><? echo $result['title_name']; echo $result['name'];?>&nbsp;<? echo $result['lastname']; ?></td>
                    <td align="center"><? echo $result['date']; ?></td>
                     <td align="center"><? echo $result['price']; ?></td>
                    <td align="center"><? if($result['status_buy']="2"){ ?>
                    						<span class="green">สั่งซื้อแล้ว</span>
                                            <? }?>
          </td>
                </tr>
<?
}
?>
           </tbody>
    </table>
	</form>
<? //echo number_format($show["SUM(price)"]);?>
      <table width="100%" >
        <tr>
          <td align="right">ยอดรวม&nbsp;<? echo number_format($show["SUM(price)"]);?>&nbsp;บาท</td>
        </tr>
      </table>
</div>
   <br>
  <center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>
  
 
</body>
</html>