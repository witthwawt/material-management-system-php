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
	if(isset($_POST["txtKeyword"])){
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<div class="container">
    <div class="col-md-6 col-md-offset-3 ">
   		 <center><h2>พัสดุใกล้หมด</h2></center>
			<center><h3>ค้นหาพัสดุใกล้หมด</h3></center>
            	<center>
                    <form name="frmSearchp" class="form-inline" method="post" action="main.php?mn=report_view_row_stock">
                              <div class="input-group newsletter">
                                    <div class="input-group has-success">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                            <input name="txtKeyword" class="form-control" type="text" id="txtKeywordp" value="" placeholder="ชื่อพัสดุ">
                                    </div>
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-info hvr-bounce-in" name="btx" value="Search"></th>
                                        </span>
                              </div>
                              <br><br>
                        </form>
                </center>
	</div>

<?

   $sql = "SELECT * FROM stock where pname LIKE '%".$strKeyword."%' and stock <= 10";
   $que = mysql_query($sql) or die (mysql_error());
?>


<div class="container">
	<form action="" method="post" name="fromproduct">
		<table class="table table-striped table-bordered">
             <thead>
                 <tr>
                    <th width="1"><center>เลขที่พัสดุ</center></th>
                    <th width="53"><center>ชื่อพัสดุ</center></th>
                    <th width="53"><center>จำนวนคงเหลือ</center></th>
                    <th width="53"><center>ประเภทพัสดุ</center></th>            
                 </tr>
            </thead>
            <tbody>
<?
while($result=mysql_fetch_array($que)){
	$sql2 = "select * from stock_category where c_id = '".$result['c_id']."'";
	$result2 = mysql_query($sql2) or die (mysql_error());
	$show2 = mysql_fetch_array($result2);
?>
  			<tr>
				<td align="center"><? echo $result['p_id']; ?></td>
                <td align="center"><? echo $result['pname']; ?></td>
                <td align="center"><? echo $result['stock'];?></td>
         		<td align="center"><? echo $show2['category']; ?></td>
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