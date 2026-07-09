<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<center><h3>รายงานพัสดุค้างรับ</h3></center>
    </div>

<?
   $sql = "SELECT * FROM buy_orders_detail inner join stock on (buy_orders_detail.p_id = stock.p_id) and (buy_orders_detail.b_recive > 0)";
   $que = mysql_query($sql) or die (mysql_error());
   
?>
<div class="container">

<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<th width="1"><center>เลขที่สั่งซื้อ</center></th>
                        <th width="53"><center>เลขที่พัสดุ</center></th>
                        <th width="53"><center>ชื่อพัสดุ</center></th>
                        <th width="53"><center>จำนวนสั่งซื้อ</center></th> 
                        <th width="53"><center>จำนวนค้างรับ</center></th>           
                  </tr>
                </thead>
                <tbody>
<?
while($result=mysql_fetch_array($que)){
?>
  <tr>
  							<td align="center"><? echo $result['b_id']; ?></td>
  							<td align="center"><? echo $result['p_id']; ?></td>
                            <td align="center"><? echo $result['pname']; ?></td>
                            <td align="center"><? echo $result['stock'];?></td>
         					 <td align="center"><? echo $result['b_recive']; ?></td>
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