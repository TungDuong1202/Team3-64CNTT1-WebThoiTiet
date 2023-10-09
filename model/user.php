<?php
    
    function checkuser($user, $pass){
        require "database1.php";
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = '".$user."' AND `password` = '".$pass."'");
        $stmt->execute();
        $result = $stmt->setfetchmode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if(count($kq) > 0){return $kq[0]['role'];}
        else return -1;
    }
?>