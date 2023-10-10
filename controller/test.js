// your-script.js

// Hàm để gửi yêu cầu AJAX đến PHP
function sendDataToPHP() {
    var dataToSend = "World";  // Dữ liệu bạn muốn truyền

    // Tạo một đối tượng XMLHttpRequest
    var xhttp = new XMLHttpRequest();

    // Thiết lập hàm xử lý khi yêu cầu hoàn thành
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Xử lý dữ liệu phản hồi từ PHP
            var response = JSON.parse(this.responseText);
            console.log(response.result);
        }
    };

    // Mở một yêu cầu POST đến tệp PHP
    xhttp.open("POST", "test.php", true);

    // Gửi yêu cầu với dữ liệu
    xhttp.send("dataFromJS=" + dataToSend);
}

// Gọi hàm để gửi dữ liệu từ JavaScript đến PHP
sendDataToPHP();
