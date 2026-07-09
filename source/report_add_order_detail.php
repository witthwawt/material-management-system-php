<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body onLoad="window.print()">
<p>
  <?
$bid = $_GET["b_id"];

  $sql = "SELECT *  FROM buy_orders AS d1 INNER JOIN buy_orders_detail AS d2 ON  (d1.b_id = d2.b_id) INNER JOIN user AS d3 ON (d1.u_id = d3.u_id) INNER JOIN stock AS d4 ON (d2.p_id = d4.p_id) and (d1.b_id = '$bid')";
  $re = mysql_query($sql);//จอย ตาราง 4 ตาราง

$sql2 = "select * from buy_orders inner join supplier on (buy_orders.s_id = supplier.s_id) where b_id = '$bid'";
$Result2 = mysql_query($sql2) or die (mysql_error());
$show = mysql_fetch_array($Result2);
?>

<div class="container"></p><p>
	<center>
		<p align="center"><strong><h3>ใบสั่งซื้อ</h3></strong><strong> </strong><p/>
			   <h4>PURCHASE ORDER</h4></p></center>
	<div class="row"><br>
      <table width="100%" border="0">
            <tr>
              <td width="348" rowspan="4" align="right"><img src="myfile/<?=$show["m_photo"];?>" width="100" height="61" longdesc="myfile/logo.jpg">&nbsp;&nbsp;</td>
              <td width="952">ชื่อบริษัท <?=$show["s_name"];?> ที่อยู่ <?=$show["s_address"];?> โทร <?=$show["s_tel"];?></td>
            </tr>
            <tr>
              <td>เลขประจำตัวผู้เสียภาษี <?=$show["tax"];?></td>
            </tr>
            <tr>
              <td>เลขที่ใบสั่งซื้อ / PO NO. : <?=$show["b_id"];?></td>
            </tr>
            <tr>
              <td>วันที่ / DATE : <?=$show["date"];?></td>
            </tr>
          </table>
      <br>
          รายการสินค้าที่สั่งซื้อ<br>
          <table border="1" cellspacing="0" cellpadding="0" width="100%">
            <tr>
              <th width="73" nowrap><p align="center">รหัสสินค้า <br>
                ITEM CODE </p></th>
              <th width="321" nowrap><p align="center">รายการ <br>
                DESCRIPTION</p></th>
              <th width="66" nowrap><p align="center">จำนวน<br>
                QUANTITY</p></th>
              <th width="104" nowrap><p align="center">ราคาต่อหน่วย<br>
                UNIT PRICE</p></th>
              <th width="94" nowrap><p align="center">จำนวนเงิน<br>
                AMOUNT</p></th>
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
              <td width="461" colspan="3" rowspan="3" valign="bottom" nowrap><p align="center">&nbsp;</p>
              <p align="center"><em>&nbsp;</em>ตัวอักษร.......................................................................บาทถ้วน&nbsp;</p></td>
              <td width="104" align="right" >รวมเงิน&nbsp;</td>
              <td width="94" align="center" nowrap><?=number_format($SumTotal1,2);?></td>
            </tr>
            <tr>
              <td width="104" align="right" >&nbsp;VAT 7%</td>
              <td width="94" align="center" nowrap><?=$tax;?></td>
            </tr>
            <tr>
              <td width="104" align="right" >จำนวนเงินทั้งสิ้น&nbsp;</td>
              <td width="94" align="center" nowrap><?=number_format($payment,2);?></td>
            </tr>
          </table>
          <br><br>
      <table width="60%" border="0" align="center">
            <tr>
              <td width="53%" align="center">(…………………………………………..)</td>
            </tr>
            <tr>
              <td align="center">ลงชื่อ <?=$row_show["title_name"]; echo $row_show["name"];?>&nbsp;<?=$row_show["lastname"];?>(ผู้สั่งซื้อ)</td>
            </tr>
            <tr>
              <td align="center">(............./............../..............)</td>
            </tr>
      </table>
      <br>
          <p align="center">ลงชื่อ.......................................(รับทราบโดยผู้ขาย  / ACKNOWLEDGED BY SUPPLIER) </p>
<p>&nbsp;</p>
</div> 

<br>
<br>

<div>	
</body>
</html>