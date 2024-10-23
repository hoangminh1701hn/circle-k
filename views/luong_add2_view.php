<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['buoc1'])) {

    if (isset($_POST['taiKhoan']) && isset($_POST['thang'])) {
        $employee_id = $_POST['taiKhoan'];
        $thang = $_POST['thang'];


        $soGiolam = $obj->tinhSoGioLamTheoThang($employee_id, $thang);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_luong'])) {

    $rtnMsg = $obj->add_luong($_POST);
    echo $rtnMsg;
}


$user_info = $obj->show_admin_user();
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

?>

<div id="salaryTable">
    <h3>Lương nhân viên
        <?php

        foreach ($user_array as $user) {
            if ($employee_id == $user['id_tk']) {
                echo $user['hoTen'];
            }
        }
        ?>
        trong tháng
        <?php
        echo $thang;
        ?>
    </h3>

    <form method="POST">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Lương theo giờ</th>
                    <th>Số giờ làm</th>
                    <th>Phụ cấp</th>
                    <th>Tiền thưởng</th>
                    <th>Tiền phạt</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <input type="hidden" id="employeeId" name="taiKhoan" class="form-control"
                        value="<?php echo $employee_id; ?>">
                    <input type="hidden" id="thang" name="thang" class="form-control" value="<?php echo $thang; ?>">

                    <td>
                        <select id="luongTheoGio" name="luongTheoGio" class="form-control" required
                            onchange="calculateTotal()">
                            <option value="" disabled selected>-- Chọn lương theo giờ --</option>
                            <option value="22">22.000đ</option>
                            <option value="25">25.000đ</option>
                            <option value="26">26.000đ</option>
                        </select>
                    </td>

                    <td><input type="number" id="soGioLam" name="soGioLam" class="form-control"
                            oninput="calculateTotal()" value="<?php echo $soGiolam; ?>" readonly required
                            style="color: red;;"></td>
                    <td>
                        <select id="phuCap" name="phuCap" class="form-control" required onchange="calculateTotal()">
                            <option value="" disabled selected>-- Chọn phụ cấp --</option>
                            <option value="0">0đ</option>
                            <option value="100">100.000đ</option>
                            <option value="200">200.000đ</option>
                            <option value="300">300.000đ</option>
                            <option value="500">500.000đ</option>
                            <option value="1000">1.000.000đ</option>
                        </select>
                    </td>

                    <td><input type="number" id="tienThuong" name="tienThuong" class="form-control"
                            oninput="calculateTotal()" required></td>
                    <td><input type="number" id="tienPhat" name="tienPhat" class="form-control"
                            oninput="calculateTotal()" required></td>
                    <td><input type="number" id="luongThucNhan" name="luongThucNhan" class="form-control" readonly
                            style="color: red;"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn btn-primary mr-2" name="add_luong">Xác nhận</button>
        <button type="reset" class="btn btn-light">Hủy</button>
        <a href="luong_add1.php" class="btn btn-secondary">Quay lại bước 1</a>

    </form>
</div>