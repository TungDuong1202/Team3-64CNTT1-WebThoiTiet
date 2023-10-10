<?php
// your-php-file.php

// Lấy dữ liệu từ yêu cầu POST hoặc GET
$dataFromJS = $_REQUEST['dataFromJS'];

// Thực hiện xử lý nghiệp vụ ở đây
$result = "Hello, " . $dataFromJS . "!";

// Trả về kết quả dưới dạng JSON (hoặc một định dạng khác nếu cần)
echo json_encode(array('result' => $result));
?>