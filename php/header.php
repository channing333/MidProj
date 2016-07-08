<?php
//呼叫每個頁面的HEADER
function callHeader(){
session_start();
echo '
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">實驗室財產系統</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="add.php">新增</a></li>
        <li><a href="delete.php">刪除</a></li>
        <li><a href="itemchose.php">編輯</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="keyword.php" method="post" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="target" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="login.php">使用者：
        ';
if(isset($_SESSION['login']) && $_SESSION['login']=="success"){
  echo $_SESSION['acc'];
}
       
        echo '
        <span class="sr-only">(current)</span></a></li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
';
}
?>
