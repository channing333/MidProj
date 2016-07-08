<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
include ("header.php");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../css/Itemchose.css">
    <link rel="stylesheet" href="../css/Index.css">
    <link rel="stylesheet" href="../css/common.css">
<!--這三段式bootstrap的-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>

    </style>
	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
   <?php
    callHeader();
?>
    <div class="leftContent font">刪除:請選擇要刪除之項目！</div>
    <div class="rightContent">
       <form action="del.php"  method="post">
		     <input type="submit" value="勾選完成">
             <input type="button" value="清除重勾">
    </div>

    <table>
          <tr>
            <th>勾選</th>
            <th>圖片</th>
            <th>編號</th>
            <th>名稱</th>
            <th>借出/歸還日期</th>
            <th>現持有人</th>
            <th>前持有人</th>
            <th>類別</th>
            <th>備註</th>
            <th>實驗室</th>
          </tr>
<?php
//財產顯示
//查詢語句
$sql = selectJoinThree("`p_pic`,`p_number`,`p_name`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`c_id`",0);
//執行SQL語句
$query = mysql_query($sql, $link);
//資料庫語法錯誤說明
if (!$query) { 
    die('Invalid query: ' . mysql_error());
}
while($row = mysql_fetch_row($query)){
    echo "<tr>";
    echo "<td><input type=".'checkbox'." name='check[]' value='$row[1]'></td>";
    echo "<td><img class=".'image'." src=../image/".$row[0]."></td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>2015/11/15</td>";
    echo "<td>陳昱豪</td>";
    echo "<td>呂聆煒</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "<td>".$row[5]."</td>";
    echo "</tr>";
}

?>
    </form>
    </table>
</body>
</html>
