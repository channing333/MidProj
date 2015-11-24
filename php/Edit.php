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
    <link rel="stylesheet" href="../css/Edit.css">

	<style>

    </style>
	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
    <div class="common-head"><a href="index.php" style="text-decoration:none; color:black;">實驗室財產管理系統</a></div>
       <div class="common-funcRow">
           <div class="common-func"><a class="common-a" href="../html/Login.html">使用者:</a></div>
         <div class="common-func"><a class="common-a" href="../php/Itemchose.php">刪除</a></div>
         <div class="common-func"><a class="common-now" href="../php/Itemchose.php">編輯</a></div>
         <div class="common-func"><a class="common-a" href="../php/add.php">新增</a></div>
         <div class="common-func"><a class="common-a" href="../php/index.php">首頁</a></div>
   </div>
    <div class="leftContent font">開始編輯！</div>

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
$sql = selectJoinThree("`p_pic`,`p_number`,`p_name`,`c_name`,`p_note`,`l_name`,`c_id`,`l_id`","`property`","`category`","`lab`","`c_id`",0);
//執行SQL語句
$query = mysql_query($sql, $link);
$p_number=$_POST['check'];
$arr=0;
echo "<form action='update.php' method=post>";
while($row = mysql_fetch_row($query)){
    foreach ( $p_number as $arr){
    if($row[1]==$arr){
        echo "<tr>";
        echo "<td><img class=".'image'." src=../image/".$row[0]."></td>";
        echo "<td>".$row[1]."<input type='hidden' name='p_num[]' value='".$row[1]."'></td>";
        echo "<td><input type='text' name='p_name[]' value='".$row[2]."'></td>";
        echo "<td>2015/11/15<input type=".'text'." name=".'target'."></td>";
        echo "<td>陳昱豪<input type='text' name=".'target'."></td>";
        echo "<td>呂聆煒<input type=".'text'." name=".'target'."></td>";
        echo "<td><input type=".'text'." name='c_name[]' value='".$row[3]."'></td>";
        echo "<td><input type='text' name='p_note[]' value='".$row[4]."'></td>";
        echo "<td><input type='text' name='l_name[]' value='".$row[5]."'></td>";
        echo "<input type='hidden' name='c_id[]' value='".$row[6]."'>";
        echo "<input type='hidden' name='l_id[]' value='".$row[7]."'>";
        echo "</tr>";
        }
    }
}
       echo "<input type=".'submit'." value=".'修改完成'.">";
       echo "</form>";
?>

</body>
</html>
