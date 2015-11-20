function page(){
    return window.location.href = '../html/register.html';              // The function returns the product of p1 and p2
}

function index(){
    return window.location.href = 'index.php';
}

function loginError(){
    if(login.acc.value=="null" || login.acc.value=="" || login.pwd.value=="null" || login.pwd.value=="")
        return alertify.error('請勿輸入空值');
    else{
        login.action="../php/login.php";
        login.submit();
    }
}

function addError(){
    return alertify.success('新增成功');
}

