<?php
// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect("localhost", "root", "", "circlek");
if (!$connection) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Lấy danh sách nhân viên từ bảng taikhoan
$query = "SELECT id_tk, hoTen FROM taikhoan";
$result = mysqli_query($connection, $query);
$employees = array();

while ($row = mysqli_fetch_assoc($result)) {
    $employees[] = $row;
}

// Lấy danh sách các loại bảo hiểm và tỷ lệ
$insuranceTypes = array(
    'Bảo hiểm y tế' => 0.015,  // 1,5%
    'Bảo hiểm xã hội' => 0.1,   // 10%
    'Bảo hiểm thất nghiệp' => 0.01,   // 1%
    'Bảo hiểm tai nạn lao động' => 0.01   // 1%
    
);

// Kiểm tra khi người dùng submit form
if (isset($_POST['add_insurance'])) {
    $taiKhoan = $_POST['taiKhoan']; // ID nhân viên
    $thang = $_POST['thang'];       // Tháng
    $insuranceType = $_POST['insurance_type']; // Loại bảo hiểm
    $start_date = $_POST['start_date']; // Ngày bắt đầu
    $end_date = $_POST['end_date'];     // Ngày kết thúc
    $notes = $_POST['notes'];           // Ghi chú
    
    // Truy vấn thông tin lương cho nhân viên và tháng hiện tại
    $query = "SELECT taikhoan.hoTen, luong.thang, luong.luongThucNhan 
              FROM taikhoan 
              JOIN luong ON taikhoan.id_tk = luong.taiKhoan 
              WHERE taikhoan.id_tk = '$taiKhoan' 
              AND luong.thang = '$thang'";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $insuranceRate = $insuranceTypes[$insuranceType];
        $coverage_amount = $row['luongThucNhan'] * $insuranceRate;

        // Lưu thông tin vào bảng insurance
        $insert_query = "INSERT INTO insurance (taiKhoan, insurance_type, start_date, end_date, notes, coverage_amount) 
                         VALUES ('$taiKhoan', '$insuranceType', '$start_date', '$end_date', '$notes', '$coverage_amount')";

        if (mysqli_query($connection, $insert_query)) {
            echo "Thêm bảo hiểm thành công!";
        } else {
            echo "Lỗi khi thêm bảo hiểm: " . mysqli_error($connection);
        }
    } else {
        echo "Không tìm thấy thông tin lương cho nhân viên và tháng này.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bảo hiểm</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Liên kết đến CSS -->
</head>
<body>
    <div class="container">
        <h2>Thêm bảo hiểm</h2>
        <form method="POST">
            <div class="form-group">
                <label for="taiKhoan">Chọn nhân viên:</label>
                <select name="taiKhoan" id="taiKhoan" class="form-control" required>
                    <option value="">-- Chọn nhân viên --</option>
                    <?php
                    foreach ($employees as $employee) {
                        echo "<option value='" . $employee['id_tk'] . "'>" . htmlspecialchars($employee['hoTen'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                    ?>
                </select>
                
            </div>
            
            <div class="form-group">
                <label for="thang">Chọn tháng:</label>
                
                <select name="thang" id="thang" class="form-control" required>
                    <?php for ($i = 1; $i <= 12; $i++) {
                        echo "<option value='$i'>Tháng $i</option>";
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="insurance_type">Chọn loại bảo hiểm:</label>
                        <select name="insurance_type" id="insurance_type" class="form-control" required>
                    <?php foreach ($insuranceTypes as $type => $rate) {
                        echo "<option value='$type'>$type</option>";
                    } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Ngày bắt đầu:</label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="end_date">Ngày kết thúc:</label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="notes">Ghi chú:</label>
                <textarea name="notes" id="notes" class="form-control"></textarea>
            </div>

            <button type="submit" name="add_insurance" class="btn btn-primary">Xác nhận</button>
            <button type="reset" class="btn btn-dark">Hủy</button>
        </form>
    </div>
</body>
</html>

<?php
// Đóng kết nối
mysqli_close($connection);
?>
