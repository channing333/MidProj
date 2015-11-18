<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

$account=$_POST["acc"];
$password=$_POST["pwd"];

//查詢語句
$sql = select("user","u_number",$account);
//執行SQL語句
$query = mysql_query($sql, $link);

$result = mysql_fetch_row($query);

if($result!=null && $result[6] == $password){
    //待修改使用者辨別
    header("Location: ../html/index.html"); 
}
else{
    echo '帳號密碼錯誤';
    header("Location: ../html/login.html"); 
}

mysql_close($link);
?>