function loginError(){
    if(login.acc.value=="null" || login.acc.value=="" || login.pwd.value=="null" || login.pwd.value=="")
        return alertify.error('請勿輸入空值');
    else{
        login.action="../php/login.php";
        login.submit();
    }
}