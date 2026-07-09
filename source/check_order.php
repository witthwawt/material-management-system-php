<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style type="text/css">
.red {
	color: #F00;
}
.green {
	color: #0C0;
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
        <center><h2 class="hvr-bounce-in">ค้นหาใบสั่งซื้อ</h2></center>
            <form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=check_order">
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
//if($page<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from  buy_orders"));
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;


//SELECT *  FROM buy_orders AS d1 INNER JOIN buy_orders_detail AS d2 ON  (d1.b_id = d2.b_id) INNER JOIN user AS d3 ON (d1.u_id = d3.u_id) INNER JOIN stock AS d4 ON (d2.p_id = d4.p_id) and (d1.b_id = '$bid')
   $sql = "SELECT * FROM  buy_orders WHERE date LIKE '%".$strKeyword."%' or b_id LIKE '%".$strKeyword."%' or price LIKE '%".$strKeyword."%' order by status_buy ASC Limit $start,10";
   $que = mysql_query($sql) or die (mysql_error());
   $Num_Rows = mysql_num_rows($que);
?>


<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
   		<thead>
       		<tr>
          		<th ><center>เลขที่ใบสั่งซื้อ</center></th>
          		<th ><center>ชื่อผู้สั่งซื้อ</center></th>
          		<th ><center>ราคารวม</center></th>
          		<th ><center>วันที่สั่งซื้อ</center></th>
          		<th ><center>สถนะใบสั่งซื้อ</center></th>
          		<th ><center>รับพัสดุ</center></th>      
       		</tr>
   		</thead>
   		<tbody>
<?
while($result=mysql_fetch_array($que)){
	$sql2 = "select * from user where u_id = '".$result['u_id']."'";
	$result2 = mysql_query($sql2) or die (mysql_error());
	$show2 = mysql_fetch_array($result2);
?>
  			<tr>						
  				<td align="center"><? echo $result['b_id']; ?></td>
            	<td align="center"><? echo $show2['name']; ?></td>
            	<td align="center"><? echo number_format($result['price']); ?></td>
            	<td align="center"><? echo $result['date'];?></td>
            	<td align="center"><? if($result["s_id"]==""){}else{
										
										if($result["status_buy"]=="1"){
											echo "<span class=\"red\"/>ยังไม่ตรวจรับ</span>";
										}else{
											echo "<span class=\"green\">ตรวจรับแล้ว</span>";
											}
										}
									?></td>
            	<td align="center"><? if($result["s_id"]==""){
										echo "ยังไม่สั่งซื้อ";
										}else{?>
                <a class="btn btn-success hvr-bounce-in" href="main.php?mn=check_add_order&b=<?=$result['b_id'];?>" role="button">
                                    <span class="glyphicon glyphicon-search"></span></a>
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
          <ul class="pagination hvr-bounce-in">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=check_order&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=check_order&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=check_order&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
</div>
<br>
<br>       
</body>
</html>