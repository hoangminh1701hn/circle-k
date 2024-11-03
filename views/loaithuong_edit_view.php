<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'edit') {
        $id = $_GET['id'];
        $thuong = $obj->show_loaithuongbyid($id);
      
    }
}

if(isset($_POST['edit_thuong'])){
    $add_msg = $obj->update_thuong($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa danh mục tiền thưởng</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">                                                                              
                        <label for="">Loại tiền thưởng</label>
                        <input type="text" name="loaiThuong" class="form-control" value="<?php echo $thuong['loaiThuong'];?>" id="" placeholder="Nhập loại tiền thưởng">
                      </div>
                      <div class="form-group">
                        <label for="">Số tiền thưởng</label>
                        <input type="text" name="soTienThuong" class="form-control" value="<?php echo $thuong['soTienThuong'];?>" id="" placeholder="Nhập số tiền thưởng">
                      </div>
                     
                     
                      <input type="hidden" name="id_thuong" value="<?php echo $thuong['id_thuong']?>">
                      
                      <button type="submit" class="btn btn-primary mr-2" name="edit_thuong">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>