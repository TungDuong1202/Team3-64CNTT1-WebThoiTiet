<?php
    $email = $_POST['email'];
    $user = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['confirm-password'];
    if(empty($user)){
        die ("Vui lòng nhập tên đăng nhập!");
    }
    if(strlen($password) < 6){
        echo "Mật khẩu phải chứa ít nhất 6 ký tự.<br>";
        die ("Vui lòng nhập lại!");
    }
    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        echo "Mật khẩu phải chứa ít nhất một chữ cái thường.<br>";
        die ("Vui lòng nhập lại!");
    }
    
    if (!preg_match("/[0-9]/", $_POST["password"])) {
        echo "Mật khẩu phải chứa ít nhất một chữ số.<br>";
        die ("Vui lòng nhập lại!");
    }
    if($password !== $password_confirm){
        echo "Mật khẩu không giống nhau.<br>";
        die ("Vui lòng nhập lại!");
    }
    if(strlen($user) > 20){
        echo "Tên đăng nhập không được quá 20 ký tự.<br>";
        die ("Vui lòng nhập lại!");
    }
    if(strlen($password) > 50){
        echo "Mật khẩu không được quá 50 ký tự.<br>";
        die ("Vui lòng nhập lại!");
    }
    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    require 'database.php';
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
        die ("Email đã tồn tại. Vui lòng chọn email khác.");
    }
    $checkuserQuery = "SELECT * FROM users WHERE username = '$user'";
    $resultuser = $conn->query($checkuserQuery);
    if ($resultuser->num_rows > 0) {
        die ("Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.");
    }
    $sql = "INSERT INTO users (`username`,`email`,`password`) values ('$user','$email','$password_hash')";
    if($conn->query($sql)===TRUE){
        header("Location: signup_success.html");
        exit();
    }else{
        echo "Loi {$sql}".$conn ->error;
    }
?>