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
    <link rel="stylesheet" href="../css/Index.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../bootstrap-social-gh-pages/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-social-gh-pages/assets/css/font-awesome.css">
    <link rel="stylesheet" href="../bootstrap-social-gh-pages/assets/css/docs.css">
    <link rel="stylesheet" href="../bootstrap-social-gh-pages/bootstrap-social.css">
    <!--這三段式bootstrap的-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/add.js"></script>
    <script src="../js/adduser.js"></script>
    <script src="../js/login.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" rel="stylesheet">  
    <link href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css" rel="stylesheet">  
    <script src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script> 

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
        echo "<script>adduserSuccess();</script>";
    } 
    //是否新增使用者失敗
    if(isset($_GET['adduser']) && $_GET['adduser']==2){
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
    //是否更新失敗
    if(isset($_GET['update']) && $_GET['update']==2){
        echo "<script>updateError();</script>";
    }

    //是否刪除成功
    if(isset($_GET['delete']) && $_GET['delete']==1){
        echo "<script>deleteSuccess();</script>";
    }
?>
<!--包裝header-->
<?php
    callHeader();
?>

      
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
//$sql = selectJoinFour("`p_id`,MAX(`r_datelend`)","`property`","`category`","`lab`","`record`","`c_id`",0);
$sql = selectJoinFour("`p_pic`,`p_number`,`p_name`,MAX(`r_datelend`),`u_number`,`u_number`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`record`","`c_id`",0);
$sql.= "GROUP BY `p_id`";
//執行SQL語句
$query = mysql_query($sql, $link);
//資料庫語法錯誤說明
if (!$query) { 
    die('Invalid query: ' . mysql_error());
}
if(isset($_GET['type'])){
    //type是數字，不用括號
    $sql = selectJoinFour("`p_pic`,`p_number`,`p_name`,MAX(`r_datelend`),`u_number`,`u_number`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`record`","`c_id`",$_GET['type']);
    $sql.= "GROUP BY `p_id`";
    $query = mysql_query($sql, $link);
    if (!$query) { // add this check.
        die('Invalid query: ' . mysql_error());
    }
}
if(isset($_GET['key'])){
    //type是數字，不用括號
    $keywords = mysql_real_escape_string($_GET['key']);//得到來源關鍵字
    $keys = explode(" ",$keywords); //判斷空格則組合成陣列
    $sql = selectJoinFour("`p_pic`,`p_number`,`p_name`,MAX(`r_datelend`),`u_number`,`u_number`,`c_name`,`p_note`,`l_name`","`property`","`category`","`lab`","`record`","`c_id`",0);
    $sql .="WHERE p_name LIKE '%$keywords%'";
    foreach($keys as $k){
        $sql .= " OR p_name LIKE '%$k%' ";
    }
    $sql.= "GROUP BY `p_id`";
    $query = mysql_query($sql,$link);

}

while($row = mysql_fetch_row($query)){

    echo "<tr>";
    echo "<td><img class=".'image'." src=../image/".$row[0]."></td>";
    
    for($i=1;$i<9;$i++){
        echo "<td>".$row[$i]."</td>";
    }

    echo "</tr>";
}
?>
    </table>
	  
</body>
</html>
