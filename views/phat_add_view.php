<?php


if(isset($_POST['add_dsphat'])){
    $add_msg = $obj->add_dsphat($_POST);
}
$user_info = $obj->show_admin_user();
$phat_info = $obj->show_phat();

?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm danh sách phạt</h4>
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
                        <label for="">Loại tiền phạt</label>
                        <select name="phat" id="phat" class="form-control" required>
                        <option value="">-- Chọn loại tiền phạt --</option>
                        <?php while ($phat = mysqli_fetch_assoc($phat_info)) { ?>
                            <option value="<?php echo $phat['id_phat']; ?>">
                                <?php echo $phat['loaiPhat']; ?>
                            </option>
                        <?php } ?>
                    </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="add_dsphat">Xác nhận</button>
                      <button type="reset" class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>