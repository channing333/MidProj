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
    <script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript" src="../js/add.js"></script>
    <script type="text/javascript" src="../js/adduser.js"></script>
    <script type="text/javascript" src="../js/login.js"></script>
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
    if(isset($_GET['adduser']) && $_GET['adduser']==1){
        echo "<script>adduserError();</script>";
    } 
    else{
        
    }
    if(isset($_GET['login']) && $_GET['login']==0){
        echo "<script>loginSuccess();</script>";
    } 
    else{
        
    }
?>
   <div class="common-head">實驗室財產管理系統</div>
   <div class="common-funcRow">
        <?php
        session_start(); 
        
       if($_SESSION['login']=="success"){
           echo "<div class='common-func'><a class='common-a' href='../html/Login.html'>使用者：".$_SESSION['acc']."</a></div>";
       }
       else{
           echo "<div class='common-func'><a class='common-a' href='../html/Login.html'>使用者:</a></div>";
           echo "<script>loginError();</script>";
       }
       ?>
         
         <div class="common-func"><a class="common-a" href="../php/Itemchose.php">刪除</a></div>
         <div class="common-func"><a class="common-a" href="../php/Itemchose.php">編輯</a></div>
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
            <th>實驗室</th>
          </tr>
<?php
//查詢語句
//欄位說明
$sql = selectJoin("p_pic,p_number,p_name,c_name,p_note,l_id","property","category","c_id","c_id");
//執行SQL語句
$query = mysql_query($sql, $link);

while($row = mysql_fetch_row($query)){
    echo "<tr>";
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
    </table>
	  
</body>
</html>
