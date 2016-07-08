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
    <link rel="stylesheet" href="../css/Edit.css">
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
	<title>
        實驗室財產管理系統
    </title>
</head>
<body>
    <?php
    callHeader();
?>
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
//搜尋全部，再看傳來的p_number是否有符合
$sql = selectJoinFour("`p_pic`,`p_number`,`p_name`,MAX(`r_datelend`),`u_number`,`c_name`,`p_note`,`l_name`,`c_id`,`l_id`,`p_id`","`property`","`category`","`lab`","`record`","`c_id`",0);
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
        echo "<td>".$row[1]."<input type='text' name='p_num[]' value='".$row[1]."'></td>";
        echo "<td>".$row[2]."<input type='text' name='p_name[]' value='".$row[2]."'></td>";
        echo "<td><input type='text' name='target' value='".$row[3]."'></td>";
        
        $ownerString = "";
        $sql = selectAll("user");
        $query = mysql_query($sql, $link);
        $ownerString = $ownerString."<td>".$row[4]."<select name='c_name[]'>";
        while($owner = mysql_fetch_row($query)){
          $ownerString = $ownerString."<option value='".$owner[0]."'>".$owner[0]."</option>";
        }
        $ownerString = $ownerString."</select></td>";
        echo $ownerString;
        //上一個持有人不能更改，由資料庫去做變更
        echo "<td>".$row[4]."</td>";
        //echo "<td><input type=".'text'." name='c_name[]' value='".$row[5]."'></td>";
        $categoeyString = "";
        $sql = selectAll("category");
        $query = mysql_query($sql, $link);
        $categoeyString = $categoeyString."<td>".$row[5]."<select name='c_name[]'>";
        while($category = mysql_fetch_row($query)){
          $categoeyString = $categoeyString."<option value='".$category[1]."'>".$category[1]."</option>";
        }
        $categoeyString = $categoeyString."</select></td>";
        echo $categoeyString;
        
        echo "<td>".$row[6]."<input type='text' name='p_note[]' value='".$row[6]."'></td>";
        $labString = "";
        $sql = selectAll("lab");
        $query = mysql_query($sql, $link);
        $labString = $labString."<td>".$row[7]."<select name='l_name[]'>";
        while($lab = mysql_fetch_row($query)){
          $labString = $labString."<option value='".$lab[1]."'>".$lab[1]."</option>";
        }
        $labString = $labString."</select></td>";
        echo $labString;
        
        echo "<input type='hidden' name='c_id[]' value='".$row[8]."'>";
        echo "<input type='hidden' name='l_id[]' value='".$row[9]."'>";
        echo "<input type='hidden' name='p_id[]' value='".$row[10]."'>";
        echo "</tr>";
        }
    }
}
       echo "<input type=".'submit'." value=".'修改完成'.">";
       echo "</form>";

/*//查詢語句
//欄位說明
//搜尋全部，再看傳來的p_number是否有符合
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
*/
?>


</body>
</html>
