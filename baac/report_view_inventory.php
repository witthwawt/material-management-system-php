<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<center><h3>รายงานพัสดุคงคลัง</h3></center>
    </div>

<?
   $sql = "SELECT * FROM stock";
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
  <tr <? if($result["stock"] <= 10){?>
               class="danger"
     <?
       }
     ?>>
  					
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
  <center><p><input type="button" class="btn btn-success" name="Button" value="Print" onclick="javascript:this.style.display='none';window.print();"></p></center>
</body>
</html>