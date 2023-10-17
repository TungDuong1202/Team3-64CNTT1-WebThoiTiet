<?php
    session_start();
    ob_start();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cơ sở dữ liệu người dùng</title>
    <link rel="stylesheet" href="../model/css/style_qldl.css">
</head>
<body>
    <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
            require "../model/database.php";
    }?>
            <button><a href="giao_dien_admin.html">Thoát</a></button>
            <div class="chuthich">
                <h3>Chú thích</h3>
                <table border="1" align="center" class="chuthich-box">
                    <tr>
                        <th>Vai trò</th>
                        <th>Ý nghĩa</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>quản trị viên</td>
                    </tr>
                    <tr>
                        <td>0</td>
                        <td>người dùng</td>
                    </tr>
                </table>
            </div>
            <div class="tieude">
                <h1>Danh sách dữ liệu người dùng</h1>
            </div>
            <div class= "container">
                <table border="1" align="center" class="input-box">
                    <tr>
                        <th>Id</th>
                        <th>Tên đăng nhập</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Chức năng</th>
                    </tr>
            </div>
                <?php
                    $connection = mysqli_connect("$host", "$username", "$password", "$dbname");
                    $sql = "SELECT * FROM users";
                    $qr = mysqli_query($conn,$sql);
                    while($rows = mysqli_fetch_array($qr)){
                ?>
                <tr>    
                    <td><?php echo $rows["id"]; ?></td>
                    <td><?php echo $rows["username"]; ?></td>
                    <td><?php echo $rows["email"]; ?></td>
                    <td><?php echo $rows["role"]; ?></td>
                    <td><a href="../controller/sua.php?id=<?php echo $rows['id']?>">Sửa </a>| <a href="../controller/xoa.php?id=<?php echo $rows['id']?>"> Xóa</td>
                </tr>
                <?php } ?>
            </table>
</body>
</html>