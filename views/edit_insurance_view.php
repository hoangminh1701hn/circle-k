<?php
// Kết nối đến cơ sở dữ liệu
$connection = mysqli_connect("localhost", "root", "", "circlek");
if (!$connection) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Đặt mã hóa UTF-8 cho kết nối
mysqli_set_charset($connection, "utf8");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Bảo Hiểm</title>
</head>
<body>
    <?php
    // Kiểm tra xem có ID bảo hiểm trong URL không
    if (isset($_GET['id'])) {
        $insurance_id = $_GET['id'];
    } else {
        echo "Không có ID trong URL";
        exit;
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
        'Bảo hiểm y tế' => 0.015,
        'Bảo hiểm xã hội' => 0.1,
        'Bảo hiểm thất nghiệp' => 0.01,
        'Bảo hiểm tai nạn lao động' => 0.01
    );

    // Kiểm tra khi người dùng submit form
    if (isset($_POST['edit_insurance'])) {
        $insurance_id = $_POST['id'];
        $taiKhoan = $_POST['taiKhoan'];
        $thang = $_POST['thang'];
        $insuranceType = $_POST['insurance_type'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $notes = $_POST['notes'];
        
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

            // Cập nhật thông tin bảo hiểm vào cơ sở dữ liệu
            $update_query = "UPDATE insurance 
                             SET taiKhoan = '$taiKhoan', insurance_type = '$insuranceType', 
                                 start_date = '$start_date', end_date = '$end_date', 
                                 notes = '$notes', coverage_amount = '$coverage_amount' 
                             WHERE id = '$insurance_id'";

            if (mysqli_query($connection, $update_query)) {
                echo "Thông tin bảo hiểm đã được cập nhật thành công.";
            } else {
                echo "Lỗi khi cập nhật thông tin: " . mysqli_error($connection);
            }
        } else {
            echo "Không tìm thấy thông tin lương cho nhân viên này.";
        }
    }
    ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="taiKhoan">Nhân viên:</label>
            <select name="taiKhoan" id="taiKhoan" class="form-control">
                <?php foreach ($employees as $employee): ?>
                    <option value="<?php echo $employee['id_tk']; ?>">
                        <?php echo htmlspecialchars($employee['hoTen']); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
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
            <label for="insurance_type">Loại bảo hiểm:</label>
            <select name="insurance_type" id="insurance_type" class="form-control">
                <?php foreach ($insuranceTypes as $type => $rate): ?>
                    <option value="<?php echo htmlspecialchars($type); ?>">
                        <?php echo htmlspecialchars($type); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required><br>
        </div>
        <div class="form-group">
            <label for="notes">Ghi chú:</label>
            <textarea name="notes" id="notes" class="form-control"></textarea><br>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $insurance_id; ?>">
            <button type="submit" name="edit_insurance">Cập nhật bảo hiểm</button>
        </div>
    </form>

</body>
</html>
