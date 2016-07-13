<?php
// 連結資料庫
include ("db_conn.php");
//調用資料庫函示庫
include ("db_func.php");
//Header
include ("header.php");
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/login.css">
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
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.core.css" >  
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.default.css">  
    <script language="JavaScript" src="//cdnjs.cloudflare.com/ajax/libs/alertify.js/0.3.10/alertify.min.js"></script>
    <script language="JavaScript" src="../js/common.js"></script>
    <script language="JavaScript" src="../js/login.js"></script>
    <title>
        登入頁面
    </title>
</head>

<body>

<!--檢查是否登入成功-->
<?php
    if(isset($_GET['login']) && $_GET['login']==1){
        echo "<script>loginError();</script>";
    }
?>
<!--套用HEADER-->
<?php
    callHeader();
?>
<div class="container">
  <h2>Vertical (basic) form</h2>
  <form role="form">
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
    
     
</body>

  <div class="footer">
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="創用 CC 授權條款" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
    <br />本著作係採用
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">創用 CC 姓名標示 4.0 國際 授權條款</a>授權.
    <br>開發者：呂聆煒、李睿恩、陳昱豪(按姓氏筆畫排序)
  </div>
</html>
