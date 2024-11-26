<?php
        $user_info = $obj->show_admin_user_by_id($admin_id);
        $user = mysqli_fetch_assoc($user_info);
?>
<style>
    #hosoColor{
        color: black;
    }
</style>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" class="text-center">Thông tin nhân viên</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <img src="uploads/avatar/<?php echo $user['hinhDaiDien'] ?>" style="width: 240px; border-radius: 50%;" alt="Avatar">
                </div>
                <div class="form-group">
                    <label for="">Họ Tên</label>
                    <input type="text" name="user_hoten" class="form-control" id="hosoColor"
                        value="<?php echo $user['hoTen']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="user_email" class="form-control" value="<?php echo $user['email']; ?>" id="hosoColor" readonly>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="user_sdt" class="form-control" value="<?php echo $user['Sdt']; ?>" id="hosoColor" readonly>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="user_adress" class="form-control" value="<?php echo $user['diaChi']; ?>" id="hosoColor" readonly>
                </div>
                <div class="form-group">
                    <label for="">Giới tính</label>
                    <input type="text" id="hosoColor" class="form-control" value="<?php echo $user['gioiTinh']; ?>" readonly> 
                </div>
               
              
                <div class="form-group">
                    <label for="">Vai trò</label>
                    <input type="text" id="hosoColor" class="form-control" value="<?php if($user['role']=='CuaHangTruong')
                    {
                        echo 'Cửa hàng trưởng';
                    }elseif($user['role']=='NhanVien'){
                        echo 'Nhân viên';
                    } ?>" readonly>
                </div>
                <a href="hoso_edit.php?status=edit&&id=<?php echo $admin_id ?>"
                                        class="badge badge-outline-warning">Sửa</a>
            </form>
        </div>
    </div>
</div>
