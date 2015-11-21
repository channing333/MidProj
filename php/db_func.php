<?php
mysql_query("SET NAMES 'utf8'");

//查詢 全部
function selectAll($datasheet){
    return "SELECT * from $datasheet";
}

//查詢 資料表 欄位
function selectColumn($datasheet,$column,$condition){   
    return "SELECT * from $datasheet WHERE $column = '$condition' "; 
}

//插入 全部
function insertAll($datasheet,$columnArray,$value){
    //迴圈1.判斷欄位長度2.字串相加
    $addString="";
    $columnString="";
    for($i=0;$i<count($value);$i++){
        $addString = $addString."'".$value[$i]."',";
        //適用唯一主鍵且第一欄位為主鍵
        $columnString = $columnString.mysql_field_name($columnArray, $i+1).",";
    }
    //去掉最後一個,
    $addString=substr($addString,0,-1);
    $columnString=substr($columnString,0,-1);
    
    return "INSERT INTO ".$datasheet." (".$columnString.") VALUES (".$addString.")";
}

?>