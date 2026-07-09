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
<br>

			<center>
            <h2>
            <?
				//echo thai_date($eng_date); 
			?>
            </h2>
				<div class="media services-wrap wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
					<h1><div class="hvr-bounce-in">ยินดีต้อนรับ</div> <span class="label label-danger hvr-bounce-in"><? echo $row_show["name"]; ?></span></h1><br>
						<h2 >
						<?
						if($row_show["status"]=="0"){
							echo "ผู้ดูแลระบบ";
							}elseif($row_show["status"]=="1"){
								echo "พนักงาน";
								}elseif($row_show["status"]=="2"){
								echo "เจ้าหน้าที่ตรวจสอบ";
								}
						?>
                        </h2>
                        <h3><div class="hvr-bounce-in">ระบบเบิกจ่ายพัสดุ ธ.ก.ส. <br><br>สาขาพนมไพร </div></h3><br>
							<div class="hvr-bounce-in"><p><h4><a href="main.php?mn=ream">เบิกเลยจ้า</a></h4></p></div>
				</div>
			</center>


</body>
</html>