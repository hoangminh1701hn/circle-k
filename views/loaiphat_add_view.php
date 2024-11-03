<?php


if(isset($_POST['add_loaiphat'])){
    $add_msg = $obj->add_phat($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thêm nhân viên</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">                                                                              
                        <label for="">Loại tiền phạt</label>
                        <input type="text" name="loaiPhat" class="form-control" id="" placeholder="Nhập loại tiền thưởng">
                      </div>
                      <div class="form-group">
                        <label for="">Số tiền phạt</label>
                        <input type="number" name="soTienPhat" class="form-control" id="" placeholder="Nhập số tiền thưởng">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="add_loaiphat">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>