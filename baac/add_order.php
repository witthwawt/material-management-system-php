<?
ob_start();
session_start();

/*if(!isset($_SESSION["intLine1"])){
	 $_SESSION["intLine1"] = 0;
	 $_SESSION["strProductID1"][0] = $_GET["p_id"];
	 $_SESSION["strQty1"][0] = 1;
	 //header("location:main.php?mn=ream");
}else{
	$key = array_search($_GET["p_id"], $_SESSION["strProductID1"]);
	if((string)$key != ""){
		 $_SESSION["strQty1"][$key] = $_SESSION["strQty1"][$key] + 1;
	}else{
		 $_SESSION["intLine1"] = $_SESSION["intLine1"] + 1;
		 $intNewLine = $_SESSION["intLine1"];
		 $_SESSION["strProductID1"][$intNewLine] = $_GET["p_id"];
		 $_SESSION["strQty1"][$intNewLine] = 1;
	}
	 //header("location:main.php?mn=ream");
}*/

if(!isset($_SESSION["intLine1"]))
{
	if(isset($_POST["txtProductID1"]))
	{
		 $_SESSION["intLine1"] = 0;
		 $_SESSION["strProductID1"][0] = $_POST["txtProductID1"];
		 $_SESSION["strQty1"][0] = $_POST["txtQty1"];

		// header("location:index.php?mn=session_show");
	}
}
else
{
	
	$key = array_search($_POST["txtProductID1"], $_SESSION["strProductID1"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty1"][$key] = $_SESSION["strQty1"][$key] + $_POST["txtQty1"];
	}
	else
	{
		
		 $_SESSION["intLine1"] = $_SESSION["intLine1"] + 1;
		 $intNewLine = $_SESSION["intLine1"];
		 $_SESSION["strProductID1"][$intNewLine] = $_POST["txtProductID1"];
		 $_SESSION["strQty1"][$intNewLine] = $_POST["txtQty1"];
	}
	
	// header("location:index.php?mn=session_show");

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript">
	function fncSubmit2()
	{	
	 if(document.getElementById('txtQty1').value == ""){
			alert('กรุณากรอกตัวเลข');
			document.frm1.txtQty1.focus();
			return false;
		}
	}
</script>
<style type="text/css">
.hvr-bounce-in h1 {
	color: #F00;
}
</style>
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
<center>
	<div class="hvr-bounce-in">
	  <h1>ระบบสั่งซื้อพัสดุ</h1></div>
</center>

<div class="container">
	<div class="row">
		<div class="col-md-6 hvr-glow">
			<center>
            	<h2> 
                	<div class="hvr-bounce-in">รายการพัสดุ</div>
                </h2>
					<form name="frmSearchp" class="form-inline" method="post" action="">
      					<div class="input-group newsletter">
      						<div class="input-group has-success">
                             <input name="txtKeyword" class="form-control" type="text" id="txtKeywordp" value="" placeholder="ชื่อพัสดุ" style="width: 200px;ext-align: center;">
                          	<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                          		</div>
                         	 <span class="input-group-btn">
                          		<input type="submit" class="btn btn-info hvr-bounce-in" name="btx" value="Search">
                          		&nbsp;&nbsp;
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link hvr-bounce-in" data-toggle="modal" data-target="#myModal">
                                  เพิ่มพัสดุ
                                </button>
                       	    </span>
                      </div>
                    </form>
            </center><p/>
            
            
<?
$rows = 10;
if(isset($page)<=0)$page=1;
$total_data = mysql_num_rows(mysql_query("select * from stock "));
$total_page = ceil($total_data/$rows);
if($page>=$total_page)$page=$total_page;
$start=($page-1)*$rows;

	   if(isset($_POST['btx'])){
	   if($_POST['btx']=="Search"){
		   if($_POST['txtKeyword']!==""){
   			$sql = "SELECT * FROM stock WHERE pname LIKE '".$strKeyword."%' ORDER BY stock ASC Limit $start,10";
		   }elseif($_POST['txtKeyword']=="" ){
   			$sql = "SELECT * FROM stock ORDER BY stock ASC Limit $start,10";
		   }
   		}
   }else{
   $sql = "SELECT * FROM stock ORDER BY stock ASC Limit $start,10";
   }
   //echo var_dump($sql); เช็คค่าแสดงค่า$sql
   $que = mysql_query($sql) or die (mysql_error());
	  
	  
	  // if($_POST['slp']=="0"){
		  // $sql = "SELECT * FROM stock WHERE stock <= 10 and stock >=0 Limit $start,10";
   		//}elseif($_POST['slp']=="1"){
   		//	$sql = "SELECT * FROM stock Limit $start,10";
   		//}else{
		//	$sql = "SELECT * FROM stock WHERE stock <= 10 and stock >=0 Limit $start,10";
		//}
   //echo var_dump($sql); เช็คค่าแสดงค่า$sql
   
   //$que = mysql_query($sql) or die (mysql_error());
   $sql2 = "SELECT MAX(b_id) AS b_id FROM buy_orders";
   $result2 = mysql_query($sql2) or die (mysql_error());
   $show2 = mysql_fetch_array($result2);
?>


    <table  class="table table-striped table-bordered">
         <thead>
               	<tr>
                  <th width="105" ><center>รูป</center></th>
                  <th width="21" ><center>ชื่อ</center></th>
                  <th width="45" ><center>จำนวน</center></th>
                  <th width="89" ><center>สั่ง</center></th>        
            	</tr>
        </thead>
       <tbody>
<? while($result=mysql_fetch_array($que)){?>
  <tr <? if($result["stock"] <= 10){?>
               class="danger"
     <?
       }
     ?>>
    <td align="center">
    <div class="hvr-bounce-in"><a href="myfile/<? echo $result['Picture']; ?>" rel="prettyPhoto" ><img src="myfile/<? echo $result['Picture']; ?>" width="100px" height="100px" border="0" class="img-rounded"/></a></div></td>
   <td align="center"><?php echo $result['pname']; ?></td>
   <td align="center"><?php echo $result['stock']; ?></td>
   <td width="100" align="center"></a>

<form name="frm1" action="main.php?mn=add_order" onSubmit="JavaScript:return fncSubmit2();" class="form-inline" method="post">
	<div class="input-group newsletter">
        <input type="hidden" name="txtProductID1" value="<?=$result["p_id"];?>" size="2">
        <input type="text" name="txtQty1" id="txtQty1" value="1" style="width: 42px;ext-align: center;" class="form-control" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"> 
        <input type="submit" value="สั่ง" class="btn btn-primary hvr-bounce-in">
    </div>
</form>
   
   
   
   </td>
  </tr>
<?
}
?>
		</tbody>
	</table> 
 
<p/>
 <center>   
         <nav>
          <ul class="pagination hvr-bounce-in">
            <li <? if($page==1)echo 'class="disabled"';?>>
              <a href="main.php?mn=add_order&page=<?=$page-1?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <? for($i=1;$i<=$total_page;$i++){?>
            <li <? if($page==$i)echo 'class="active"';?>><a href="main.php?mn=add_order&page=<?=$i?>"><?=$i?></a></li>
            <? }?>
            <li <? if($page==$total_page)echo 'class="disabled"';?>>
              <a href="main.php?mn=add_order&page=<?=$page+1?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </center>
</div>

<div class="col-md-6 hvr-glow">
		<center>
        	<h2> 
            	<div class="hvr-bounce-in">รายการสั่งซื้อพัสดุ</div>
            </h2>
        </center><? $sum2 = $show2["b_id"] + 1;?>
        ใบสั่งซื้อที่ <?=$sum2;?>
        <form name="frmadd" class="form-horizontal" method="post" action="save_add_order.php" enctype="multipart/form-data">
      <table class="table table-striped table-bordered">
  		<thead>
          <tr>
            <th ><center>รหัสสินค้า</center></th>
            <th ><center>ชื่อสินค้า</center></th>
            <th ><center>ราคา</center></th>
            <th ><center>จำนวน</center></th>
            <th ><center>ราคารวม</center></th>
            <th ><center>ลบ</center></th>
          </tr>
          </thead>
          <tbody> 
          <?
		  
          $Total1 = 0;
          $SumTotal1 = 0;
        if(isset($_SESSION["intLine1"])){

          for($i=0;$i<=(int)$_SESSION["intLine1"];$i++)
          {
              if($_SESSION["strProductID1"][$i] != "")
              {
					$strSQL = "SELECT * FROM stock WHERE p_id = '".$_SESSION["strProductID1"][$i]."' ";
					$objQuery = mysql_query($strSQL)  or die(mysql_error());
					$objResult = mysql_fetch_array($objQuery);
					$Total1 = $_SESSION["strQty1"][$i] * $objResult["price"];
					//$tax = $Total1 * 0.07;
					 $SumTotal = (isset($SumTotal)) ? $SumTotal : '';
						$SumTotal = $SumTotal + $Total1;
				
					
					//$payment = $SumTotal1 + $tax;
					
				  ?>
				
                  <tr>
					<td align="center"><?=$_SESSION["strProductID1"][$i];?></td>
					<td align="center"><?=$objResult["pname"];?></td>
					<td align="center"><?=$objResult["price"];?></td>
					<td align="center">
        <input type="text" name="strQty1[<?=$i;?>]" id="strQty1" value="<? echo $_SESSION["strQty1"][$i];?>" class="form-control" style="width: 60px;ext-align: center;" readonly>	
                    </td>
					<td align="center"><?=number_format($Total1,2);?></td>
					<td align="center"><a class="btn btn-danger hvr-bounce-in" href="delete_add_orders.php.?Line=<?=$i;?>" role="button"><span class="glyphicon glyphicon-trash"></span></a></td>
				  </tr>
                 
              <?
              }
          }
		}
          ?>
          </tbody>
      </table>
 
<p>&nbsp;</p>
<? $SumTotal = (isset($SumTotal)) ? $SumTotal : '';?>
	<input name="txt_sum" id="txt_sum" type="hidden" value="<?=$SumTotal;?>">
  </h3><div align="right"><h3>ราคาเงินรวม <?=number_format($SumTotal,2);?><? if($SumTotal > 0){?> |  	
    	<input type="submit" class="btn btn-success btn-lg hvr-bounce-in" name="btn_s" id="btn_s" value="สั่งซื้อพัสดุ">
    </div>
</form>
<p>
  <?
	}
?>
        
        
       
				
                <br>
			<br>
	    </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มรายการสินค้า</h4>
      </div>
      <div class="modal-body">
        <? include('add_modal_order.php');?>
        
        
        
        
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<?
//mysql_close();
?>


</body>
</html>