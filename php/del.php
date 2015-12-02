<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
?>
<?php
//查詢語句
//欄位說明
$sql = selectJoinThree("`p_pic`,`p_number`,`p_name`,`c_name`,`p_note`,`l_name`,`c_id`,`l_id`","`property`","`category`","`lab`","`c_id`",0);
//執行SQL語句
$query = mysql_query($sql, $link);
if (!$query) { 
    die('Invalid query: ' . mysql_error());
}
$p_number=$_POST['check'];
$arr=0;
while($row = mysql_fetch_row($query)){
    foreach ( $p_number as $arr){
        if($row[1]==$arr){
            $sql = delete("`property`","`p_number`","'$row[1]'");
            mysql_query($sql, $link);
        }
    }
}
if($query){
    header("Location: index.php?delete=1");
}
else{
    header("Location: index.php?delete=2");
}
?>