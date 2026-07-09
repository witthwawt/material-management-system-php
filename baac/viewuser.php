<? session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
        <?
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<div class="container">
    <div class="col-md-6 col-md-offset-3 ">
        <center><h2 class="hvr-bounce-in">ค้นหาข้อมูลพนักงาน</h2></center>
            <form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=viewuser">
                  <center>
                      <div class="input-group has-success">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"</span>
                          </div>
                            <input name="txtKeyword" class="form-control" type="text" id="txtKeyword" value="" placeholder="ชื่อ">
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
$total_data = mysql_num_rows(mysql_query("select * from user"));
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;

   $sql = "SELECT * FROM user LEFT JOIN division on (user.d_id = division.d_id) WHERE (user.name LIKE '%".$strKeyword."%') Limit $start,10";
   $que = mysql_query($sql) or die (mysql_error()); 
?>

<br>
        <table class="table table-striped table-bordered">
             <thead>
                   <tr>
                   	   
                       <th ><center>รูป</center></th>
                       <th ><center>คำนำหน้า</center></th>
                       <th width="100"><center>ชื่อ</center></th>
                       <th width="100"><center>นามสกุล</center></th>
                       <th ><center>เพศ</center></th>
                       <th ><center>ที่อยู่</center></th>
                       <th width="120"><center>แผนก</center></th>
                       <th width="100"><center>สถานะ</center></th>
                       <th width="100"><center>สถานะงาน</center></th>
                       <th ><center>เบอร์โทร</center></th>
                       <th ><center>แก้ไข</center></th>   
                    </tr>
              </thead>
              <tbody>
<?
while($result=mysql_fetch_array($que)){

?>
          			<tr>
                    	
                        <td align="center">
<div class="hvr-bounce-in"><a href="myfile/<?=$result['FilesName']; ?>" rel="prettyPhoto" ><img src="myfile/<?=$result['FilesName']; ?>" width="100px" height="100px" border="0" class="img-rounded"/></a></div></td>
                        <td align="center"><?=$result['title_name']; ?></td>
                        <td align="center"><?=$result['name']; ?></td>
                        <td align="center"><?=$result['lastname']; ?></td>
                        <td align="center"><?=$result['sex']; ?></td>
                        <td align="center"><?=$result['address']; ?></td>
                        <td align="center"><?=$result['danme']; ?></td>
                        <td align="center"><? if($result['status']=="0"){
													echo "ผู้ดูแลระบบ";
                                                }elseif($result['status']=="1"){
													echo "ผู้ใชงาน";
                                                }else{
													echo "เจ้าหน้าที่ตรวจสอบ";} ?></td>
                        <td align="center"><? if($result['status_work']=='y'){
														echo "ทำงาน";
													}elseif($result['status_work']=='n'){
														echo "ลาออก";
													} ?></td>
                        <td align="center"><?=$result['phone']; ?></td>
                        <td align="center"><a class="btn btn-primary hvr-bounce-in" href="main.php?mn=edituser&u_id=<?=$result['u_id']; ?>" role="button"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    </tr>
<?
}
?>
     			</tbody>
           </table>
	<p/>
    <center>   
         <nav>
          <ul class="pagination hvr-bounce-in">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=viewuser&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=viewuser&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=viewuser&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
</div>
<br>     
</body>
</html>