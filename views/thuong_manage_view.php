<?php

$showds = $obj->show_dsthuong ($admin_role,$admin_id);
$thuong_info = $obj->show_thuong();
$user_info = $obj->show_admin_user();

if (isset($_GET['status'])) {
    $admin_id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_dsthuong($admin_id);
    }
}
$thuong_array = array();
while ($thuong = mysqli_fetch_assoc($thuong_info)) {
    $thuong_array[] = $thuong;
}
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh sách tiền thưởng</h4>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered table-contextual">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Họ tên</th>
                            <th> Loại thưởng</th>
                            <th> Số lần thưởng</th>
                            <?php if ($admin_role == 'CuaHangTruong') { ?>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dem = 1;
                        while ($ds = mysqli_fetch_assoc($showds)) {
                            ?>
                            <tr class="table-info">
                                <td> <?php echo $dem; ?> </td>
                                <td>
                                    <?php foreach ($user_array as $user) {
                                        if ($user['id_tk'] == $ds['nhanVien']) {
                                            echo $user['hoTen'];
                                        }
                                    } ?>
                                </td>
                               <td> <?php foreach ($thuong_array as $thuong) {
                                    if ($ds['thuong'] == $thuong['id_thuong']) {
                                        echo $thuong['loaiThuong'];
                                    }
                                } ?></td>
                                <td><?php echo $ds['soLanThuong']; ?></td>
                                <?php if ($admin_role == 'CuaHangTruong') { ?>
                                <td>
                                <a href="thuong_edit.php?status=edit&&id=<?php echo $ds['id_dst'] ?>"
                                    class="btn btn-sm btn-warning">Sửa </a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete(<?php echo $ds['id_dst'] ?>)">Xóa</a>

                                </td>
                                <?php } ?>
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