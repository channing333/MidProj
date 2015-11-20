<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
//移動檔案到upload資料夾
move_uploaded_file($_FILES["file"]["tmp_name"],"../image/".$_FILES["file"]["name"]);
//檔案路徑寫入資料庫
$sql = "INSERT INTO property (p_pic, p_number, p_name, p_category, p_note)
VALUES ('".$_FILES["file"]["name"]."', '".$_POST["p_number"]."', '".$_POST["p_name"]."','".$_POST["p_category"]."','".$_POST["p_note"]."')";
//執行SQL語句
$query = mysql_query($sql, $link);
if($query){
    header("Location: index.php?add=1");
}
else{
    header("Location: index.php?add=2");
}
?>