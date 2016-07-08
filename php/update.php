<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

$temp0=$_POST['p_num'];
$temp1=$_POST['p_name'];
$temp2=$_POST['c_id'];
$temp3=$_POST['p_note'];
$temp4=$_POST['l_id'];
$temp5=$_POST['l_name'];
$temp6=$_POST['c_name'];
$temp7=$_POST['p_id'];
//總共有幾筆要更新
for($i=0;$i<count($temp1);$i++)
{
    //更改lab的
    $sql = selectColumn("lab","l_name",$temp5[$i]);
    $query = mysql_query($sql, $link);
    $row = mysql_fetch_row($query);
    //更改category的
    $sql = selectColumn("category","c_name",$temp6[$i]);
    $query = mysql_query($sql, $link);
    $row2 = mysql_fetch_row($query);
    //更改property的
    $sql = "UPDATE `property` SET `p_number`='".$temp0[$i]."',`p_name`='".$temp1[$i]."',`c_id`='".$temp2[$i]."',`p_note`='".$temp3[$i]."',`l_id`='".$row[0]."' WHERE `p_id`='".$temp7[$i]."'";
    //執行SQL語句
    $query = mysql_query($sql, $link);
    if (!$query) { 
        die('Invalid query: ' . mysql_error());
    }
    //更新record表單
    session_start();
    $account = $_SESSION['acc'];
    $sql = selectAll("record");
    $column = mysql_query($sql, $link);
    $value= array($account,$temp7[$i]);
    $sql = insertAll("record",$column,$value,"1");
    mysql_query($sql, $link);
}

//php傳值給index頁面中javascript使用
if($query){
    header("Location: index.php?update=1");
}
else{
    header("Location: index.php?update=2");
}
?>
