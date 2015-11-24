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

//查詢 資料表 特定欄位 條件
function selectCondition($newColumn,$datasheet,$column,$condition){
    
    return "SELECT $newColumn from $datasheet WHERE 
            $column = $condition";
}

//插入 全部
function insertAll($datasheet,$columnArray,$value,$PK_AI){
    //迴圈1.判斷欄位長度2.字串相加
    $addString="";
    $columnString="";
    for($i=0;$i<count($value);$i++){
        $addString = $addString."'".$value[$i]."',";
        //適用唯一主鍵且第一欄位為主鍵
        if($PK_AI=="1"){
            $columnString = $columnString.mysql_field_name($columnArray, $i+1).",";
        }
        else{
            $columnString = $columnString.mysql_field_name($columnArray, $i).",";
        }
        
    }
    //去掉最後一個,
    $addString=substr($addString,0,-1);
    $columnString=substr($columnString,0,-1);
    
    return "INSERT INTO ".$datasheet." (".$columnString.") VALUES (".$addString.")";
}

//查詢 JOIN
function selectJoin($newColumn,$datasheet1,$datasheet2,$column1,$column2){
    return "SELECT ".$newColumn." from ".$datasheet1.",".$datasheet2." WHERE 
            ".$datasheet1.".".$column1."=".$datasheet2.".".$column2."";
}

//查詢 兩張表JOIN後再加入條件
function selectJoinThree($newColumn,$datasheet1,$datasheet2,$datasheet3,$column,$condition){
    if($condition==0){
         return "SELECT $newColumn from $datasheet1 NATURAL JOIN $datasheet2 NATURAL JOIN $datasheet3";
    }
    return "SELECT $newColumn from $datasheet1 NATURAL JOIN $datasheet2 NATURAL JOIN $datasheet3 WHERE $column = $condition";
}
?>