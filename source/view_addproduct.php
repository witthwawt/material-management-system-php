<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script type="text/javascript">
	function fncSubmit()
	{	

	}
</script>
</head>
<body>
<?
   $sql = "SELECT * FROM stock where p_id = '".$_GET['p_id']."'";
   $que = mysql_query($sql) or die (mysql_error());
   $srow = mysql_fetch_array($que);
   
   $sqlc = "select * from stock_category ORDER BY c_id ASC";
   $resultc = mysql_query($sqlc);
   
   $sql2 = "select * from supplier ORDER BY s_id ASC";
   $result2 = mysql_query($sql2);
   
   $sql3 = "select * from stock_unit ORDER BY su_id ASC";
   $result3 = mysql_query($sql3);
?>
<div class="container">
	<center><h2>แก้ไขพัสดุ</h2></center>
		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" name="formproduct" method="post" action="save_view_addproduct.php" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                  <div class="form-group">
                  <input type="hidden" name="txt_pid" id="txt_pid" value="<? echo $_GET['p_id'];?>">
                  <label for="input" class="col-sm-4 control-label">รูปพัสดุ :</label>
                    <div class="col-sm-8">
                    <div class="hvr-bounce-in"><a href="myfile/<? echo $srow['Picture']; ?>" rel="prettyPhoto" ><img src="myfile/<? echo $srow['Picture']; ?>" width="100px" height="100px" border="0"/></a></div>
                      <input type="file" class="form-control" name="filUpload"></td>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">ชื่อพัสดุ :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_pname" value="<? echo $srow["pname"]; ?>"/>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">จำนวน :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_s" value="<? echo $srow["stock"]; ?>" />
                     </div>
                  </div>
                    <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">ราคา :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_price" value="<? echo $srow["price"]; ?>" />
                     </div>
                  </div>
                  
                  
                    <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">ประเภท :</label>
                    <div class="col-sm-8">
                     <? while($showc = mysql_fetch_array($resultc)){?>
           <input type="radio" name="rdo[]" value="<?=$showc["c_id"];?>" id="rdo[]" <? if($showc["c_id"]==$srow["c_id"]){echo "checked";} ?>> <?=$showc["category"];?><br>
                        <?
						}
						?>
                     </div>
                  </div>
                  
                  
                   <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">ตัวแทนจำหน่าย:</label>
                    <div class="col-sm-8">
                     <? while($show2 = mysql_fetch_array($result2)){?>
           <input type="radio" name="rdos[]" value="<?=$show2["s_id"];?>" id="rdos[]" <? if($show2["s_id"]==$srow["s_id"]){echo "checked";} ?>> <?=$show2["s_name"];?><br>
                        <?
						}
						?>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="input" class="col-sm-4 control-label">หน่วยนับ:</label>
                    <div class="col-sm-8">
                     <? while($show3 = mysql_fetch_array($result3)){?>
     <input type="radio" name="rdosu[]" value="<?=$show3["su_id"];?>" id="rdosu[]" <? if($show3["su_id"]==$srow["su_id"]){echo "checked";} ?>> <?=$show3["su_name"]; ?><br>
                        <?
						}
						?>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="input" class="col-sm-4 control-label"></label>
                    <div class="col-sm-8">
    
<a class="btn btn-warning" href="main.php?mn=addproduct" role="button"><span class="glyphicon glyphicon-arrow-left"></span>กลับ</a>

<input type="submit" name="btnSubmit" class="btn btn-success" id="btnSubmit" value="แก้ไข" onClick="javascript:return confirm('ต้องการแก้ไขข้อมูล <? echo $srow["pname"]; ?> ?')">


   					</div>
  				</div>
			</form>
		</div>
	</div>
</div>


</body>
</html>