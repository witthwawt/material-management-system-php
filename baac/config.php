<?
$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "pasadu";

$condb = mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($dbname,$condb);

mysql_query("SET NAMES TIS620");
mysql_query("SET character_set_results=utf8");//ตั้งค่าการดึงข้อมูลออกมาให้เป็น utf8
mysql_query("SET character_set_client=utf8");//ตั้งค่าการส่งข้อมุลลงฐานข้อมูลออกมาให้เป็น utf8
mysql_query("SET character_set_connection=utf8");//ตั้งค่าการติดต่อฐานข้อมูลให้เป็น utf8


$yn = date("Y")+543;
$dateN = date("d-m-").$yn;

//mysql_query(" DELETE FROM Orders WHERE OrdersDate <= DATE_ADD(Now(),INTERVAL -3 DAY) "); //ลบใบสั่งเบิกอัตโนมัติที่มีอายุเกิน 3 วัน

  
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
$thai_month_arr=array(  
    "0"=>"",  
    "1"=>"มกราคม",  
    "2"=>"กุมภาพันธ์",  
    "3"=>"มีนาคม",  
    "4"=>"เมษายน",  
    "5"=>"พฤษภาคม",  
    "6"=>"มิถุนายน",   
    "7"=>"กรกฎาคม",  
    "8"=>"สิงหาคม",  
    "9"=>"กันยายน",  
    "10"=>"ตุลาคม",  
    "11"=>"พฤศจิกายน",  
    "12"=>"ธันวาคม"                    
);  
function thai_date($time){  
    global $thai_day_arr,$thai_month_arr;  
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
    $thai_date_return.= "ที่ ".date("j",$time);  
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];  
    $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);  
    $thai_date_return.= "  ".date("H:i",$time)." น.";  
    return $thai_date_return;  
}  
$eng_date=time(); // แสดงวันที่ปัจจุบัน  
  

?>