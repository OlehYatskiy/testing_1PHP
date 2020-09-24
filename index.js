const loginUsernameInput = document.getElementById('loginUserName');
const loginPasswordInput = document.getElementById('loginPassword');
const loginButton = document.getElementById('loginButton');

const emailInput = document.getElementById('registerEmail');
const usernameInput = document.getElementById('registerUserName');
const passwordInput = document.getElementById('registerPassword');
const registerButton = document.getElementById('registerButton');

loginUsernameInput.addEventListener('blur', checkLogin);
loginUsernameInput.addEventListener('input', checkLogin);

loginPasswordInput.addEventListener('blur', checkLogin);
loginPasswordInput.addEventListener('input', checkLogin);

emailInput.addEventListener('focus', handleOnfocus);
emailInput.addEventListener('blur', checkEmail);
emailInput.addEventListener('input', checkEmail);

usernameInput.addEventListener('focus', handleOnfocus);
usernameInput.addEventListener('blur', checkUserName);
usernameInput.addEventListener('input', checkUserName);

passwordInput.addEventListener('focus', handleOnfocus);
passwordInput.addEventListener('blur', checkPassword);
passwordInput.addEventListener('input', checkPassword);

const classNames = ['valid', 'notvalid'];
const validState = {
    email: false,
    username: false,
    password: false
}
const loginState = {
    loginName: false,
    loginPassword: false
}
const emailRegExp = /^[-a-z0-9!#$%&'*+/=?^_`{|}~]+(?:\.[-a-z0-9!#$%&'*+/=?^_`{|}~]+)*@(?:[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])?\.)*(?:aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|[a-z][a-z])$/;
const userNameRegExp = /^(?=.{1,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
const passwordRegExp = /^(?=.*[a-z])(?=.*[A-Z]).{6,32}$/;

function handleInput(e, result) {
    const labelClasslist = e.target.labels[0].classList;

    if (result) {
        labelClasslist.add(classNames[0]);
    } else if (e.type === 'blur') {
        labelClasslist.add(classNames[1]);
    } else {
        labelClasslist.remove(classNames[0]);
    }

    if (e.target.name) {
        validState[e.target.name] = result;
    }
    registerButton.disabled = Object.values(validState).includes(false);
}

function handleOnfocus() {
    const label = this.labels[0];
    classNames.forEach(function (value) {
       label.classList.remove(value);
    });
}

function checkLogin(e) {
    loginState[e.target.name] = !!e.target.value;
    loginButton.disabled = Object.values(loginState).includes(false);
}

function checkEmail(e) {
    const result = emailRegExp.test(this.value);
    handleInput(e, result);
}

function checkUserName(e) {
    const result = userNameRegExp.test(this.value);
    handleInput(e, result);
}

function checkPassword(e) {
    const result = passwordRegExp.test(this.value);
    handleInput(e, result);
}

function loadScript(url, callback){

    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}






