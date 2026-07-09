<? session_start();
include('config.php');

$o_id = $_POST["o_id"];//break;
	$count = count($_POST['txt_s']);
	for ($i = 0; $i < $count; $i++){
		$sqlup ="update orders_detail set s_qty = '".$_POST["txt_s"][$i]."' where `d_id`= '".$_POST["txt_id"][$i]."'";
		$updatup = mysql_query($sqlup) or die (mysql_error());

	}
	if($updatup){
			//echo "<script type='text/javascript'>alert('บันทึกแล้ว');";
			echo iconv('UTF-8','TIS-620',"<script type='text/javascript'>alert('บันทึกแล้ว');</script>");
		}else{
			echo "Error Save [".$strSQL."]";
		}
?>

<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_orders_detail&o_id=<?=$o_id;?>">

