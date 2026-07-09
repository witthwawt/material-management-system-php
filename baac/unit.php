<? session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script language="javascript">
function js_popup(theURL,width,height) { //v2.0
	leftpos = (screen.availWidth - width) / 2;
    	toppos = (screen.availHeight - height) / 2;
  	window.open(theURL, "viewdetails","width=" + width + ",height=" + height + ",left=" + leftpos + ",top=" + toppos);
}
</script>
<script type="text/javascript">
	function fncSubmit()
	{	
		 if(document.getElementById('txt1').value == ""){
			alert('กรุณากรอก!!! หน่วยนับ');
			document.frm1.txt1.focus();
			return false;
		}
	}
</script>
</head>

<body>
<center>
<?
$sql = "select * from stock_unit";
$result = mysql_query($sql) or die (mysql_error());
?>
<div class="container">
<center><h2>หน่วยนับ</h2></center>
<form name="frm1" method="post" action="" onSubmit="JavaScript:return fncSubmit();">
  <div class="form-group form-inline">
  <h4>เพิ่มหน่วยนับ :
  <input type="text" class="form-control" name="txt1" id="txt1" style="width: 200px;ext-align: center;" placeholder="หน่วยนับ">
  <input type="submit" class="btn btn-success hvr-bounce-in" name="button" id="button" value="บันทึก"></h4>
  <input type="hidden" name="btn1" id="btn1" value="Submit">
  </div>
</form>

            <br>
<table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    	<th width="1"><center>รหัส</center></th>
                        <th width="53"><center>ชื่อหน่วยนับ</center></th>
                        <th width="53"><center>แก้ไข</center></th> 
                  </tr>
                </thead>
                <tbody>
<?
while($row = mysql_fetch_array($result)){?>
  <tr>						
  					<td align="center"><?=$row['su_id']; ?></td>
                    <td align="center"><?=$row['su_name']; ?></td>
                    <td align="center"><a class="btn btn-primary hvr-bounce-in" href="#" onClick="js_popup('popup_edit_unit.php?su_id=<?=$row['su_id']; ?>',450,300); return false;" role="button"><span class="glyphicon glyphicon-pencil"></span></a></td>
                   </tr>
                    <?
                    }
                    ?>
              </tbody>
           </table>
</div>
</center>
<?
if( isset($_POST["btn1"])){
	if($_POST['btn1'] == "Submit"){
		$txt1 = $_POST["txt1"];
		$sql = "insert into stock_unit (su_name) VALUES('$txt1')";
		$result = mysql_query($sql) or die (mysql_error());
			if($result){
					echo "<script type='text/javascript'>alert('บันทึกแล้ว');</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=unit">
				<?
				}
		}
}
?>
</body>
</html>