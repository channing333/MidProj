<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
//移動檔案到upload資料夾
$sql = "INSERT INTO user (u_number, u_name, u_grade, u_phone,u_mail,u_password)
VALUES ( '".$_POST["u_number"]."', '".$_POST["u_name"]."','".$_POST["u_grade"]."','".$_POST["u_phone"]."','".$_POST["u_mail"]."' ,'".$_POST["u_password"]."' )";
//執行SQL語句
$query = mysql_query($sql, $link);
if($query){
    header("Location: index.php?add=1");
}
else{
    header("Location: index.php?add=2");
}
?>
