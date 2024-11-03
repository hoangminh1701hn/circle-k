<?php


if(isset($_POST['add_loaithuong'])){
    $add_msg = $obj->add_thuong($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm nhân viên</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">                                                                              
                        <label for="">Loại tiền thưởng</label>
                        <input type="text" name="loaiThuong" class="form-control" id="" placeholder="Nhập loại tiền thưởng">
                      </div>
                      <div class="form-group">
                        <label for="">Số tiền thưởng</label>
                        <input type="number" name="soTienThuong" class="form-control" id="" placeholder="Nhập số tiền thưởng">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="add_loaithuong">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>