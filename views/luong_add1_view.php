<?php
if (isset($_POST['buoc1'])) {
    $rtnMsg = $obj->add_luong($_POST);
}
$user_info = $obj->show_admin_user();
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm Lương</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data" action="luong_add2.php">
                <div class="form-group">
                    <label for="">Chọn nhân viên</label>
                    <select name="taiKhoan" id="taiKhoan" class="form-control" required>
                        <option value="">-- Chọn nhân viên --</option>
                        <?php while ($user = mysqli_fetch_assoc($user_info)) { ?>
                            <option value="<?php echo $user['id_tk']; ?>">
                                <?php echo $user['hoTen']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Chọn tháng lương</label>
                    <select name="thang" id="thang" class="form-control" required>
                        <option value="">-- Chọn tháng lương --</option>
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="buoc1">Xác nhận</button>
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#taiKhoan").select2();
    });
</script>