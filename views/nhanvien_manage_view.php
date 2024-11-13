<?php

$shownv= $obj->show_admin_user();



if(isset($_GET['status'])){
    $admin_id = $_GET['id'];
    if($_GET['status']=='delete'){
          $obj->delete_admin($admin_id);
    }
}
?>
<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Quản lý nhân viên</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Họ tên</th>
                            <th>Hình đại diện</th>
                            <th> Số điện thoại  </th>
                            <th> Địa chỉ </th>
                            <th> Giới tính  </th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
             $dem= 1;
            while($user = mysqli_fetch_assoc($shownv)){
        ?>
                          <tr class="table-info">
                            <td> <?php echo $dem; ?> </td>
                            <td> <?php echo $user['hoTen'];?></td>
                            <td>
                                    <?php if (!empty($user['hinhDaiDien'])): ?>
                                        <img src="<?php echo 'uploads/avatar/' . basename($user['hinhDaiDien']); ?>"
                                            alt="Hình ảnh Đại diện" style="width: 100px; height: auto;" data-toggle="modal"
                                            data-target="#imageModal"
                                            onclick="document.getElementById('modalImage').src = this.src;">
                                    <?php else: ?>
                                        <p>Không có hình ảnh</p>
                                    <?php endif; ?>
                                </td>
                            <td><?php echo $user['Sdt'];?> </td>
                            <td><?php echo $user['diaChi'];?></td>
                            <td> <?php echo $user['gioiTinh'];?> </td>
                            <td> <?php echo $user['email'];?> </td>
                            <td> <?php 
                            if( $user['role']=='CuaHangTruong'){
                                echo 'Cửa hàng trưởng';
                            }elseif( $user['role']=='NhanVien'){
                                echo 'Nhân viên';
                            }
                            ?> </td>
                            <td>  
                    <a href="nhanvien_edit.php?status=userEdit&&id=<?php echo $user['id_tk'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $user['id_tk'] ?>)">Xóa</a>

                </td>
                          </tr>
                <?php
                 $dem++;
            }
           
                ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Hình ảnh đại diện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="modalImage" src="" alt="Hình ảnh chứng minh" class="img-fluid">
            </div>
        </div>
    </div>
</div>