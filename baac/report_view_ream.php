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
   $sql = "SELECT * FROM orders inner join user on (orders.u_id = user.u_id) inner join division on (user.d_id = division.d_id) WHERE st_id = 2 order by st_id ASC ";
   $que = mysql_query($sql) or die (mysql_error());
   
?>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<center><h3>รายงานการขอเบิกพัสดุ</h3></center>
    </div>

<div class="container">

<form action="" method="post" name="fromproduct">
<table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<th width="1"><center>ลำดับ</center></th>
                    	<th width="1"><center>เลขที่ใบเบิก</center></th>
                        <th width="53"><center>ชื่อผู้เบิก</center></th>
                        <th width="53"><center>แผนก</center></th>
                        <th width="53"><center>วันที่ขอเบิก</center></th>
                        <th width="53"><center>วันที่อนุมัติ</center></th>
                      	<th width="53"><center>ผู้อนุมัติ</center></th> 
                        <th width="53"><center>สถนะ</center></th>
                            
                  </tr>
                </thead>
                <tbody>
<?
while($result=mysql_fetch_array($que)){
$i9++;	
?>
  <tr>						
  							<td align="center"><?=$i9;?></td>	
  							<td align="center"><?=$result['o_id']; ?></td>
                            <td align="center"><?=$result['title_name']; echo $result['name'];?>&nbsp;<? echo $result['lastname']; ?></td>
                            <td align="center"><?=$result['danme']; ?></td>
                            <td align="center"><?=$result['o_date']; ?></td>
                            <td align="center"><?=$result['a_date'];?></td>
         					 <td align="center"><?=$result['name_a']; ?></td>
                             <td align="center"><span class="fon">อนุมัติแล้ว</span></td>
                        </tr>
<?
}
?>
                </tbody>
            </table>

			</form>
            </div>
            </div>
             <br>
  <center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>
  <p/>
</body>
</html>