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
<? 

if(isset($_POST["btn2"])){
	if($_POST["btn2"]=="tree"){
		//$o = $_POST["o_id"];
		//$co = count($_POST["txt_id"][$i]);
		
		$count = count($_POST['txt_id']);
			for ($i = 0; $i < $count; $i++){
						//echo $row_show["name"];
						//echo $_POST['txt_id'][$i];
						//echo $_POST['txt_stock'][$i];
				$sql_updetail = "update orders_detail set o_reciveo = '".$_POST['txt_stock'][$i]."' where o_id = '".$_POST["o_id"]."' and p_id = '".$_POST['txt_id'][$i]."'";
				$re_updetail = mysql_query($sql_updetail) or die (mysql_error());
				 //echo var_dump($sql_updetail);//break;
				
				$total[$i] = $_POST['stock'][$i] - $_POST['txt_stock'][$i];
				
				$sql ="update stock set stock = '$total[$i]' where p_id = '".$_POST["txt_id"][$i]."'";
				$result = mysql_query($sql) or die (mysql_error());
		
					}
					$sqluo ="update orders set name_a = '".$row_show["name"]."',st_id = '2',a_date = '$dateN' where o_id = '".$_POST["o_id"]."'";
					$updatuo = mysql_query($sqluo) or die (mysql_error());
		
		}
		if($updatuo){
			
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=report_ream_detail&o_id=<?=$_POST["o_id"];?>">
<?
	}
}
?>

</body>
</html>