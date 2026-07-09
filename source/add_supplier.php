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
</head>

<body>
<?
	ini_set('display_errors', 1);
	error_reporting(~0);
	$strKeyword = null;
	if(isset($_POST["txtKeyword"])){
		$strKeyword = $_POST["txtKeyword"];
}

$sql = "select * from supplier where s_id LIKE '%".$strKeyword."%' or s_name LIKE '%".$strKeyword."%'" ;
$result = mysql_query($sql) or die (mysql_error());
?>
<div class="container">
<center><h2>ตัวแทนจำหน่าย</h2></center>
<form name="frmSearchuser" class="form-inline" method="post" action="main.php?mn=add_supplier">
                  <center>
                      <div class="input-group has-success">
                          <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"</span>
                          </div>
                            <input name="txtKeyword" class="form-control" type="text" id="txtKeyword" value="" placeholder="รหัส ชื่อตัวแทนจำหน่าย" >
                                <span class="input-group-btn">
                                    <input type="submit" class="btn btn-info hvr-bounce-in" value="Search">
                                </span>
                      </div>
                  </center>
            </form>
<a class="btn btn-link hvr-bounce-in" href="#" onClick="js_popup('popup_add_supplier.php?',600,450); return false;" role="button">เพิ่ม</a>
<table class="table table-striped table-bordered">
  <thead>
  <tr>
    <th><center>โลโก้</center></th>
    <th><center>รหัส</center></th>
    <th><center>ชื่อ</center></th>
    <th><center>ที่อยู่</center></th>
    <th><center>เบอร์</center></th>
    <th><center>เลขประจำตัวผู้เสียภาษี</center></th>
    <th><center>แก้ไข</center></th>
  </tr>
  </thead>
  <? while($show = mysql_fetch_array($result)){?>
  <tr>
    <td><div class="hvr-bounce-in"><a href="myfile/<?=$show['m_photo']; ?>" rel="prettyPhoto" ><img src="myfile/<?=$show['m_photo']; ?>" width="100px" height="100px" border="0" class="img-rounded"/></a></div></td>
    <td><?=$show["s_id"];?></td>
    <td><?=$show["s_name"];?></td>
    <td><?=$show["s_address"];?></td>
    <td><?=$show["s_tel"];?></td>
     <td><?=$show["tax"];?></td>
    <td><a class="btn btn-primary hvr-bounce-in" href="#" onClick="js_popup('popup_edit_supplier.php?s_id=<?=$show["s_id"];?>',700,600); return false;" role="button"><span class="glyphicon glyphicon-pencil"></span></a>  </td>
  </tr>
  <?
	}
	?>
</table>
</div>
</body>
</html>