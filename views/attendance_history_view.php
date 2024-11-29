<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost"; // Địa chỉ máy chủ
$username = "root";        // Tên đăng nhập
$password = "";            // Mật khẩu
$database = "circlek";     // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng attendance_history
$sql = "SELECT * FROM attendance_history";

if ($admin_role === 'NhanVien') {
    $sql .= " WHERE employee_id = " . intval($admin_id);
}

$result = $conn->query($sql);

// Kiểm tra kết quả
if ($result->num_rows > 0) {
    // In dữ liệu ra dạng bảng HTML
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Time In</th>
                <th>Time Out</th>
                <th>Status</th>
                <th>Record Time</th>
                <th>In Status</th>
                <th>Out Status</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['employee_id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['time_in'] . "</td>
                <td>" . $row['time_out'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>" . $row['record_time'] . "</td>
                <td>" . $row['in_status'] . "</td>
                <td>" . $row['out_status'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu.";
}

// Đóng kết nối
$conn->close();
?>
