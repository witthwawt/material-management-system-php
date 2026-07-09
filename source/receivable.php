<? session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$sql = "select * from buy_orders inner join buy_orders_detail on (buy_orders.b_id = buy_orders_detail.b_id) inner join stock on (buy_orders_detail.p_id = stock.p_id) and (b_recive > 0)";
$result = mysql_query($sql) or die (mysql_error());
?>
<div class="container">
<center><h3>พัสดุค้างรับ</h3></center>
<table class="table table-striped table-bordered">
       <thead>
          <tr>
          	<th align="center"><center>ลำดับ</center></th>
            <th align="center"><center>รหัสใบสั่งซื้อ</center></th>
            <th align="center"><center>รหัสพัสดุ</center></th>
            <th align="center"><center>ชื่อพัสดุ</center></th>
            <th align="center"><center>จำนวนค้างรับ</center></th>
           </tr>
        </thead>
       <tbody>      
<? 
 while($show = mysql_fetch_array($result)){
 $i6++;
?> 
          <tr>
            <td align="center"><?=$i6;?></td>
            <td align="center"><?=$show["b_id"];?></td>
            <td align="center"><?=$show["p_id"];?></td>
            <td align="center"><?=$show["pname"];?></td>
            <td align="center"><?=$show["b_recive"];?></td>
          </tr>
<?
 }
?>
 		</tbody>
</table>
</div>
</body>
</html>