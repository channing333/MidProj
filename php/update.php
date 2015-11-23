<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
//檔案路徑寫入資料庫

$temp1=$_POST['p_name'];
$temp2=$_POST['p_note'];
$arr=0;
$arr2=0;
print_r($temp1);
print_r($temp2);

//for ( $i=0 ; $i<1 ; $i++ ) {
     print_r($temp1[$arr]);
　 /*$value = array($_FILES["file"]["name"],$_POST["p_number"],$temp1[$i],$_POST["c_id"],$temp2[$i]);
        print_r($value);
    //$columnArray取值，取得欄位名稱放入方法insertAll變數
    $sql = selectAll("property");
    //執行SQL語句
    $columnArray = mysql_query($sql, $link);

    //插入 資料表,欄位,值
    $sql = insertAll("property",$columnArray,$value,"1");
    //執行SQL語句
    $query = mysql_query($sql, $link);*/

//}




//php傳值給index頁面中javascript使用
/*if($query){
    header("Location: index.php?add=1");
}
else{
    header("Location: index.php?add=2");
}*/
?>
