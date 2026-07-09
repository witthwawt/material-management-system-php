<?
$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "pasadu";

$condb = mysql_connect($host,$user,$pass) or die ("erroe_mysql");
mysql_select_db($dbname,$condb);

mysql_query("SET NAME UTF8");
?>