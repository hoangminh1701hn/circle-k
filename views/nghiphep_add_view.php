<?php
if(isset($_POST['add_xinnghi'])){
    $add_msg = $obj->add_donxinnghi($_POST);
}



?>




              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Xin nghỉ phép</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" Required>
                    <input type="hidden" name="nhanVien" value="<?php echo $admin_id; ?>">
                      <div class="form-group">                                                                              
                        <label for="">Lý do</label>
                        <textarea name="lyDo" id="" class="form-control" placeholder="Nhập vào lý do xin nghỉ" Required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Từ ngày</label>
                        <input type="date" name="tuNgay" class="form-control" id="" placeholder="Nhập ngày bắt đầu nghỉ" Required>
                      </div>
                      <div class="form-group">
                        <label for="">Đến hết ngày</label>
                        <input type="date" name="denNgay" class="form-control" id="" placeholder="Nhập ngày cuối cùng nghỉ" Required>
                      </div>
                           
                      <button type="submit" class="btn btn-primary mr-2" name="add_xinnghi">Xác nhận</button>
                      <button class="btn btn-dark">Hủy</button>
                    </form>
                  </div>
                </div>
              </div>