<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../css/Itemchose.css">
    <link rel="stylesheet" href="../css/Index.css">
    <link rel="stylesheet" href="../css/common.css">

	<style>

    </style>
	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
    <div class="common-head">實驗室財產管理系統</div>
    <div class="common-funcRow">
         <div class="common-func"><a class="common-a" href="../html/Login.html">使用者:</a></div>
         <div class="common-func"><a class="common-a" href="../php/Itemchose.php">刪除</a></div>
         <div class="common-func"><a class="common-now" href="../php/Itemchose.php">編輯</a></div>
         <div class="common-func"><a class="common-a" href="../php/add.php">新增</a></div>
         <div class="common-func"><a class="common-a" href="../php/index.php">首頁</a></div>
   </div>
    <div class="leftContent font">編輯:請選擇要編輯之項目！</div>
    <div class="rightContent">
       <form action="Edit.php"  method="post">
		     <input type="submit" value="勾選完成">
             <input type="button" value="清除重勾">
    </div>
    <select>
        <?php
        //查詢語句
        $sql = selectAll("category","c_name");
        //執行SQL語句
        $query = mysql_query($sql, $link);
        while ( $row = mysql_fetch_row($query) ) {
        echo "<option value=".$row[0].">".$row[1]."</option>";
        }
        ?>
   </select>

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
          </tr>
<?php
//查詢語句
//欄位說明
$sql = selectJoin("p_pic,p_number,p_name,c_name,p_note,l_id","property","category","c_id","c_id");
//執行SQL語句
$query = mysql_query($sql, $link);
while($row = mysql_fetch_row($query)){
    echo "<tr>";
    echo " <td><input type=".'checkbox'." name='check[]' value='$row[1]'></td>";
    echo "<td><img class=".'image'." src=../image/".$row[0]."></td>";
    echo "<td>".$row[1]."</td>";
    echo "<td>".$row[2]."</td>";
    echo "<td>2015/11/15</td>";
    echo "<td>陳昱豪</td>";
    echo "<td>呂聆煒</td>";
    echo "<td>".$row[3]."</td>";
    echo "<td>".$row[4]."</td>";
    echo "</tr>";
}

?>
    </form>
    </table>
</body>
</html>