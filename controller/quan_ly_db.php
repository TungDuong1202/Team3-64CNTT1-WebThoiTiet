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
</head>
<body>
    <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
            require "../model/database.php";
    }?>
            <a href="../view/giao_dien_admin.html">Thoát</a>
            <table border="1" align="center">
                <tr>
                    <th>user_id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>role</th>
                    <th>Chức năng</th>
                </tr>
                <?php
                    $connection = mysqli_connect("$host", "$username", "$password", "$dbname");
                    $sql = "SELECT * FROM users";
                    $qr = mysqli_query($connection,$sql);
                    while($rows = mysqli_fetch_array($qr)){
                ?>
                <tr>    
                    <td><?php echo $rows["id"]; ?></td>
                    <td><?php echo $rows["username"]; ?></td>
                    <td><?php echo $rows["email"]; ?></td>
                    <td><?php echo $rows["password"]; ?>3</td>
                    <td><?php echo $rows["role"]; ?></td>
                    <td><a href="sua.php?id=<?php echo $rows['id']?>">Sửa </a>| <a href="xoa.php?id=<?php echo $rows['id']?>"> Xóa</td>
                </tr>
                <?php } ?>
            </table>
</body>
</html>