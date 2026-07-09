<?
session_start();
include("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เพิ่มรายการ</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
 </head>

<body>
<?
$sql3 = "SELECT * FROM  stock ";
$que3 = mysql_query($sql3) or die (mysql_error());
?>
<p>
<center><h3>เพิ่มรายการ</h3></center><p>
<div class="container">
		<div class="col-xs-12 col-sm-6 col-md-11">
<form action="" method="post" name="fromproduct">
<table width="538" class="table-striped table-bordered">
   		<thead>
       		<tr>
          		<th width="1"><center>
          		  <p>เลขทพัสดุ</p>
         		</center></th>
          		<th width="53"><center>
          		  <p>ชื่อพัสดุ</p>
          		</center></th>
          		<th width="53"><center>
          		  <p>จำนวน</p>
          		</center></th>
          		<th width="53"><center>
          		  <p>เพิ่ม</p>
          		</center></th>      
       		</tr>
   		</thead>
   		<tbody>
<?
while($result3=mysql_fetch_array($que3)){
?>
  			<tr>						
  				<td align="center"><? echo $result3['p_id']; ?></td>
            	<td align="center"><? echo $result3['pname']; ?></td>
            	<td align="center"><? echo $result3['stock']; ?></td>
            	<td align="center"><a class="btn btn-primary hvr-bounce-in" href="save_add_model_check.php?bin=<?=$_GET["bin"];?>&p_id=<?=$result3['p_id']; ?>" role="button"><span class="glyphicon glyphicon-plus"></span></a></td>
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
</body>
</html>