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
    // Xử lý yêu cầu từ phía client
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Lấy danh sách tasks
        echo json_encode(gettasks($_SESSION['id'])); // Điều chỉnh phương thức xác thực
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Thêm task mới
        $data = json_decode(file_get_contents('php://input'), true);
        $task = $data['todo_list'];
        echo json_encode(['success' => addtasks($_SESSION['id'], $tasks)]);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Cập nhật trạng thái hoàn thành của task
        $data = json_decode(file_get_contents('php://input'), true);
        $id_ghichu = $data['id_ghichu'];
        echo json_encode(['success' => updatetasks($_SESSION['id'], $id_ghichu)]);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Xóa task
        $data = json_decode(file_get_contents('php://input'), true);
        $taskId = $data['id'];
        echo json_encode(['success' => deletetasks($_SESSION['id'], $id_ghichu)]);
    }

?>