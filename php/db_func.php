<?php

//查詢 資料表 欄位
function select($datasheet,$column,$condition){   
    return "SELECT * from $datasheet WHERE $column = '$condition' "; 
}
    
?>