<?
include('config.php');
session_start();
?>
<!DOCTYPE html>
<html >
  <head>
  	<link href="css/hover.css" rel="stylesheet" media="all">
    <meta charset="UTF-8">
    <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        
        <script type="text/javascript">
			function fncSubmit()
			{
				if(document.getElementById('txtname').value == ""){
					alert('กรุณากรอกข้อมูล Username');
					document.frmlog.txtname.focus();
					return false;
				}else if(document.getElementById('txtpass').value == ""){
					alert('กรุณากรอกข้อมูล Password');
					document.frmlog.txtpass.focus();
					return false;
					}
			}
		</script>
  </head>
  <body>
            
            <div class="login-page">
              <div class="form hvr-glow" >
                <div class="thumbnail"><img class="img-circle hvr-bounce-in" src="myfile/logo.jpg"/></div><br>
                	<div class="thumbnail hvr-bounce-in"><h3>ระบบเบิกจ่ายพัสดุ</h3></div><br>
                      <form name="frmlog" class="login-form" method="POST" onSubmit="JavaScript:return fncSubmit();">
                          <input type="text" class="form-control hvr-bounce-in" placeholder="Username" name="txtname" id="txtname"/>
                          <input type="password" class="form-control hvr-bounce-in" placeholder="password" name="txtpass" id="txtpass"/>
                          <button type="submit" class="hvr-bounce-in" name="submit" id="submit" value="เข้าสู่ระบบ">login</button>
                          <input type="hidden" id="login" name="login" value="TRUE">
                    </form>
              </div>
          </div>

          <?
if(isset($_POST['login'])){
  
  if($_POST['login']=="TRUE"){
		  //echo $_POST[txtname];"<br>";
		  //echo $_POST[txtpass];break;
		//$datalog = mysql_query("select * from user where ((username='$_POST[txtname]' and password='$_POST[txtpass]') and status_work = 'y')");
		$datalog = mysql_query("select * from user where ((username='$_POST[txtname]' and password='$_POST[txtpass]') and status_work='y')");
		$numrow = mysql_num_rows($datalog);
		$rslog = mysql_fetch_array($datalog);
		 //echo var_dump($rslog)."<br>";
		 //echo $numrow;
		 //break;
    if($numrow==1){
		  $_SESSION["u_id"]=$rslog["u_id"];
		  
		  //header("Location: main.php");
		  ?>
		  <META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php">
    <?
  	}elseif ($numrow==0){ 
  		echo "<script type='text/javascript'>alert('ไม่พบข้อมูล');</script>";
		}
    } 
}
    //echo $_SESSION['u_id'];
    //echo "id : ".iconv('TIS-620','UTF-8',$_SESSION['ID_teacher'])."<p>";
    //echo "คำนำหน้า : ".iconv('TIS-620','UTF-8',$_SESSION['Title_teacher'])."<p>";
    //echo "ชื่อ : ".iconv('TIS-620','UTF-8',$_SESSION['Name_teacher'])."<p>";
    //echo "รูป : ".iconv('TIS-620','UTF-8',$_SESSION['img'])."<p>";
    //echo "สถานะ : ".iconv('TIS-620','UTF-8',$_SESSION['working'])."<p>";
    ?>
    <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
  </body>
</html>
