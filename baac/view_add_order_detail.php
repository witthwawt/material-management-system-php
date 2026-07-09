<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script type="text/javascript">
	function fncSubmit()
	{
    	if(document.getElementById('sl2').value  == "0"  ){
			alert('กรุณาเลือก!!! ');
			document.frm1.sl2.focus();
			return false;
    	}
	}
</script>
</head>
<body>
<p>
<?
$bid = $_GET["b_id"];
  
  $sql = "SELECT *  FROM buy_orders AS d1 INNER JOIN buy_orders_detail AS d2 ON  (d1.b_id = d2.b_id) INNER JOIN user AS d3 ON (d1.u_id = d3.u_id) INNER JOIN stock AS d4 ON (d2.p_id = d4.p_id) and (d1.b_id = '$bid')";
  $re = mysql_query($sql);//จอย ตาราง 4 ตาราง
  //$Result = mysql_fetch_array($re)
  
  $sql2 = "select * from supplier";
  $result = mysql_query($sql2) or die (mysql_error());
?>
<center><h3>ข้อมูลสั่งซื้อ&nbsp;เลขที่ใบสั่งซื้อ <?=$bid?></h3>
</center>
<div class="container">
<form name="frm1" method="post" action="save_add_view_orders_detail.php" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">

<table class="table" border="1" cellspacing="0" cellpadding="0" width="100%">
    <tr>
              <th width="73" nowrap><p align="center">รหัสสินค้า <br>
              </p></th>
              <th width="321" nowrap><p align="center">รายการ <br>
              </p></th>
              <th width="66" nowrap><p align="center">จำนวน<br>
              </p></th>
              <th width="104" nowrap><p align="center">ราคาต่อหน่วย<br>
              </p></th>
              <th width="94" nowrap><p align="center">จำนวนเงิน<br>
              </p></th>
            </tr>
<? while($Result = mysql_fetch_array($re)){?>
            <tr>
              <td width="73" align="center" nowrap><?=$Result["p_id"];?></td>
              <td width="321" align="center" nowrap><?=$Result["pname"];?></td>
              <td width="66" align="center" nowrap><?=$Result["unit"];?></td>
              <td width="104" align="center" nowrap><?=number_format($Result["price"],2);?></td>
             <? $Total1 = $Result["unit"] * $Result["price"];//จำนวนคูณราคา
					$SumTotal1 = $SumTotal1 + $Total1;//เอาจำนวนที่ได้มาบวกกัน
			 ?>
              <td width="94" align="center" nowrap><?=number_format($Total1,2);?></td>
            </tr>
            <? }?>
            <tr>
             
<?
$tax = $SumTotal1*0.07;
$payment = $SumTotal1 + $tax;
?>
              <td width="461" colspan="3" rowspan="3" valign="bottom" nowrap><p align="center">&nbsp;</p></td>
              <td width="104" align="right" >รวมเงิน&nbsp;</td>
              <td width="94" align="center" nowrap><?=number_format($SumTotal1,2);?></td>
            </tr>
            <tr>
              <td width="104" align="right" >&nbsp;VAT 7%</td>
              <td width="94" align="center" nowrap><?=$tax;?></td>
            </tr>
            <tr>
              <td width="104" align="right" >จำนวนเงินทั้งสิ้น&nbsp;</td>
              <td width="94" align="center" nowrap><input type="hidden" name="txt_p" id="txt_p" value="<?=$payment;?>"><?=number_format($payment,2);?></td>
            </tr>
          </table>
          <br>
</div> 

<center class="form-inline"><label for="exampleInputName2">บริษัท หรือตัวแทนจำหน่าย : </label>
    <select name="sl2" id="sl2" class="form-control" style="width: 300px;ext-align: center;">
        <option value="0">กรุณาเลือก</option>
        <? while($show = mysql_fetch_array($result)){?>
        <option value="<? echo $show["s_id"];?>"><? echo $show["s_name"];?></option>
	<?
    }
    ?>
    </select>
    <input type="hidden" name="txt_p_id" id="txt_p_id" value="<?=$bid;?>">
    <input type="submit" name="button" class="btn btn-success" id="button" value="Print">
</center>
</form>
<br>
<br>
<div>

</body>
</html>