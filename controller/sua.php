   <link rel="stylesheet" href="style_sua.css">
   <?php
        session_start();
        ob_start();
        if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
        require "../model/database.php";
   ?>
    <?php
       if(isset($_GET["id"])){
        $id = $_GET["id"];
       }
   ?>
   <?php
        if(isset($_POST['sua'])){
            $username = $_POST["username"];
            $email = $_POST["email"];
            $role = $_POST["role"];

            if($username == ""){echo "Vui lòng nhập username!<br>";}
            if($email == ""){echo "Vui lòng nhập email!<br>";}
            if($role == ""){echo "Vui lòng nhập quyền admin!<br>";}

            if($username != "" && $email != "" && $role != ""){
                $connection = mysqli_connect("$host", "$username", "$password", "$dbname");
                $sql = "UPDATE users set username = '$username', email = '$email', `role` = '$role' where id = $id";
                $qr = mysqli_query($conn,$sql);
                header("location: quan_ly_db.php");
            }
        }
   ?>
    <?php
        $sql = "SELECT * FROM users where id = $id";
        $qr = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($qr);
    ?>
   <form action="" method="post" class="container">
    <label>Tên đăng nhập</label><input type="text" name="username" value="<?php echo $rows["username"]?>"/> <br/><br/>
    <label>Email  </label><input type="text" name="email" value="<?php echo $rows["email"]?>"/> <br/><br/>
    <label>Vai trò</label><input type="text" name="role" value="<?php echo $rows["role"]?>"/> <br/><br/>
    <input type="submit" name="sua" value="Sửa">
    
</form>