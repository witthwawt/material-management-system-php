<? 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
</p>
<?
$sql = "select * from orders inner join user on (orders.u_id = user.u_id) inner join division on (user.d_id = division.d_id) inner join orders_detail on (orders.o_id = orders_detail.o_id) inner join stock on (orders_detail .p_id = stock.p_id) and (orders .o_id = '".$_GET["o_id"]."')";
$result = mysql_query($sql) or die (mysql_error());
$show = mysql_fetch_array($result);

$sql2 = "select * from orders inner join orders_detail on (orders.o_id = orders_detail.o_id) inner join stock on (orders_detail .p_id = stock.p_id) and (orders .o_id = '".$_GET["o_id"]."')";
$result2 = mysql_query($sql2) or die (mysql_error());

?>
<table width="816" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="277"><img src="myfile/logod.png" style="float: left"></td>
    <td width="509"><h2>บันทึกขออนุมัติเบิกพัสดุ</h2></td>
    <td width="30">&nbsp;</td>
  </tr>
</table>

<table width="816" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td width="551" height="27">&nbsp;</td>
    <td width="318"> วันที่ <?=$show["a_date"];?><p>
    เลขที่ใบเบิก <?=$show["o_id"];?></td>
  </tr>
  <tr>
    <td height="40">เรียน  ผู้จัดการสาขาพนมไพร</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ส่วนงาน  <?=$show["danme"];?>  ขอเบิกพัสดุ/แบบพิมพ์  ตามรายละเอียดดังต่อไปนี้</td>
    <td>&nbsp;</td>
  </tr>
</table><p/>
<table width="816" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="85" align="center">รายการ</td>
    <td width="158" align="center">รหัสพัสดุ</td>
    <td width="354" align="center">ชื่อพัสดุ</td>
    <td width="100" align="center">อนุมัติ</td>
    <td width="107" align="center">พัสดุคงเหลือ</td>
  </tr>
  <tr>
<? 
while($shows = mysql_fetch_array($result2)){
$i1++;
?>
    <td align="center"><?=$i1;?></td>
    <td align="center"><?=$shows['p_id'];?></td>
    <td align="center"><?=$shows["pname"]; ?></td>
    <td align="center"><?=$shows["o_reciveo"]; ?></td>
    <td align="center"><?=$shows["stock"];?></td>
  </tr>
<?
}
?>
</table>
<p/>

<table width="816" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="264" align="center">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
    <td width="230">&nbsp;</td>
    <td width="322">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">


    ……………………………ผู้เบิก</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">(<?=$show["title_name"];echo $show["name"];?>&nbsp;<? echo $show["lastname"];?>)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">ตำแหน่ง&nbsp;<?=$show["danme"];?></td>
  </tr>

</table><p/>
<table width="816" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center">ผู้อนุมัติ</td>
    <td align="center">ผู้จ่ายพัสดุ</td>
    <td align="center">ผู้รับพัสดุ</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">(……………………………………)</td>
    <td align="center">(…………………………………….)</td>
    <td align="center">(…………………………………..)</td>
  </tr>
  <tr>
    <td align="center"><?=$row_show["title_name"];?>&nbsp;<?=$row_show["name"];?>&nbsp;<?=$row_show["lastname"];?></td>
    <td align="center">………………………….</td>
    <td align="center">ตำแหน่ง………………...…………</td>
  </tr>
  <tr>
    <td align="center">………./…………/……….</td>
    <td align="center">………./…………/……….</td>
    <td align="center">………./…………/……….</td>
  </tr>
</table>
<br>
<center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>


</body>
</html>