<?php
if (isset($_POST['add_luong'])) {
    $rtnMsg = $obj->add_luong($_POST);
}
$user_info = $obj->show_admin_user();
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Lương</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Chọn nhân viên</label>
                    <select name="taiKhoan" id="taiKhoan" class="form-control" onchange="showTable()">
                        <option value="">-- Chọn nhân viên --</option> <!-- Tùy chọn mặc định -->
                        <?php while ($user = mysqli_fetch_assoc($user_info)) { ?>
                            <option value="<?php echo $user['id_tk']; ?>">
                                <?php echo $user['hoTen']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Bảng ban đầu bị ẩn -->
                <div id="salaryTable" style="display: none;">
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
                                <input type="hidden" name="employee_id" class="form-control" value="<?php echo $user['id_tk']; ?>">
                                <td><input type="number" id="luongTheoGio" name="luongTheoGio" class="form-control" oninput="calculateTotal()"></td>
                                <td><input type="number" id="soGioLam" name="soGioLam" class="form-control" value="<?php echo $soGioLam; ?>" oninput="calculateTotal()"></td>
                                <td><input type="number" id="phuCap" name="phuCap" class="form-control" oninput="calculateTotal()"></td>
                                <td><input type="number" id="tienThuong" name="tienThuong" class="form-control" oninput="calculateTotal()"></td>
                                <td><input type="number" id="tienPhat" name="tienPhat" class="form-control" oninput="calculateTotal()"></td>
                                <td><input type="number" id="luongThucNhan" name="luongThucNhan" class="form-control" readonly style="color: green;"></td>
                            </tr>
                        </tbody>
                    </table>

                    
                    <button type="submit" class="btn btn-primary mr-2" name="add_luong">Xác nhận</button>
                    <button type="reset" class="btn btn-dark">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

