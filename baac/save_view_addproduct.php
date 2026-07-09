<? 
session_start();
include('config.php');?>

<? 
$count = count($_POST['rdo']);
			for ($i = 0; $i < $count; $i++){
			//$rdos = $_POST['rdo'][$i];
			//$_POST['rdos'][$i];
			//;break;
//echo $pp;
if($_POST['btnSubmit'] == "แก้ไข"){
		//*** Update Record ***//

		$strSQL = "UPDATE stock ";
		$strSQL .=" SET pname = '".$_POST["txt_pname"]."',stock = '".$_POST["txt_s"]."',price = '".$_POST["txt_price"]."',c_id = '".$_POST['rdo'][$i]."',s_id = '".$_POST['rdos'][$i]."',su_id = '".$_POST["rdosu"][$i]."' WHERE p_id = '".$_POST['txt_pid']."' ";
		$objQuery = mysql_query($strSQL) or die (mysql_error());		
	
	if($_FILES["filUpload"]["name"] != ""){
		
		if(copy($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"])){
			//*** Delete Old File ***//			
			@unlink("myfile/".$_POST["hdnOldFile"]);
			//*** Update New File ***//
			$strSQL = "UPDATE stock ";
			$strSQL .=" SET Picture = '".$_FILES["filUpload"]["name"]."' WHERE p_id = '".$_POST['txt_pid']."' ";
			$objQuery = mysql_query($strSQL);		
			}
		
		}

		if($objQuery){
			//echo "<script type='text/javascript'>alert('บันทึกแล้ว');";
			echo iconv('UTF-8','TIS-620',"<script type='text/javascript'>alert('บันทึกแล้ว');</script>");
			?>
            <META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=view_addproduct&p_id=<?=$_POST['txt_pid'];?>">
            <?
		}else{
			echo "Error Save [".$strSQL."]";
		}
		//header("Location: main.php?mn=view_addproduct&p_id=$pp");			
	}
}
?>

