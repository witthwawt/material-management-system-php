<?
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strProductID1"][$Line] = "";
	$_SESSION["strQty1"][$Line] = "";
	if($Line = $_GET["Line"]){ ?>
    <?
	}
?>
<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=add_order">
