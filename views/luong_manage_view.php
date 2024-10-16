<?php
    $showluong = $obj-> show_luong();
    $user_info = $obj->show_admin_user();
    $dem=1;


    $user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý lương</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                               STT
                            </th>
                            <th> Tên nhân viên </th>
                            <th> Lương theo giờ </th>
                            <th> Số giờ làm </th>
                            <th> Phụ cấp </th>
                            <th> Thưởng </th>
                            <th> Phạt </th>
                            <th>Lương thực nhận</th>
                            <th>Ngày Thanh Toán</th>
                            <th>Xác nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($luong = mysqli_fetch_assoc($showluong)){ ?>
                        <tr>
                            <td>
                            <?php echo $dem ?>
                            </td>
                            <td>
                            <?php foreach ($user_array as $user) {
                                if ($luong['taikhoan'] == $user['id_tk']) {
                                    echo $user['hoTen'];
                                }
                            } ?>
                            </td>
                            <td><?php echo $luong['luongTheoGio'] ?> .000đ</td>
                            <td> <?php echo $luong['soGioLam'] ?></td>
                            <td> <?php echo $luong['phuCap'] ?>.000đ </td>
                            <td> <?php echo $luong['thuong'] ?>.000đ </td>
                            <td> <?php echo $luong['phat'] ?>.000đ </td>
                           <td> <?php echo $luong['luongThucNhan'] ?>.000đ</td>
                           <td> <?php echo $luong['ngayThanhToan'] ?></td>

                            <td>
                                <a href="#" class="badge badge-outline-success">Xác nhận</a>
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