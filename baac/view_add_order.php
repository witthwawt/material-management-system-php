<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style type="text/css">
	.fo {
		color: #F00;
	}
	.fon {
		color: #090;
	}
</style>
</head>
<body>
<?
	ini_set('display_errors', 1);
	error_reporting(~0);
	$strKeyword = null;
	if(isset($_POST["txtKeyword"])){
		$strKeyword = $_POST["txtKeyword"];
}
?>
<div class="container">
 <div class="col-md-6 col-md-offset-3 ">
        <center><h2 class="hvr-bounce-in">ค้นหารายการใบสั่งซื้อ</h2></center>
            <form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=view_add_order">
                  <center>
                      <div class="input-group has-success">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"</span>
                          </div>
                            <input name="txtKeyword" class="form-control" type="text" id="txtKeyword" value="" placeholder="เลขที่สั่งซื้อ วันที่ ราคา">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info hvr-bounce-in" value="Search">
                                </span>
                      </div>
                  </center>
            </form>
        <p/>
    </div>
    

<?
$rows = 10;
if(isset($page)<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from buy_orders"));
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;

$sql = "SELECT * FROM buy_orders LEFT JOIN user ON (buy_orders.u_id = user.u_id) WHERE (b_id LIKE '%".$strKeyword."%' or price LIKE '%".$strKeyword."%' or date LIKE '%".$strKeyword."%') order by b_id DESC Limit $start,10";
$que = mysql_query($sql) or die (mysql_error()); 
?>
<form action="" method="post" name="fromproduct">
	<table class="table table-striped table-bordered">
          <thead>
                 <tr>
                   	<th width="1"><center>เลขที่ใบสั่งซื้อ</center></th>
                    <th width="53"><center>ชื่อผู้สั่งซื้อ</center></th>
                    <th width="53"><center>วันที่สั่งซื้อ</center></th>
                    <th width="53"><center>ยอดรวมใบสั่งซื้อ</center></th>
                    <th width="53"><center>สถานะใบสั่งซื้อ</center></th>
                    <th width="53"><center>ดูข้อมูลใบสั่งซื้อ</center></th>      
                  </tr>
          </thead>
          <tbody>
<?
while($result=mysql_fetch_array($que)){
?>
  					<tr>						
  						<td align="center"><? echo $result['b_id']; ?></td>
                        <td align="center"><? echo $result['name']; ?></td>
                        <td align="center"><? echo $result['date']; ?></td>
                        <td align="center"><? echo number_format($result['price'],2); ?></td>
                        <td align="center"><? if($result['s_id']<"0"){
													echo "<span class=\"fo\">ยังไม่ได้เลือกบริษัท</span>";
												}else{
													echo "<span class=\"fon\">เลือกบริษัทแล้ว</span>";} ?></td>
          				<td align="center"><? if($result['s_id']<"0"){?>
<a class="btn btn-primary hvr-bounce-in" href="main.php?mn=view_add_order_detail&b_id=<?=$result['b_id']; ?>" role="button"><span class="glyphicon glyphicon-search"></span></a>
												<? }else{?>
						<a class="btn btn-success hvr-bounce-in" href="main.php?mn=report_add_order_detail&b_id=<?=$result['b_id']; ?>" role="button"><span class="glyphicon glyphicon-print"></span>Print
													<? } ?>
                        
</td>
                    </tr>
<?
}
?>
                </tbody>
            </table>
</form>
   <center>   
         <nav>
          <ul class="pagination hvr-bounce-in">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_add_order&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=view_add_order&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_add_order&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
</div>
<br>
</body>
</html>