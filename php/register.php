
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel=stylesheet type="text/css" href="../css/register.css">
    <link rel=stylesheet type="text/css" href="../css/common.css">
	<style>
	</style>
	<title>
        註冊頁面
    </title>
</head>
<body>
	   <div class="common-head"><a href="index.php" style="text-decoration:none; color:black;">實驗室財產管理系統</a></div>
	   <div class="common-funcRow">
         <div class="common-func"><a class="common-a" href="../html/Login.html">使用者:</a></div>
         <div class="common-func"><a class="common-a" href="Itemchose.html">刪除</a></div>
         <div class="common-func"><a class="common-a" href="Itemchose.html">編輯</a></div>
         <div class="common-func"><a class="common-a" href="../php/add.php">新增</a></div>
         <div class="common-func"><a class="common-a" href="../php/index.php">首頁</a></div>
       </div>
		<div class="Content color8EC5C6">
            <form action="adduser.php"  method="post">
		      <div class="font">學號<input type="text" class="1" name="u_number"></div>
		      <div class="form font">姓名<input type="text" class="1" name="u_name"></div>
		      <div class="font">年級<input type="text" class="1" name="u_grade"></div>
		      <div class="font">電話<input type="text" class="1" name="u_phone"></div>
		      <div class="font">信箱<input type="text" class="1" name="u_mail"></div>
		      <div class="font">密碼<input type="text" class="1" name="u_password"></div>
				<input type="submit" value="提交" >
            </form>
			</div>

		</div>
      <div class="footer colorDodgerblue font">全球資訊網程式設計</div>

</body>
</html>
