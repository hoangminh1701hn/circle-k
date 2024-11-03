<?php

$showds = $obj->show_dsphat();
$phat_info = $obj->show_phat();
$user_info = $obj->show_admin_user();

if (isset($_GET['status'])) {
    $admin_id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_dsphat($admin_id);
    }
}
$phat_array = array();
while ($phat = mysqli_fetch_assoc($phat_info)) {
    $phat_array[] = $phat;
}
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh sách tiền phạt</h4>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered table-contextual">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Họ tên</th>
                            <th> Loại phạt</th>
                            <th> Số lần phạt</th>
                            <th>Action</th>
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
                               <td> <?php foreach ($phat_array as $phat) {
                                    if ($ds['phat'] == $phat['id_phat']) {
                                        echo $phat['loaiPhat'];
                                    }
                                } ?></td>
                                <td><?php echo $ds['soLanPhat']; ?></td>

                                <td>
                                <a href="phat_edit.php?status=edit&&id=<?php echo $ds['id_dsp'] ?>"
                                    class="btn btn-sm btn-warning">Sửa </a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete(<?php echo $ds['id_dsp'] ?>)">Xóa</a>

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