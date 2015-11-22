<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

//檔案路徑寫入資料庫
$value = array($_POST["u_number"],$_POST["u_name"],$_POST["u_grade"],$_POST["u_phone"],$_POST["u_mail"],$_POST["u_password"],"0");
//$columnArray取值，取得欄位名稱放入方法insertAll變數
$sql = selectAll("user");
//執行SQL語句
$columnArray = mysql_query($sql, $link);
//插入 資料表,欄位,值
$sql = insertAll("user",$columnArray,$value,"0");
//執行SQL語句
$query = mysql_query($sql, $link);

if($query){
    header("Location: index.php?adduser=1");
}
else{
    header("Location: index.php?adduser=2");
}
?>
