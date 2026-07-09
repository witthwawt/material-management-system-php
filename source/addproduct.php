<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div class="container">
	<div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">           
		<center><div class="hvr-bounce-in"><h2>แก้ไขพัสดุ</h2></div></center>
	</div>
<div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">

<?
$rows = 10;
if($page<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from stock"));
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;

$sql = "SELECT * FROM stock inner join stock_category on (stock.c_id = stock_category.c_id) inner join supplier on (stock.s_id = supplier.s_id) inner join stock_unit on (stock.su_id = stock_unit.su_id) Limit $start,10";
$que = mysql_query($sql) or die (mysql_error()); 
?>

<form action="" method="post" name="fromproduct">
    <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th ><center>รูป</center></th>
            <th ><center>รหัสพัสดุ</center></th>
            <th ><center>ชื่อ</center></th>
            <th ><center>จำนวนคงเหลือ</center></th>
            <th ><center>หน่วยนับ</center></th>
             <th ><center>ราคา</center></th>
             <th ><center>ประเภทพัสดุ</center></th>
             <th ><center>ตัวแทนจำหน่าย</center></th>
            <th ><center>แก้ไข</center></th>
            <th ><center>ลบ</center></th>     
          </tr>
        </thead>
     <tbody>
<? while($result=mysql_fetch_array($que)){?>
    	<tr <? if($result["stock"] <= 10){?>class="danger"<? }?> >
       		<td align="center">
<div class="hvr-bounce-in"><a href="myfile/<?=$result['Picture']; ?>" rel="prettyPhoto" ><img src="myfile/<?=$result['Picture']; ?>" width="100px" height="100px" border="0"/></a></div>
				</td>
            <td align="center"><div class="hvr-bounce-in"><?=$result['p_id']; ?></div></td>
       		<td align="center"><div class="hvr-bounce-in"><?=$result['pname']; ?></div></td>
       		<td align="center"><div class="hvr-bounce-in"><?=$result['stock']; ?></div></td>
            <td align="center"><div class="hvr-bounce-in"><?=$result['su_name']; ?></div></td>
            <td align="center"><div class="hvr-bounce-in"><?=$result['price']; ?></div></td>
            <td align="center"><div class="hvr-bounce-in"><?=$result['category']; ?></div></td>
            <td align="center"><div class="hvr-bounce-in"><?=$result['s_name']; ?></div></td>
       		<td align="center">
<a class="btn btn-primary hvr-bounce-in" href="main.php?mn=view_addproduct&p_id=<?=$result['p_id']; ?>" role="button"><span class="glyphicon glyphicon-pencil"></span></a>	
				</td>
        	<td align="center">
<a class="btn btn-danger hvr-bounce-in" href="JavaScript:if(confirm('คุณต้องการลบ <?=$result['pname']; ?> !!!ออกจากรายการหรือไม่')==true){window.location='delete_addproduct.php?p_id=<?=$result['p_id']; ?>';}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
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
              <a href="main.php?mn=addproduct&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=addproduct&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=addproduct&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
     </div>
</div>

</body>
</html>