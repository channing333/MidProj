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
    <div class="information">
      <form name="login" method="post">
        <input type="submit" class="button" name="Send" value="修改帳戶" onclick="this.form.action='../php/information.php';">
        <br>
        <input type="submit" class="button" name="reg" value="登出" onclick="this.form.action='../php/index.php';">
      </form>

      <div class="fb">
      <a class="btn btn-block btn-social btn-facebook">
        <span class="fa fa-facebook" onclick="fbLogin();"></span> Sign in with Facebook
      </a>
      </div>
      <div class="fb">
      <a class="btn btn-block btn-social btn-facebook">
        <span class="fa fa-facebook" onclick="fbLogout();"></span> Logout with Facebook
      </a>
      </div>
    </div>
<!--
Below we include the Login Button social plugin. This button uses
the JavaScript SDK to present a graphical Login button that triggers
the FB.login() function when clicked.
-->
<!--
        <div class="fblogo">
            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
            </fb:login-button>
        </div>
    -->
    
     
</body>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '650788961741935',
    cookie     : true,  // enable cookies to allow the server to access the session
    oauth      : true,
    status     : true, // check login status
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
      
      FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      //document.getElementById('test').innerHTML =
        //response.name;
        var value=response.name;
        location.href="../php/index.php?value=" + value;
        
    });
      /*
      FB.logout(function(response) {
      //user is now logged out 
      });
      */
  }

  function fbLogout() {
    console.log('Welcome!  Fetching your information.... ');
      
      FB.logout(function(response) {
      //user is now logged out 
      });
      
  }

  function fbLogin() {

  }


</script>

  <div class="footer">
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="創用 CC 授權條款" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
    <br />本著作係採用
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">創用 CC 姓名標示 4.0 國際 授權條款</a>授權.
    <br>開發者：呂聆煒、李睿恩、陳昱豪(按姓氏筆畫排序)
  </div>
</html>
