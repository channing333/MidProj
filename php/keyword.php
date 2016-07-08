<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
?>
<?php
$keywords = mysql_real_escape_string($_POST['target']);//得到來源關鍵字
$s = $_POST['target'];
$s = "Location: index.php?key=".$s;
header($s);
/*$keys = explode(" ",$keywords); //判斷空格則組合成陣列
$sql = "SELECT p_name FROM property WHERE p_name LIKE '%$keywords%' ";
foreach($keys as $k){
    $sql .= " OR p_name LIKE '%$k%' ";
}
$query = mysql_query($sql,$link);
echo $sql;

while($row = mysql_fetch_row($query)){
    echo $row[0];
}*/
?>