var email= document.querySelector('#email');
var username= document.querySelector('#tendangnhap');
var password= document.querySelector('#password');
var confirmPassword= document.querySelector('#confirm-password');
var form = document.querySelector('form');
function showError(input,message){
    let parent = input.parentElement;
    let small = parent.querySelector('small');
    parent.classList.add('error');
    small.innerText = message;
}
function showSuccess(input){
    let parent = input.parentElement;
    let small = parent.querySelector('small');
    parent.classList.remove('error');
    small.innerText = '';
}
function checkEmptyError(ListInput){
    let isEmptyError = false;
    ListInput.forEach(input => {
        input.value = input.value.trim();
        if(input.value ==''){
            showError(input,"Không được để trống!");
        }
        else{
            showSuccess(input);
        }
    });
    return isEmptyError
}
function checkEmail(input){
    const  validateEmail =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    input.value = input.value.trim();
    if(validateEmail.test(input.value)){
        showSuccess(input);
    }
    else{
        showError(input,'Email không hợp lệ!');
    }
    return validateEmail.test(input.value);
}
function checkPassword(input,min,max){
    input.value = input.value.trim();
    if(input.value.length < min){
        showError(input,`Mật khẩu phải có ít nhất ${min} kí tự`);
        return true;
    }
    else if(input.value.length>max){
        showError(input,`Mật khẩu không được vượt quá ${max} kí tự`);
        return true;
    }
    showSuccess(input);
    return false;
}
function checkMatchPassword(passwordInput,confirmPasswordInput){
    if(passwordInput.value !== confirmPasswordInput.value){
        showError(confirmPasswordInput,"Mật khẩu không trùng khớp!!");
        return true;
    }
    return false;
}
form.addEventListener('submit', function(e){
    e.preventDefault();
    let isEmptyError = checkEmptyError([email, username, password, confirmPassword]);
    checkEmail(email);
    let isPasswordLengthError = checkPassword(password,5,13);
    let iscfPasswordLengthError = checkPassword(password,5,13);
    let isMatchError = checkMatchPassword(password,confirmPassword);
})