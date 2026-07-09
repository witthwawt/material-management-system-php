<?
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strProductID"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";
	if($Line = $_GET["Line"]){ ?>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=http:main.php?mn=ream">
    <?
	}
?>

