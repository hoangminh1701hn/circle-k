<?php


if(isset($_POST['add_dsthuong'])){
    $add_msg = $obj->add_dsthuong($_POST);
}
$user_info = $obj->show_admin_user();
$thuong_info = $obj->show_thuong();

?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm danh sách thưởng</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">                                                                              
                        <label for="">Tên nhân viên</label>
                        <select name="nhanVien" id="nhanVien" class="form-control" required>
                        <option value="">-- Chọn nhân viên --</option>
                        <?php while ($user = mysqli_fetch_assoc($user_info)) { ?>
                            <option value="<?php echo $user['id_tk']; ?>">
                                <?php echo $user['hoTen']; ?>
                            </option>
                        <?php } ?>
                    </select>
                      </div>
                      <div class="form-group">
                        <label for="">Loại tiền thưởng</label>
                        <select name="thuong" id="thuong" class="form-control" required>
                        <option value="">-- Chọn loại tiền thưởng --</option>
                        <?php while ($thuong = mysqli_fetch_assoc($thuong_info)) { ?>
                            <option value="<?php echo $thuong['id_thuong']; ?>">
                                <?php echo $thuong['loaiThuong']; ?>
                            </option>
                        <?php } ?>
                    </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="add_dsthuong">Xác nhận</button>
                      <button type="reset" class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>