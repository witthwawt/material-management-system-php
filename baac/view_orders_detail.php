<? session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
.x {
	color: #0C0;
}
</style>
 <script language="javascript">
		function js_popup(theURL,width,height) { //v2.0
			leftpos = (screen.availWidth - width) / 2;
				toppos = (screen.availHeight - height) / 2;
			window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
		}
	</script>
</head>

<body>
<div class="container">
<center><h2><div class="hvr-bounce-in">รายการเบิกพัสดุ </div></h2></center>
 <? if($_GET["st_id"]=="2"){}else{ ?>
<a class="btn btn-link hvr-bounce-in" href="#" onClick="js_popup('add_modal_user_ream_detail.php?bin=<?=$_GET["o_id"];?>',580,600); return false;" role="button">เพิ่มรายการ</a> 
<?
 }
 ?>
<p/>

<?
 //$SQL="select * from orders left join orders_detail on (orders.o_id = orders_detail.o_id) left join stock on (stock.p_id = orders_detail.p_id) where u_id = '$id'";
   $sql = "SELECT * FROM orders inner join orders_detail on (orders.o_id = orders_detail.o_id) inner join stock on (orders_detail.p_id = stock.p_id) WHERE (orders.o_id = '".$_GET['o_id']."') ";
   $que = mysql_query($sql) or die (mysql_error()); 
?>


  <form action="save_view_orders_detail.php" method="post" name="fromproduct">
    	<table class="table table-striped table-bordered">
           <thead>
              <tr>
              	<th width="53"><center>ลำดับที่</center></th>
                <th width="53"><center>รายการที่เบิก</center></th>
                <th width="53"><center>จำนวนที่เบิก</center></th>
                <th width="5"><center>ลบ</center></th>   
                </tr>
            </thead>
          <tbody>
            
<? while($result=mysql_fetch_array($que)){
	$i3++;	
?>

     <tr>
        <td align="center"><? echo $i3; ?></td>
  		<td align="center"><? echo $result['pname']; ?>
        <input type="hidden" name="txt_id[]" id="txt_id[]" value="<? echo $result['d_id']; ?>"></td>
        <td align="center"><? //echo $result['s_qty']; ?>
        <input type="text" name="txt_s[]" value="<? echo $result['s_qty']; ?>" class="form-control" style="width: 60px;text-align: center;"></td>
         <td align="center">
		<? if($result['st_id']=="2"){
				
			}else{ ?>
                <a class="btn btn-danger hvr-bounce-in" href="JavaScript:if(confirm('คุณต้องการลบ <? echo $result['pname']; ?> !!!ออกจากรายการหรือไม่')==true){window.location='delete_orders_detail.php?d_id=<?=$result['d_id'];?>&o_id=<?=$_GET['o_id'];?>';}" role="button"><span class="glyphicon glyphicon-trash"></span></a>
                
        </td> 
     <? }?>   
      </tr>
<? }?>
    </tbody>
</table>
      
      <a class="btn btn-warning hvr-bounce-in" href="main.php?mn=view_orders&u_id=<?=$row_show['u_id'] ?>" role="button"><span class="glyphicon glyphicon-arrow-left"></span>กลับ</a>
      
     <? if($_GET["st_id"]=="2"){}else{ ?>
    <div align="right">
    		<input type="hidden" name="o_id" value="<?=$_GET["o_id"]?>">
			<input type="submit" class="btn btn-success btn-lg hvr-bounce-in" name="button" id="button" value="แก้ไข">
     </div><? }?>
     </form>
</div>

</body>
</html>