<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'edit') {
        $id = $_GET['id'];
        $user_info = $obj->show_admin_user_by_id($id);
        $user = mysqli_fetch_assoc($user_info);
    }
}

if(isset($_POST['edit_user'])){
    $add_msg = $obj->update_hoso($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa thông tin nhân viên</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">                                                                              
                        <label for="">Họ Tên</label>
                        <input type="text" name="user_hoten" class="form-control" value="<?php echo $user['hoTen'];?>" id="" placeholder="Nhập họ tên nhân viên">
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_email" class="form-control" value="<?php echo $user['email'];?>" id="" placeholder="Nhập Email nhân viên">
                      </div>
                      <!-- <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo $user['matKhau'];?>" id="" placeholder="Nhập mật khẩu">
                      </div> -->
                      <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="user_sdt" class="form-control" value="<?php echo $user['Sdt'];?>" id="" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="user_adress" class="form-control" value="<?php echo $user['diaChi'];?>" id="" placeholder="Nhập địa chỉ">
                      </div>
                      <div class="form-group">
                        <label for="">Giới tính</label>
                        <select name="user_gender" class="form-control js-example-basic-single" id="exampleSelectGender">
                          <option value="Nam" <?php  if($user['gioiTinh']=='Nam'){echo "Selected";  } ?>>Nam</option>
                          <option value="Nữ" <?php  if($user['gioiTinh']=='Nữ'){echo "Selected";  } ?>>Nữ</option>
                          <option value="Khác" <?php  if($user['gioiTinh']=='Khác'){echo "Selected";  } ?>>Khác</option>
                        </select>
                      </div>
                      <div class="form-group">
                    <label for="">Hình ảnh đại diện</label>
                    <input type="file" name="hinhDaiDien" class="form-control" accept="image/*">
                    <img src="uploads/avatar/<?php echo $user['hinhDaiDien']?>" style="width: 80px;" > <br>
                       </div>
                      <input type="hidden" name="user_id" value="<?php echo $user['id_tk']?>">
                      <button type="submit" class="btn btn-primary mr-2" name="edit_user">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>