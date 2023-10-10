<?php
    session_start();
    ob_start();
    include 'database.php';

    function gettasks($id){
        global $conn;
        $sql = "SELECT * FROM todo_list where id = '$id'";
        $result = $conn->query($sql);
        $tasks = [];
        while($rows = $result->fetch_assoc()){
            $tasks[] = $rows;
        }
        return $tasks;
    }

    function addtasks($id, $tasks){
        global $conn;
        $sql = "INSERT INTO todo_list (id,noi_dung) values('$id','$tasks')";
        return $conn->query($sql);
    }

    function updatetasks($id,$id_ghichu){
        global $conn;
        $sql = "UPDATE todo_list set trang_thai = 1 where id = $id and id_ghichu = '$id_ghichu'";
        return $conn->query($sql);
    }

    function deletetasks($id,$id_ghichu){
        global $conn;
        $sql = "DELETE FROM todo_list WHERE id = '$id' AND id_ghichu = '$id_ghichu'";
        return $conn->query($sql);
    }
?>