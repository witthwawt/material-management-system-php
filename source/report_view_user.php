<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    

<?
   $sql = "SELECT * FROM user inner join division on (user.d_id = division.d_id) where (user.status_work = 'y')";
   $que = mysql_query($sql) or die (mysql_error());
?>
<div class="container">
<center><h3>รายงานข้อมูลพนักงาน</h3></center>

<form action="" method="post" class="" name="fromshowuser">
<table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                    	<th ><center>ลำดับ</center></th>
                        <th ><center>คำนำหน้า</center></th>
                        <th width="100"><center>ชื่อ</center></th>
                        <th width="100"><center>นามสกุล</center></th>
                        <th ><center>เพศ</center></th>
                        <th ><center>ที่อยู่</center></th>
                        <th width="120"><center>แผนก</center></th>
                        <th width="130"><center>สถานะ</center></th>
                        <th ><center>เบอร์โทร</center></th>
                        
                  </tr>
                </thead>
                <tbody>
<?
while($result=mysql_fetch_array($que)){
	$i8++;
?>
  <tr>
  							<td align="center"><?=$i8;?></td>
                            
                            <td align="center"><? echo $result['title_name']; ?></td>
                            <td align="center"><? echo $result['name']; ?></td>
                            <td align="center"><? echo $result['lastname']; ?></td>
                            <td align="center"><? echo $result['sex']; ?></td>
                            <td align="center"><? echo $result['address']; ?></td>
                            <td align="center"><? echo $result['danme']; ?></td>
                            <td align="center"><? if ($result['status']=="0"){
														echo "ผู้ดูแลระบบ";
													}elseif($result['status']=="1"){
														echo "ผู้ใช้งาน";
														}else{
														echo "เจ้าหน้าที่ตรวจสอบ";
															} ?></td>
                            <td align="center"><? echo $result['phone']; ?></td>
                          
                        </tr>
                        <?
                    }
                    ?>
                </tbody>
            </table>
  </form>
</div>
    <br>
  <center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>
     
</body>
</html>