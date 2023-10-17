<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="../model/css/style_signup.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Đăng ký</h1> 
        <form action="../controller/process_signup.php" method="post">          
            <div class="form-control">
                <ion-icon name="person-circle-outline"></ion-icon>
                <input id="tendangnhap" name="username" type="text" placeholder="Tên đăng nhập">
                <small></small>
                <span></span>
            </div>

            <div class="form-control">
                <ion-icon name="mail"></ion-icon>
                <input id="email" name="email" type="email" placeholder="Nhập Email">
                <small></small>
                <span></span>
            </div>

            <div class="form-control">
                <ion-icon name="lock-closed"></ion-icon>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu">
                <small></small>
                <span></span>
            </div>

            <div class="form-control ">
                <ion-icon name="key"></ion-icon>
                <input id="confirm-password" name="confirm-password" type="password" placeholder="Xác nhận mật khẩu">
                <small></small>
                <span></span>
            </div>

            <button type="submit" class="btn-submit">Đăng ký</button>

            <div class="signup-link">Bạn đã có tài khoản? <a href="sign_in.php">Đăng nhập</a></div>
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>