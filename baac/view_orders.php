<? session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	.ss {
		color: #F00;
	}
	.gg {
		color: #0C0;
	}
</style>
</head>

<body>
<?
 //$SQL="select * from orders left join orders_detail on (orders.o_id = orders_detail.o_id) left join stock on (stock.p_id = orders_detail.p_id) where u_id = '$id'";
	ini_set('display_errors', 1);
	error_reporting(~0);
	$strKeyword = null;
	if(isset($_POST["txtKeyword"])){
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<div class="container">
    <div class="col-md-6 col-md-offset-3 ">
        <center><h2 class="hvr-bounce-in">ค้นหารายการที่ขอเบิก</h2></center>
            <form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=view_orders">
                  <center>
                      <div class="input-group has-success">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"</span>
                          </div>
                            <input name="txtKeyword" class="form-control" type="text" id="txtKeyword" value="" placeholder="เลขที่ใบเบิก หรือ วันที่เบิก">
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info hvr-bounce-in" value="Search">
                                </span>
                      </div>
                  </center>
            </form>
        <p/>
    </div>
   <br>

<?
$rows = 10;
if(isset($page)<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from orders where u_id = '$id'")) or die (mysql_error());
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;

$sql = "SELECT * FROM orders WHERE (o_date LIKE '%".$strKeyword."%' or o_id LIKE '%".$strKeyword."%') and u_id = '$id' order by st_id ASC Limit $start,10";
$que = mysql_query($sql) or die (mysql_error());  
?>

</p>
<div class="container">
  <form action="" method="post" name="fromproduct">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
              <th width="53"><center>เลขที่ใบเบิก</center></th>
              <th width="53"><center>วันที่เบิก</center></th>
              <th width="53"><center>สถานะ</center></th>
              <th width="53"><center>ชื่อ</center></th>
              <th width="5"><center>รายละเอียด</center></th>
              <th width="5"><center>ลบ</center></th>
            </tr>
         </thead>
        <tbody>
<?
while($result=mysql_fetch_array($que)){
	$sql1 = "select * from user where u_id = '".$result['u_id']."'";
	$result11 = mysql_query($sql1) or die (mysql_error());
	$show1 = mysql_fetch_array($result11);
?>
  <tr>
      <td align="center"><? echo $result['o_id']; ?></td>
      <td align="center"><? echo $result['o_date']; ?></td>
      <td align="center"><div class="hvr-bounce-in"><? if($result['st_id']=="1"){
		  							echo "<span class=\"ss\">รอการอนุมัติ</span>";
								}else{echo "<span class=\"gg\">อนุมัติแล้ว</span>"; } ?></div></td>
      <td align="center"><? echo $show1['name']; ?></td>
      
      <td align="center"><a class="btn btn-primary hvr-bounce-in" href="main.php?mn=view_orders_detail&o_id=<?=$result['o_id'];?>&st_id=<?=$result['st_id'];?>" role="button">
                                    <span class="glyphicon glyphicon-search"></span></a></td>
      <td align="center">
	 <? if($result['st_id']=="2"){
       }else{ ?>
       
      <a class="btn btn-danger hvr-bounce-in" href="JavaScript:if(confirm('คุณต้องการลบใบเบิกเลขที่ <? echo $result['o_id']; ?> !!!ออกจากรายการหรือไม่')==true){window.location='delete_orders.php?o_id=<?=$result['o_id']; ?>';}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
<? 
} 
?>
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
          <ul class="pagination">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_orders&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=view_orders&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_orders&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
</div>
</body>
</html>