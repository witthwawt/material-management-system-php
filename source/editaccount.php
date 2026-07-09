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

<div class="container">
  <div class="row">
  	<div class="col-md-8 col-md-offset-2 hvr-glow  media services-wrap wow fadeInDown animated">
    <form class="form-horizontal" action="save_editaccount.php" method="POST" name="frmedit">
      <center><div class="hvr-bounce-in"><h3>ข้อมูลส่วนตัว</h3></div></center><p/>
<div class="form-group">
    <label for="input" class="col-sm-2 control-label">รูป :</label>
    <div class="col-sm-10">
<div class="hvr-bounce-in"><a href="myfile/<? echo $row_show['FilesName']; ?>" rel="prettyPhoto" ><img class="img-rounded" src="myfile/<? echo $row_show['FilesName']; ?>" width="100px" height="100px" border="0"/></a></div>
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">ID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txt1" name"txt1" value="<? echo $_SESSION["u_id"]; ?>"readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">คำนำหน้า:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="txt1" name"txt1" value="<? echo $row_show["title_name"]; ?>"readonly>
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">ชื่อ :</label>
    <div class="col-sm-10">
      <input type="text" name="textfield" id="textfield" class="form-control" value="<? echo $row_show["name"]; ?>"readonly />
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">นามสกุล :</label>
    <div class="col-sm-10">
      <input type="text" name="textfield" id="textfield" class="form-control" value="<? echo $row_show["lastname"]; ?>"readonly />
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เพศ :</label>
    <div class="col-sm-10">
      <input type="text" name="textfield" id="textfield" class="form-control" value="<? echo $row_show["sex"]; ?>"readonly />
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เผนก :</label>
    <div class="col-sm-10">
      <input type="text" name="textfield" id="textfield" class="form-control" value="<? echo $row_show["danme"]; ?>"readonly />
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">ที่อยู่ :</label>
    <div class="col-sm-10">
     <textarea name="" rows="3" value="" class="form-control" id="" readonly><? echo $row_show["address"]; ?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label for="input" class="col-sm-2 control-label">เบอร์โทร :</label>
    <div class="col-sm-10">
      <input type="text" name="textfield" id="textfield" class="form-control" value="<? echo $row_show["phone"]; ?>"readonly />
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control hvr-bounce-in" name="textfield2" id="textfield2" value="<? echo $row_show["username"]; ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label for="input" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control hvr-bounce-in" name="textfield3" id="textfield3" value="<? echo $row_show["password"]; ?>"/>
    </div>
  </div>
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submitck" class="btn btn-success hvr-bounce-in" id="submitck" value="แก้ไข" onClick="javascript:return confirm('ต้องการแก้ไขข้อมูล?')">
	  </div>
	</div>
	</form>
</div>
</div>
<br>
  
</body>
</html>


