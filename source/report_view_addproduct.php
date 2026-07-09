<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<center><h3>รายงานการรับพัสดุ</h3></center>
    </div>

<?
   $sql = "SELECT * FROM buy_orders inner join buy_orders_detail on (buy_orders.b_id = buy_orders_detail.b_id) inner join stock on (buy_orders_detail.p_id = stock.p_id) inner join stock_category on (stock.c_id = stock_category.c_id) where b_st = 'y'";
   $que = mysql_query($sql) or die (mysql_error());
   
?>
<div class="container">

<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<th width="1"><center>ลำดับ</center></th>
                    	<th width="1"><center>เลขใบสั่งซื้อ</center></th>
                        <th width="53"><center>เลขที่พัสดุ</center></th>
                        <th width="53"><center>ชื่อพัสดุ</center></th>
                        <th width="53"><center>วันที่ตรวจรับ</center></th>
                        <th width="53"><center>ประเภทพัสดุ</center></th>            
                  </tr>
                </thead>
                <tbody>
<?
while($result=mysql_fetch_array($que)){
$i7++
?>
  <tr>
  							<td align="center"><?=$i7; ?></td>
  							<td align="center"><?=$result['b_id']; ?></td>
                            <td align="center"><?=$result['p_id']; ?></td>
                            <td align="center"><?=$result['pname'];?></td>
         					<td align="center"><?=$result['b_date']; ?></td>
                            <td align="center"><?=$result['category']; ?></td>
                        </tr>
<?
}
?>
                </tbody>
            </table>
			</form>
            </div>
            </div>
            
             <br>
  <center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>
</body>
</html>