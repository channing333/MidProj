<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel=stylesheet type="text/css" href="../css/add.css">
        <link rel=stylesheet type="text/css" href="../css/common.css">
        <style>

        </style>
        <title>
            新增財產頁面
        </title>
    </head>

    <body>
        <div class="common-head">新增財產</div>
        <div class="common-funcRow">
            <div class="common-func"><a class="common-a" href="../html/Login.html">使用者:</a></div>
            <div class="common-func"><a class="common-a" href="../html/Itemchose.html">刪除</a></div>
            <div class="common-func"><a class="common-a" href="../html/Itemchose.html">編輯</a></div>
            <div class="common-func"><a class="common-now" href="add.html">新增</a></div>
            <div class="common-func"><a class="common-a" href="index.php">首頁</a></div>
        </div>
        <div class="Content color8EC5C6 ">

            <div class="leftContent">
                <div class="font">名稱</div>
                <div class="font">類別</div>
                <div class="font">圖片 </div>
                <div class="font">財產編號</div>
                <div class="font">備註 </div>
            </div>
            <div class="centerContent">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" class="1" name="p_name">
                </div>
                <div>
                    <select style="height:30px;width:305px;margin-top:20px;" name="p_category">
                                      
                    <?php
                    //查詢語句
                    $sql = selectAll("category");
                    //執行SQL語句
                    $query = mysql_query($sql, $link);
                    while ( $row = mysql_fetch_row($query) ) {
                        echo "<option value=".$row[0].">".$row[1]."</option>";
                    }
                    ?>

                    </select>
                </div>           
                    檔案名稱:
                    <input type="file" name="file" id="file" />
                    <br />
                    <input type="submit" name="submit" value="上傳檔案" />

                <div>
                    <input type="text" class="1" name="p_number">
                </div>
                <div>
                    <input type="text" class="1" name="p_note">
                </div>
                    <input type="submit" value="新增">
                </form>
            </div>
            <div class="rightContent">
                <img src="../html/test.jpg">
            </div>
        </div>
        <div class="footer colorDodgerblue font">全球資訊網程式設計</div>

    </body>

    </html>