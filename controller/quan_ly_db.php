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
    <link rel="stylesheet" href="style_csdl.css">
</head>
<body>
    <?php
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
            require "../model/database.php";
    }?>
            <button><a href="../view/giao_dien_admin.html">Thoát</a></button>
            <div class="tieude">
                <h1>Danh sách dữ liệu người dùng</h1>
            </div>
            <div class= "container">
                <table border="1" align="center" class="input-box">
                    <tr>
                        <th>user_id</th>
                        <th>username</th>
                        <th>email</th>
                        <th>password</th>
                        <th>role</th>
                        <th>Chức năng</th>
                    </tr>
                    <!-- <ul id="list-container">
                        <li>                
                            <tr>
                                <td><input type="text" id="id"></td>
                                <td><input type="text" id="username"></td>
                                <td><input type="text" id="email"></td>
                                <td><input type="text" id="password"></td>
                                <td><input type="text" id="role"></td>
                                <td><button class="nut1">Sửa</button><button class="nut2">Xóa</button></td>
                            </tr>
                        </li>
                         <li>
                            <tr>
                                <td><input type="text" id="id"></td>
                                <td><input type="text" id="username"></td>
                                <td><input type="text" id="email"></td>
                                <td><input type="text" id="password"></td>
                                <td><input type="text" id="role"></td>
                                <td><button class="nut1">Sửa</button><button class="nut2">Xóa</button></td>
                            </tr>
                        </li>
                        <li>
                            <tr>
                                <td><input type="text" id="id"></td>
                                <td><input type="text" id="username"></td>
                                <td><input type="text" id="email"></td>
                                <td><input type="text" id="password"></td>
                                <td><input type="text" id="role"></td>
                                <td><button class="nut1">Sửa</button><button class="nut2">Xóa</button></td>
                            </tr>
                        </li> 
                    </ul>-->
            </div>
                <?php
                    // $connection = mysqli_connect("$host", "$username", "$password", "$dbname");
                    $sql = "SELECT * FROM users";
                    $qr = mysqli_query($conn,$sql);
                    while($rows = mysqli_fetch_array($qr)){
                ?>
                <!-- <tr>    
                    <td><?php echo $rows["id"]; ?></td>
                    <td><?php echo $rows["username"]; ?></td>
                    <td><?php echo $rows["email"]; ?></td>
                    <td><?php echo $rows["password"]; ?></td>
                    <td><?php echo $rows["role"]; ?></td>
                    <td><a href="sua.php?id=<?php echo $rows['id']?>">Sửa </a>| <a href="xoa.php?id=<?php echo $rows['id']?>"> Xóa</td>
                </tr>
                <?php } ?> -->
            </table>
</body>
</html>