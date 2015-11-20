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

function insert($datasheet){
    
}


?>