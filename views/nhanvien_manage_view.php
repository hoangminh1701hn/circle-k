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


              