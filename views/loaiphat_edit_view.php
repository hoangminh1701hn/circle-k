<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'edit') {
        $id = $_GET['id'];
        $phat = $obj->show_loaiphatbyid($id);
      
    }
}

if(isset($_POST['edit_phat'])){
    $add_msg = $obj->update_phat($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Chỉnh sửa danh mục tiền phạt</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" >
                      <div class="form-group">                                                                              
                        <label for="">Loại tiền phạt</label>
                        <input type="text" name="loaiPhat" class="form-control" value="<?php echo $phat['loaiPhat'];?>" id="" placeholder="Nhập loại tiền phạt">
                      </div>
                      <div class="form-group">
                        <label for="">Số tiền phạt</label>
                        <input type="text" name="soTienPhat" class="form-control" value="<?php echo $phat['soTienPhat'];?>" id="" placeholder="Nhập số tiền phạt">
                      </div>
                     
                     
                      <input type="hidden" name="id_phat" value="<?php echo $phat['id_phat']?>">
                      
                      <button type="submit" class="btn btn-primary mr-2" name="edit_phat">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>