<?php


if(isset($_POST['add_user'])){
    $add_msg = $obj->add_admin_user($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm nhân viên</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">                                                                              
                        <label for="">Họ Tên</label>
                        <input type="text" name="user_hoten" class="form-control" id="" placeholder="Nhập họ tên nhân viên">
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_name" class="form-control" id="" placeholder="Nhập Email nhân viên">
                      </div>
                      <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="user_password" class="form-control" id="" placeholder="Nhập mật khẩu">
                      </div>
                      <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="user_sdt" class="form-control" id="" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="user_adress" class="form-control" id="" placeholder="Nhập địa chỉ">
                      </div>
                      <div class="form-group">
                        <label for="">Giới tính</label>
                        <select name="user_gender" class="form-control js-example-basic-single" id="exampleSelectGender">
                          <option value="Nam">Nam</option>
                          <option value="Nữ">Nữ</option>
                          <option value="Khác">Khác</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Hình đại diện</label>
                        <input type="file" name="hinhdaidien" class="file-upload-default" accept="image/*">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Role</label>
                        <select name="user_role" class="form-control" id="">
                          <option value="CuaHangTruong">Cửa hàng trưởng</option>
                          <option value="NhanVien">Nhân viên</option>
                          
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="add_user">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>