<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'circlek';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lưu cấu hình
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $shift_rules = $_POST['shift_rules'];
    $overtime_policy = $_POST['overtime_policy'];
    $leave_policy = $_POST['leave_policy'];
    $sick_leave_policy = $_POST['sick_leave_policy'];
    $holiday_policy = $_POST['holiday_policy'];

    $sql = "INSERT INTO working_regulations (start_time, end_time, shift_rules, overtime_policy, leave_policy, sick_leave_policy, holiday_policy) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $start_time, $end_time, $shift_rules, $overtime_policy, $leave_policy, $sick_leave_policy, $holiday_policy);

    if ($stmt->execute()) {
        echo "Cấu hình đã được lưu!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../circle-k-master/css/style.css">
    <title>Quản lý Quy định</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Thiết lập Quy định Làm việc</h1>
        <form action="" method="POST">
            <label for="start_time">Thời gian bắt đầu:</label>
            <input type="datetime-local" id="start_time" name="start_time" required>

            <label for="end_time">Thời gian kết thúc:</label>
            <input type="datetime-local" id="end_time" name="end_time" required>

            <label for="shift_rules">Quy định ca làm:</label>
            <textarea id="shift_rules" name="shift_rules" rows="3"></textarea>

            <label for="overtime_policy">Chính sách làm thêm giờ:</label>
            <textarea id="overtime_policy" name="overtime_policy" rows="3"></textarea>

            <label for="leave_policy">Chính sách nghỉ phép:</label>
            <textarea id="leave_policy" name="leave_policy" rows="3"></textarea>

            <label for="sick_leave_policy">Chính sách nghỉ ốm:</label>
            <textarea id="sick_leave_policy" name="sick_leave_policy" rows="3"></textarea>

            <label for="holiday_policy">Chính sách nghỉ lễ:</label>
            <textarea id="holiday_policy" name="holiday_policy" rows="3"></textarea>

            <button type="submit">Lưu Cấu Hình</button>
        </form>
    </div>
</body>
</html>
