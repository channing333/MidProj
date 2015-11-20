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
    <link rel="stylesheet" href="../css/Index.css">
    <link rel="stylesheet" href="../css/common.css">
    <script type="text/javascript" src="../js/func.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
    <link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
    <script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script> 
	<style>
    
    </style>
    

	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
          
<?php
//判斷有沒有給值
    if(isset($_GET['add']) && $_GET['add']==1){
        echo "<script>addError();</script>";
    } 
    else{
        
    }
?>
   <div class="common-head">實驗室財產管理系統</div>
   <div class="common-funcRow">
         <div class="common-func"><a class="common-a" href="../html/Login.html">使用者:</a></div>
         <div class="common-func"><a class="common-a" href="../html/Itemchose.html">刪除</a></div>
         <div class="common-func"><a class="common-a" href="../html/Itemchose.html">編輯</a></div>
         <div class="common-func"><a class="common-a" href="../php/add.php">新增</a></div>
   </div>
    
   <div class="font">關鍵字搜尋<input type="text" name="target"><input type="button" value="GO"></div>
   <div class="font">請選擇類別</div>

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
$sql = selectAll("property");
//執行SQL語句
$query = mysql_query($sql, $link);

while($row = mysql_fetch_row($query)){
    echo "<tr>";
    echo "<td><img class=".'image'." src=".'小電腦.jpg'."></td>";
    echo "<td>002</td>";
    echo "<td>小筆電</td>";
    echo "<td>2015/11/15</td>";
    echo "<td>陳昱豪</td>";
    echo "<td>呂聆煒</td>";
    echo "<td>電腦</td>";
    echo "<td>請勿下載遊戲及個人檔案!</td>";
    echo "</tr>";
}

?>
          <tr>
            <td>無圖片</td>
            <td>004</td>
            <td>資料結構</td>
            <td>2015/11/16</td>
            <td>LAB</td>
            <td>陳昱豪</td>
            <td>書本</td>
            <td>請勿亂畫</td>
          </tr>
    </table>
	  
</body>
</html>