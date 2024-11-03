<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'edit') {
        $id = $_GET['id'];
        $ds_infor=$obj->show_dsthuongbyid($id);
        $ds = mysqli_fetch_assoc($ds_infor);
    }
}
$user_info = $obj->show_admin_user();
$thuong_info = $obj->show_thuong();
if (isset($_POST['update_dsthuong'])) {
    $add_msg = $obj->update_dsthuong($_POST);
}




?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm danh sách thưởng</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên nhân viên</label>
                    <select name="nhanVien" id="nhanVien" class="form-control">
                        <?php while ($user = mysqli_fetch_assoc($user_info)) { ?>
                            <?php if ($user['id_tk'] == $ds['nhanVien']) { ?>
                                <option value="<?php echo $user['id_tk'] ?>" selected><?php echo $user['hoTen'] ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $user['id_tk'] ?>"><?php echo $user['hoTen'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Loại tiền thưởng</label>
                    <select name="thuong" id="thuong" class="form-control">
                        <?php while ($thuong = mysqli_fetch_assoc($thuong_info)) { ?>
                            <?php if ($thuong['id_thuong'] ==  $ds['thuong']) { ?>
                                <option value="<?php echo $thuong['id_thuong'] ?>" selected><?php echo $thuong['loaiThuong'] ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $thuong['id_thuong'] ?>"><?php echo $thuong['loaiThuong'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                        <label for="">Số lần thưởng</label>
                        <input type="number" name="soLanThuong" class="form-control" value="<?php echo $ds['soLanThuong'];?>" id="" placeholder="Nhập số lần thưởng">
                      </div>
                     
                     
                      <input type="hidden" name="id_dst" value="<?php echo $ds['id_dst']?>">
                <button type="submit" class="btn btn-primary mr-2" name="update_dsthuong">Xác nhận</button>
                <button type="reset" class="btn btn-dark">Hủy</button>
            </form>
        </div>
    </div>
</div>