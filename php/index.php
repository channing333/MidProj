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
    <script src="../js/jquery.min.js"></script>
<script  src="../js/photoZoom.min.js"> </script>
<script>
$(document).ready(function()
{
$('body').photoZoom();
});
</script> 
    

	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
          
<?php
//判斷有沒有給值
    //是否新增財產成功
    if(isset($_GET['add']) && $_GET['add']==1){
        echo "<script>addError();</script>";
    } 
    //是否新增使用者成功
    if(isset($_GET['adduser']) && $_GET['adduser']==1){
        echo "<script>adduserError();</script>";
    } 
    //是否登入成功
    if(isset($_GET['login']) && $_GET['login']==0){
        echo "<script>loginSuccess();</script>";
    } 
    //是否更新成功
    if(isset($_GET['update']) && $_GET['update']==1){
        echo "<script>updateSuccess();</script>";
    } 
    //是否刪除成功
    if(isset($_GET['delete']) && $_GET['delete']==1){
        echo "<script>deleteSuccess();</script>";
    } 
?>
   <div class="common-head"><a href="index.php" style="text-decoration:none; color:black;">實驗室財產管理系統</a></div>
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
         
         <div class="common-func"><a class="common-a" href="../php/delete.php">刪除</a></div>
         <div class="common-func"><a class="common-a" href="../php/Itemchose.php">編輯</a></div>
         <div class="common-func"><a class="common-a" href="../php/add.php">新增</a></div>
   </div>
    
   <div class="font">關鍵字搜尋<input type="text" name="target"><input type="button" value="GO"></div>
   <div class="font">請選擇類別</div>
   <div class="sideBar">
<?php
//查詢語句
$sql = selectAll("category");
//執行SQL語句
$query = mysql_query($sql, $link);
echo "<div class=".'sidecontent'."><a href='index.php'>‧全部</a></div>";
while ( $row = mysql_fetch_row($query) ) {
echo "<div class=".'sidecontent'."><a href='index.php?type=".$row[0]."'>‧".$row[1]."</a></div>";
}
?>
   </div>
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
//財產顯示
//查詢語句
$sql = selectJoinThree("`p_pic`,`p_number`,`p_name`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`c_id`",0);
//執行SQL語句
$query = mysql_query($sql, $link);
//資料庫語法錯誤說明
if (!$query) { 
    die('Invalid query: ' . mysql_error());
}
if(isset($_GET['type'])){
    //type是數字，不用括號
    $sql = selectJoinThree("`p_pic`,`p_number`,`p_name`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`c_id`",$_GET['type']);
    $query = mysql_query($sql, $link);
    if (!$query) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
}
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
