<?
ob_start();
session_start();
if(!isset($_SESSION["intLine"])){
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["p_id"];
	 $_SESSION["strQty"][0] = 1;
	 //header("location:main.php?mn=ream");
}else{
	$key = array_search($_GET["p_id"], $_SESSION["strProductID"]);
	if((string)$key != ""){
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}else{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["p_id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	 //header("location:main.php?mn=ream");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script language="javascript">
		function chkmax(){
			var cc = document.frm1.con.value
			for(i=0;i<cc;i++){
				var txt_stock = document.frm1.elements["txt_stock[]"][i].value
				var stock = document.frm1.elements["stock[]"][i].value
				var pname = document.frm1.elements["pname[]"][i].value
					if(txt_stock > stock){
						window.alert("พัสดุ "+pname+" !! มีจำนวนไม่พอ");
							//document.frm1.txt_stock[0].focus();
						return false;
					}
				}
			}
		
	</script>
</head>

<body >
 <?
	ini_set('display_errors', 1);
	error_reporting(~0);
	$strKeyword = null;
	if(isset($_POST["txtKeyword"])){
		$strKeyword = $_POST["txtKeyword"];
	}
?>

<div class="container">

        <div class="col-md-6 hvr-glow  media services-wrap wow fadeInDown animated">
            <center><h2> <div class="hvr-bounce-in ">ค้นหาพัสดุ</div></h2>
                <form name="frmSearchp" class="form-inline" method="post" action="main.php?mn=ream">
                      <div class="input-group newsletter">
                            <div class="input-group has-success">
                                <select class="form-control" name="cid" id="cid">
                                    <? $sqlc = "select * from stock_category ORDER BY c_id ASC";
                                        $resultc = mysql_query($sqlc); ?>
                                            <option value="0">ประเภทพัสดุ</option>
                                            <? while($showc=mysql_fetch_array($resultc)){?>
                                            <option value="<? echo $showc["c_id"];?>"><? echo $showc["category"];?></option>
                                        <?
                                        }
                                        ?>
                                  </select>
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                                    <input name="txtKeyword" class="form-control" type="text" id="txtKeywordp" value="" placeholder="ชื่อพัสดุ">
                            		<span class="input-group-btn">
                      				<input type="submit" class="btn btn-info hvr-bounce-in" name="btx" value="Search"></th>
                      			</span>
                            </div>
                      			
                      </div>
                </form>
            </center>
        <p/>
<?

   if(isset($_POST['btx'])){
	   if($_POST['btx']=="Search"){
		   if($_POST['txtKeyword']!=="" && $_POST['cid']!=="0"){
		   
   			$sql = "SELECT * FROM stock WHERE pname LIKE '%".$strKeyword."%' and c_id='".$_POST['cid']."' and stock > 0 ";
		   }elseif($_POST['txtKeyword']!=="" && $_POST['cid']=="0"){
			$sql = "SELECT * FROM stock WHERE pname LIKE '%".$strKeyword."%' and stock > 0 ";   
		   }elseif($_POST['txtKeyword']=="" && $_POST['cid']!=="0"){
			$sql = "SELECT * FROM stock WHERE c_id='".$_POST['cid']."' and stock > 0 ";   
		   }elseif($_POST['txtKeyword']=="" && $_POST['cid']=="0"){
   			$sql = "SELECT * FROM stock where stock > 0 ";
		   }
   		}
   }else{
   $sql = "SELECT * FROM stock where stock > 0 ";
   }
   //echo var_dump($sql); เช็คค่าแสดงค่า$sql
   $que = mysql_query($sql) or die (mysql_error());
?>
<div class="table" style="width: 550px; height: 580px; overflow-y: scroll;>
    <form action="" method="post" name="fromream">
        <table class="table table-striped table-bordered">
             <thead>
                  <tr>
                      <th ><center>รูป</center></th>
                      <th ><center>ชื่อ</center></th>
                      <th ><center>จำนวน</center></th>
                      <th ><center>เบิก</center></th>        
                  </tr>
            </thead>
           <tbody>
<?
while($result=mysql_fetch_array($que)){
?>
				<tr <? if($result["stock"] <= 10){?>class="danger"<? }?>>
                	<td align="center">
<div class="hvr-bounce-in"><a href="myfile/<? echo $result['Picture']; ?>" rel="prettyPhoto" ><img src="myfile/<? echo $result['Picture']; ?>" width="100px" height="100px" border="0"/></a></div>
						</td>
               		<td align="center"><?php echo $result['pname']; ?></td>
               		<td align="center"><?php echo $result['stock']; ?></td>
               		<td align="center">
<a class="btn btn-primary hvr-bounce-in" href="main.php?mn=ream&p_id=<?=$result["p_id"];?>" role="button"><span class="glyphicon glyphicon-plus"></span>เบิก >></a>
						</td>
               </tr>
<?
}
?>
            	</tbody>
            </table>
        </form>  
        </div>
	</div>
    
    
    
    
    
<div class="col-md-6 hvr-glow  media services-wrap wow fadeInDown animated">
	<center><h2> <div class="hvr-bounce-in">รายการที่ขอเบิก</div></h2></center>
        <form action="save_orders.php" method="post" name="fromreamsave">
            <table width="356" class="table table-striped table-bordered">
              <thead>
                <tr>
                    <th width="53" ><center>ID</center></th>
                    <th width="96" ><center>ชื่อ</center></th>
                    <th width="127" ><center>จำนวน</center></th>
                    <th width="60"><center>ลบ</center></th>
              </tr>
              </thead>
              <tbody>
<?
error_reporting(E_ALL ^ E_NOTICE);
$Total = 0;
$SumTotal = 0;
for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
     if($_SESSION["strProductID"][$i] != ""){
           $strSQL = "SELECT * FROM stock WHERE p_id = '".$_SESSION["strProductID"][$i]."' ";
           $objQuery = mysql_query($strSQL)  or die(mysql_error());
           $objResult = mysql_fetch_array($objQuery);
           $Total = $_SESSION["strQty"][$i] * $objResult["price"];
           //$SumTotal = $SumTotal + $Total;
?>
            <tr>
                <td align="center"><?=$_SESSION["strProductID"][$i];?></td>
                <td align="center"><?=$objResult["pname"];?></td>
                <td align="center">
                <input type="text" name="txt_o[<?=$i;?>]" id="txt_o[<?=$i;?>]" value="<? echo $_SESSION["strQty"][$i]; ?>" class="form-control" style="width: 60px;ext-align: center;" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}">
                	</td>
                <td align="center">
                <a class="btn btn-danger hvr-bounce-in" href="delete.php?Line=<?=$i;?>" role="button"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>	  
<?
		}
   }
?>
            </tbody>
          </table>
        <div align="right">
        <? if($Total != ""){?>
        	<input type="submit" class="btn btn-success btn-lg hvr-bounce-in" name="button" id="button" value="ขอเบิกพัสดุ">
            <?
		}
			?>
        </div>
      </form>
				<br>

		</div>
	</div>
<br>
</body>
</html>