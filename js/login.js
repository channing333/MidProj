function loginNull(){
    if(login.acc.value=="null" || login.acc.value=="" || login.pwd.value=="null" || login.pwd.value=="")
        return alertify.error('請勿輸入空值');
    else{
        login.action="checkuser.php";
        login.submit();
    }
}

function loginSuccess(){
    return alertify.success('登入成功');
}

function loginError(){
    return alertify.error('登入失敗');
}
