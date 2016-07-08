<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

$account=$_POST["acc"];
$password=$_POST["pwd"];

//查詢語句
$sql = selectColumn("user","u_number",$account);
//執行SQL語句
$query = mysql_query($sql, $link);

$result = mysql_fetch_row($query);

if($result!=null && $result[5] == $password){
    session_start();
    //登入成功戳記
    $_SESSION["login"]="success";
    $_SESSION["acc"]=$_POST["acc"];
    header("Location: ../php/index.php?login=0"); 
}
else{
    header("Location: ../php/login.php?login=1");
}

mysql_close($link);
?>