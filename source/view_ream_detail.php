<? session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
 <style type="text/css">
.red {
	color: #F00;
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
<p>

<?
$oid = $_GET["o_id"];
  $sqlo = "select * from orders inner join user on (orders.u_id = user.u_id) inner join division on (user.d_id = division.d_id) where o_id = '$oid'";
  $reo = mysql_query($sqlo) or die (mysql_error());
  
  $sql = "SELECT *  FROM orders_detail INNER JOIN stock ON  (orders_detail.p_id = stock.p_id) and (orders_detail.o_id = '$oid')";
  $objQuery2 = mysql_query($sql)  or die(mysql_error());
  $num = mysql_num_rows($objQuery2);
  //if($num<=0){
	  //ถ้าน้อยกว่าหรือเท่ากับ 0 ให้มันลบใบเบิกออก
	//echo "ไม่มีข้อมูล";
	//DELETE FROM table_name WHERE some_column = some_value
	//$sql2 = "delete from orders where o_id = '$oid'";
	//mysql_query($sql2);
	//?>
	
	<?
	//}
	?>

<div class="container">
	<p><center><h3>ข้อมูลการเบิกพัสดุ</h3></center>
<? while($objR2 = mysql_fetch_array($reo)){?>

	<div class="row">
		<div class="col-md-4 col-md-offset-3">
          <table class="table">
              <thead>
                 <tr>
                   <th><h4>ผู้ขอเบิก</h4></th>
                   <th align="left"><h5><? echo $objR2["title_name"]; ?>&nbsp;<? echo $objR2["name"]; ?>&nbsp;<? echo $objR2["lastname"]; ?></h5></th>
              </tr>
          </thead>
            <tbody>
              <tr>
         		<th><h4>แผนก</h4></th>
         		<th align="left"><h5><? echo $objR2["danme"];?></h5></th>
   			  </tr>
              <tr>
         		<th><h4>ใบเบิกเลขที่</h4></th>
         		<th align="left"><h5><? echo $oid;?></h5></th>
   			  </tr>
            </tbody>
		</table>
	  </div> 
</div>
<? 
}
?>

<a class="btn btn-link hvr-bounce-in" href="#" onClick="js_popup('add_modal_ream_detail.php?bin=<?=$oid;?>',580,600); return false;" role="button">เพิ่มรายการ</a>

<form name="frm1" method="post" action="main.php?mn=save_ream_detail" onSubmit="return chkmax();">
    <table class="table table-striped table-bordered">
       <thead>
          <tr>
          	<th width="93"><center>เลขที่พัสดุ</center></th>
            <th width="336"><center>รายการ</center></th>
            <th width="93"><center>จำนวนเบิก</center></th>
            <th width="101"><center>จำนวนในสต๊อก</center></th>
            <th width="93"><center>จำนวนอนุมัติ</center></th>
            <th width="105"><center>ลบ</center></th>
           </tr>
        </thead>
       <tbody>      
<? 
	 while($objResult2 = mysql_fetch_array($objQuery2)){
		 $i++;
			$strSQL3 = "SELECT * FROM stock WHERE p_id = '".$objResult2["p_id"]."' ";
			$objQuery3 = mysql_query($strSQL3)  or die(mysql_error());
			$objResult3 = mysql_fetch_array($objQuery3);
			//$Total = $objResult2["Qty"] * $objResult3["Price"];
			//$SumTotal = $SumTotal + $Total;
		  ?>
          
      <tr>
      	<td align="center"><? echo $objResult2["p_id"]; ?><input type="hidden" name="txt_id[]" value="<? echo $objResult2["p_id"]; ?>"></td>
		<td width="336"><? echo $objResult2["pname"]; ?><input type="hidden" id="pname[]" name="pname[]" value="<? echo $objResult2["pname"]; ?>"></td>
        
        <td width="93" align="center"><? echo $objResult2["s_qty"];?></td>
        
        <td align="center">
		<? if($objResult2["s_qty"]>$objResult2["stock"]){?>
              		<span class="red">สต๊อก <?=$objResult2["stock"];?> ไม่พอจ่าย</span>
					<? $max = $objResult2["stock"];?>
              <? }else{?>
		<? echo $objResult2["stock"]; ?><input type="hidden" id="stock[]" name="stock[]" value="<? echo $objResult2["stock"]; ?>"></td>
        	<?
			  }
			  ?>
        <td align="center"><input type="text" id="txt_stock[]" name="txt_stock[]" value="<? echo $objResult2["s_qty"]; ?>" class="form-control" style="width: 60px;text-align: center;" readonly></td>
          
        <td align="center"><a class="btn btn-danger" href="JavaScript:if(confirm('ลบ <? echo $objResult2["pname"];?> ')==true){window.location='delete_view_ream_detail.php?d_id=<? echo $objResult2["d_id"]; ?>&o_id=<? echo $oid; ?>';}" role="button"><span class="glyphicon glyphicon-remove"></span>ลบ</a></td>
        
	  </tr>
<?
 }
 
?>
 	</tbody>
</table>



<br>
    <table width="415" border="0" class="table ">
       <thead>
       
        <td align="right">
         <?
			if($max!=""){?>
			<span class="ghjhgj">
			  </span><span class="red">
			  <h2>พัสดุบางรายการมีไม่เพียงพอ</h2></span>
					<? }else{ ?>
        <input type="submit" class="btn btn-success" name="btna" id="btna" value="อนุมัติ"> 
        <input type="hidden" name="o_id" id="o_id" value="<?=$oid;?>"><input type="hidden" name="con" id="con" value="<?=$i;?>">
        <input type="hidden" class="btn btn-success" name="btn2" id="btn2" value="tree">
        <?
			}
		?>
        </td>
        
        <td></td>
        
       </tr>
      </tbody>
    </table>
    </form>














<div>	
</body>
</html>