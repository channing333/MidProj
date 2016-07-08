<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

//$value取值，移動檔案到upload資料夾
move_uploaded_file($_FILES["file"]["tmp_name"],"../image/".$_FILES["file"]["name"]);
//檔案路徑寫入資料庫
$value = array($_FILES["file"]["name"],$_POST["p_number"],$_POST["p_name"],$_POST["c_id"],$_POST["p_note"],$_POST["l_id"]);

//$columnArray取值，取得欄位名稱放入方法insertAll變數
$sql = selectAll("property");
//執行SQL語句
$columnArray = mysql_query($sql, $link);

//插入 資料表,欄位,值
$sql = insertAll("property",$columnArray,$value,"1");
//執行SQL語句
$query = mysql_query($sql, $link);

$sql = selectAll("record");
$column = mysql_query($sql, $link);
$sql1 = selectCondition("p_id","property","p_name",$_POST["p_name"]);
$query = mysql_query($sql1, $link);
//echo $query;
/*if(!$query){
   
   die("query". mysql_error());
}*/
$row = mysql_fetch_row($query);
/*if(!row){
   die("row". mysql_error());
}*/
$column = mysql_query($sql, $link);
session_start(); 
if(isset($_SESSION['login']) && $_SESSION['login']=="success"){
    $account = $_SESSION['acc'];
}
else{
	$account = "410175002";
}
$value= array($account,$row[0]);
$sql = insertAll("record",$column,$value,"1");
mysql_query($sql, $link);
//php傳值給index頁面中javascript使用
if($query){
    header("Location: index.php?add=1");
}
else{
    header("Location: index.php?add=2");
}
?>
