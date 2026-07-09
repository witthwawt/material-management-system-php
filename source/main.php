<?
session_start();
date_default_timezone_set('Asia/Bangkok');
//echo $_SESSION["u_id"];break;

if(!isset($_SESSION["u_id"])){
  echo"<meta http-equiv=\"refresh\" content=\"1;url=logout.php\">";
  echo iconv('UTF-8','TIS-620',"<p style=\"color:red;cont-size:14px;\">กรุณา Login ให้ถูกต้องก่อน</p>");
  exit();
}
include('config.php');
if($_SESSION["u_id"] !==""){
$id = $_SESSION["u_id"];
$sql_show = "select * from user inner join division on (user.d_id = division.d_id) where u_id = '$id'";
$result_show = mysql_query($sql_show) or die(mysql_error());
$row_show = mysql_fetch_array($result_show);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Bootstrap 101 </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery.min.js" type="text/javascript" ></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/hover.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
 
 
  </head>
  <body>
    
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php"><img src="myfile/logo.png" alt="..."></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
         <li><a href="main.php">หน้าแรก</a></li>
         
                        <? $s = "select count(o_id) as o_id from orders where st_id = 1";
							$r = mysql_query($s) or die(mysql_error());
							
							$s1 = "select count(p_id) as p_id from stock where stock <= 10";
							$r1 = mysql_query($s1) or die(mysql_error());
							
							$s3 = "SELECT COUNT( bo_id ) AS bo_id FROM buy_orders_detail WHERE b_st =  'w';";
							$r3 = mysql_query($s3) or die(mysql_error());
							
						if($row_show["status"]=="0"){
						?>
                        <li><a href="main.php?mn=ream">เบิกพัสดุ</a></li>
	    				<li><a href="main.php?mn=view_ream">ระบบเบิกพัสดุ<span class="label label-danger label-as-badge"><? while($sh = mysql_fetch_array($r)){echo $sh["o_id"];}?>
                        </span></a></li>
                        
	    				<li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">ระบบพนักงาน<b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=member">เพิ่มพนักงาน</a></li>
	    						<li><a href="main.php?mn=viewuser">ข้อมูลพนักงาน</a></li>
                                <li><a href="main.php?mn=division">แผนก</a></li>
	    					</ul>
	    				</li>
                        <li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">ระบบสั่งซื้อพัสดุ<b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=add_order">สั่งซื้อพัสดุ</a></li>
	    						<li><a href="main.php?mn=view_add_order">รายการสั่งซื้อพัสดุ</a></li>
                                <li><a href="main.php?mn=add_supplier">ตัวแทนจำหน่าย</a></li>
	    					</ul>
	    				</li>
                        <li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">ระบบรับพัสดุ<b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=check_order">รับพัสดุ</a></li>
	    						<li><a href="main.php?mn=addproduct">แก้ไขพัสดุ</a></li>
                                <li><a href="main.php?mn=unit">หน่วยนับพัสดุ</a></li>
	    					</ul>
	    				</li>
                        <li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">ระบบคงคลัง <b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=report_view_row_stock">พัสดุใกล้หมด<span class="label label-danger label-as-badge"><? while($sh1 = mysql_fetch_array($r1)){echo $sh1["p_id"];}?></span></a></li>
						
	    						<li><a href="main.php?mn=receivable">พัสดุค้างรับ<span class="label label-danger label-as-badge"><? while($sh3 = mysql_fetch_array($r3)){echo $sh3["bo_id"];}?></span></a></li>
                                <li><a href="main.php?mn=report_view_inventory">พัสดุคงคลัง<span class="label label-danger label-as-badge"></span></a></li>
	    					</ul>
	    				</li>
                        <li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน <b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=report_view_user">รายงานข้อมูลพนักงาน</a></li>
	    						<li><a href="main.php?mn=report_view_ream">รายงานการขอเบิกพัสดุ</a></li>
	    						<li><a href="main.php?mn=report_buy_order">รายงานการสั่งซื้อพัสดุ</a></li>
	    						<li><a href="main.php?mn=report_view_addproduct">รายงานการรับพัสดุ</a></li>
								<li><a href="main.php?mn=report_view_inventory">รายงานพัสดุคงคลัง</a></li>
                                <li><a href="main.php?mn=report_view_stale">รายงานพัสดุค้างรับ</a></li>
	    					</ul>
	    				</li>
						<?
						}elseif($row_show["status"]=="1"){
						?>
	    				<li><a href="main.php?mn=ream">เบิกพัสดุ</a></li>
                        <? }elseif($row_show["status"]=="2"){?>
                         <li class="dropdown">
	    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน <b class="caret"></b></a>
	    					<ul class="dropdown-menu">
	    						<li><a href="main.php?mn=report_view_user">รายงานข้อมูลพนักงาน</a></li>
	    						<li><a href="main.php?mn=report_view_ream">รายงานการขอเบิกพัสดุ</a></li>
	    						<li><a href="main.php?mn=report_buy_order">รายงานการสั่งซื้อพัสดุ</a></li>
	    						<li><a href="main.php?mn=report_view_addproduct">รายงานการรับพัสดุ</a></li>
								<li><a href="main.php?mn=report_view_inventory">รายงานพัสดุคงคลัง</a></li>
                                <li><a href="main.php?mn=report_view_stale">รายงานพัสดุค้างรับ</a></li>
	    					</ul>
	    				</li>
                        
                        <?
						}
						?>
	    				<li class="dropdown">
	    					<div class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle hvr-bounce-in" src="myfile/<? echo $row_show['FilesName']; ?>" width="50px" height="50px" border="0"/><b class="caret"></b></div>
	    					<ul class="dropdown-menu">
	    						<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ &nbsp;<? echo $row_show['name']; ?></li>
	    						<li><a href="main.php?mn=editaccount">แก้ไขข้อมูล</a></li>
                                <? //if($row_show["status"]=="1"){?>
	    						<li><a href="main.php?mn=view_orders&u_id=<?=$row_show['u_id'] ?>">รายการที่ขอเบิก</a></li>
                                <?
								//}
								?>
	    						<li><a href="logout.php?r=site/logout" onClick="javascript:return confirm('ต้องการออกจากโปรแกรม?')" role="button" class="btn btn-default" >ออกจากระบบ</a></li></button>  </ul>

	    					</ul>
	    				</li>
       
       
       
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    
    
    
    


<?
include('cass.php');
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>
  </body>
</html>