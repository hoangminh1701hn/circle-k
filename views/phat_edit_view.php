<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'edit') {
        $id = $_GET['id'];
        $ds_infor=$obj->show_dsphatbyid($id);
        $ds = mysqli_fetch_assoc($ds_infor);
    }
}
$user_info = $obj->show_admin_user();
$phat_info = $obj->show_phat();
if (isset($_POST['update_dsphat'])) {
    $add_msg = $obj->update_dsphat($_POST);
}




?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm danh sách phạt</h4>
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
                    <select name="phat" id="phat" class="form-control">
                        <?php while ($phat = mysqli_fetch_assoc($phat_info)) { ?>
                            <?php if ($phat['id_phat'] ==  $ds['phat']) { ?>
                                <option value="<?php echo $phat['id_phat'] ?>" selected><?php echo $phat['loaiPhat'] ?>
                                </option>
                            <?php } else { ?>
                                <option value="<?php echo $phat['id_phat'] ?>"><?php echo $phat['loaiPhat'] ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                        <label for="">Số lần thưởng</label>
                        <input type="number" name="soLanPhat" class="form-control" value="<?php echo $ds['soLanPhat'];?>" id="" placeholder="Nhập số lần thưởng">
                      </div>
                     
                     
                      <input type="hidden" name="id_dsp" value="<?php echo $ds['id_dsp']?>">
                <button type="submit" class="btn btn-primary mr-2" name="update_dsphat">Xác nhận</button>
                <button type="reset" class="btn btn-dark">Hủy</button>
            </form>
        </div>
    </div>
</div>