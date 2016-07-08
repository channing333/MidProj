<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");


// 請自行撰寫資料庫連線部分的程式
extract($_REQUEST);
if($submit) {
$file = $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"images/".$file);   // 搬移上傳檔案
mysql_query("insert into images(Image) values('$file')");
$msg= "uploaded success";
}


?>
