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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel=stylesheet type="text/css" href="../css/add.css">
        <link rel=stylesheet type="text/css" href="../css/common.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/common.js"></script>
        <script type="text/javascript" src="../js/add.js"></script>
        <script type="text/javascript" src="../js/adduser.js"></script>
        <script type="text/javascript" src="../js/login.js"></script>
        <style>

        </style>
        <title>
            新增財產頁面
        </title>
    </head>

    <body>
<?php
    callHeader();
?>
        <div class="Content color8EC5C6 ">

            <div class="leftContent">
                <div class="font">名稱</div>
                <div class="font">類別</div>
                <div class="font">圖片 </div>
                <div class="font">財產編號</div>
                <div class="font">實驗室</div>
                <div class="font">備註 </div>
            </div>
            <div class="centerContent">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" class="1" name="p_name">
                </div>
                <div>
                    <select style="height:30px;width:305px;margin-top:20px;" name="c_id">
                                      
                    <?php
                        //財產類別顯示
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
                    
                    <input type="text" id="textBox" class="1" name="p_number">
                    
                    <BR/>
                     <select id="langCombo">
                      <option value="en-US">英文(美國)</option>
                      <option value="cmn-Hant-TW">中文(台灣)</option>
                    </select>
                    <input id="startStopButton" type="button" value="辨識" onclick="startButton(event)"/><BR/>
                    <label id="infoBox"></label>
                </div>
                <div>
                    <select style="height:30px;width:305px;margin-top:20px;" name="l_id">
                                      
                    <?php
                    //財產歸屬實驗室顯示
                    //查詢語句
                    $sql = selectAll("lab");
                    //執行SQL語句
                    $query = mysql_query($sql, $link);
                    while ( $row = mysql_fetch_row($query) ) {
                        echo "<option value=".$row[0].">".$row[1]."</option>";
                    }
                    ?>

                    </select>
                </div>  
                <div>
                   <textarea name="p_note" cols="40" rows="4" style="width: 300px; margin-top:20px;"></textarea>  
                </div>
                    <input type="submit" name="submit"value="新增">
                </form>
            </div>
            <div class="rightContent">
                <img src="../image/test.jpg">
            </div>
        </div>
        <div class="footer colorDodgerblue font">全球資訊網程式設計</div>

    </body>

    </html>
