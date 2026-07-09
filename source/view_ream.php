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

        <center><h2 class="hvr-bounce-in">ค้นหารายการที่ขอเบิก</h2></center>
            <form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=view_ream">
                  <center>
                      <div class="input-group has-success">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"</span>
                          </div>
                            <input name="txtKeyword" class="form-control" type="text" id="txtKeyword" value="" placeholder="เลขที่เบิก ชื่อผู้เบิก วันที่เบิก" >
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info hvr-bounce-in" value="Search">
                                </span>
                      </div>
                  </center>
            </form>
        <p/>

   <br>
   
<?
$rows = 10;
if(isset($page)<=0)$page=1;
//if($page<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from orders")) or die (mysql_error());
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;


//$sql = "SELECT *  FROM buy_orders AS d1 INNER JOIN buy_orders_detail AS d2 ON  (d1.b_id = d2.b_id) INNER JOIN user AS d3 ON (d1.u_id = d3.u_id) INNER JOIN stock AS d4 ON (d2.p_id = d4.p_id) WHERE name LIKE '%".$strKeyword."%'";
   //$sql = "SELECT * FROM orders WHERE name LIKE '%".$strKeyword."%' or o_date LIKE '%".$strKeyword."%' order by st_id ASC Limit $start,10";
  
$sql = "SELECT * FROM orders LEFT JOIN user ON (orders.u_id = user .u_id)  WHERE (user.name LIKE '".$strKeyword."%' or orders.o_date LIKE '%".$strKeyword."%' or orders.o_id LIKE '".$strKeyword."%') order by st_id ASC Limit $start,10";
   $que = mysql_query($sql) or die (mysql_error());
   $Num_Rows = mysql_num_rows($que);
?>


<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
   		<thead>
       		<tr>
          		<th width="1"><center>เลขที่ใบเบิก</center></th>
          		<th width="53"><center>ชื่อผู้เบิก</center></th>
          		<th width="53"><center>วันที่ขอเบิก</center></th>
          		<th width="53"><center>สถานะใบเบิก</center></th>
          		<th width="53"><center>ดูข้อมูลที่ขอเบิก</center></th>      
       		</tr>
   		</thead>
   		<tbody>
<?
while($result=mysql_fetch_array($que)){
?>
  			<tr>						
  				<td align="center"><? echo $result['o_id']; ?></td>
            	<td align="center"><? echo $result['name']; ?></td>
            	<td align="center"><? echo $result['o_date']; ?></td>
            	
                
                <td align="center"><? if($result['st_id']=="1"){
										echo "<span class=\"fo\">รอการอนุมัติ</span>";
									}else{
										echo "<span class=\"fon\">อนุมัติแล้ว</span>";
									} ?></td>              
            	
               
                <td align="center"><? if($result['st_id']=="1"){?>
				<a class="btn btn-primary hvr-bounce-in" href="main.php?mn=view_ream_detail&o_id=<?=$result['o_id']; ?>" role="button">
                                    <span class="glyphicon glyphicon-search"></span></a>
									<?
                                    }else{
									?>
				<a class="btn btn-primary hvr-bounce-in" href="main.php?mn=report_ream_detail&o_id=<?=$result['o_id']; ?>" role="button">
                                    <span class="glyphicon glyphicon-search"></span></a>
									<?
                                    } 
									?></td>
                
                
        	</tr>
<?
 }
?>
    	</tbody>
	</table>
</form>
<p/>
    <center>   
         <nav>
          <ul class="pagination hvr-bounce-in">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_ream&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=view_ream&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=view_ream&page=<?=$page+1?>" aria-label="Next">
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