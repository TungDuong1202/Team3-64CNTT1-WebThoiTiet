<?php
    session_start();
    ob_start();
    include "../model/database.php";
    include "../model/user.php";
    if(isset($_POST['signin']) && ($_POST['signin'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $role = checkuser($user,$pass);
        $id = getid($user,$pass);
        if($role!= -1){
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;
        }

        if($role==1){
            header("Location: giao_dien_admin.html");
        }
        elseif($role == -1){
            $txt_error = "Tên đăng nhập hoặc mật khẩu không tồn tại!";
        }
        else{
            header("Location: giao_dien_user.html");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../model/css/style_signin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
</head>
</head>
<body>
    <div class="container">
        <form action="" method="post" class="form-login">
            <h1>Đăng nhập</h1>
            <div class="form-control">
                <ion-icon name="person-circle-outline"></ion-icon>
                <input id='username' name="username" type="text" placeholder="Tên đăng nhập">
                <small></small>
                <span></span>
            </div>

            <div class="form-control">
                <ion-icon name="lock-closed"></ion-icon>
                <input id="password" name="password" type="password" placeholder="Mật khẩu">
                <small></small>
                <span></span>
            </div>

            <input type="submit" name="signin" class="btn-submit" value="Đăng nhập"></input>

            <div class="signin-link">Bạn chưa có tài khoản? <a href="sign_up.php">Đăng kí ngay</a></div>
            <br>
            <?php
                if(isset($txt_error)&&($txt_error!=""))
                echo "<font color = 'red'>".$txt_error."</font>";
            ?>
        </form>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>