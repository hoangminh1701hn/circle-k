<?php
if (isset($_GET['trangthai'])) {
    if ($_GET['trangthai'] == 'edit') {
        $id = $_GET['id'];
        $luong = $obj->show_luong_byId($id);
       
    }
}
$users = $obj->show_admin_user();
$dem = 1;
$user_array = array();
while ($user = mysqli_fetch_assoc($users)) {
    $user_array[] = $user;
}
if(isset($_POST['update_luong'])){
    $up_msg = $obj->update_luong($_POST);
}

?>
<div id="salaryTable">
    <h3>Lương nhân viên 
    <?php 
    foreach ($user_array as $user) {
        if ($luong['taikhoan'] == $user['id_tk']) {
            echo $user['hoTen']; 
        }
    }
    ?>
    trong tháng 
    <?php 
        echo $luong['thang']; 
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
                    <input type="hidden" name="id_luong" value="<?php echo $luong['id_luong']; ?>">
                    <input type="hidden" id="employeeId" name="taiKhoan" class="form-control" value="<?php echo $employee_id; ?>">
                    <input type="hidden" id="thang" name="thang" class="form-control" value="<?php echo $thang; ?>">

                    <td><input type="number" id="luongTheoGio" name="luongTheoGio" value="<?php echo $luong['luongTheoGio']; ?>" class="form-control" oninput="calculateTotal()"></td>
                    <td><input type="number" id="soGioLam" name="soGioLam" class="form-control" value="<?php echo $luong['soGioLam'] ?>" oninput="calculateTotal()" readonly></td>
                    <td><input type="number" id="phuCap" name="phuCap" class="form-control" value="<?php echo $luong['phuCap']; ?>" oninput="calculateTotal()"></td>
                    <td><input type="number" id="tienThuong" name="tienThuong" class="form-control" value="<?php echo $luong['thuong']; ?>" oninput="calculateTotal()"></td>
                    <td><input type="number" id="tienPhat" name="tienPhat" class="form-control" value="<?php echo $luong['phat']; ?>" oninput="calculateTotal()"></td>
                    <td><input type="number" id="luongThucNhan" name="luongThucNhan" class="form-control" readonly style="color: green;" value="<?php echo $luong['luongThucNhan']  ?>"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <button type="submit" class="btn btn-primary mr-2" name="update_luong">Xác nhận</button>
        <button type="reset" class="btn btn-light">Hủy</button>
        

    </form>
</div>






