<?php


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



if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    if (!empty($keyword)) {
      $phat_info = $obj->search_phat($keyword,$admin_role, $admin_id);
  
  
  
      $phat_datas = array();
      while ($phat_ftecth = mysqli_fetch_assoc($phat_info)) {
        $phat_datas[] = $phat_ftecth;
      }
      $search_item = count($phat_datas);
    } else {
      header('location:phat_manage.php');
    }
  } else {
    $phat_info = $obj->show_dsphat($admin_role, $admin_id);
  
    $phat_datas = array();
  
    while ($phat_ftecth = mysqli_fetch_assoc($phat_info)) {
      $phat_datas[] = $phat_ftecth;
    }
  }
?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh sách tiền phạt</h4>
            <?php include("includes/search_bar.php"); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-contextual">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Họ tên</th>
                            <th> Loại phạt</th>
                            <th> Số lần phạt</th>
                            <?php if ($admin_role == 'CuaHangTruong') { ?>
                                 <th>Action</th>
                                 <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         if (count($phat_datas) > 0) {
                        $dem = 1;
                        foreach ($phat_datas as $ds) {
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
                                <?php if ($admin_role == 'CuaHangTruong') { ?>
                                <td>
                                <a href="phat_edit.php?status=edit&&id=<?php echo $ds['id_dsp'] ?>"
                                    class="btn btn-sm btn-warning">Sửa </a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                    onclick="confirmDelete(<?php echo $ds['id_dsp'] ?>)">Xóa</a>

                                </td>
                                <?php } ?>
                            </tr>
                            <?php
                            $dem++;
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Không có dữ liệu để hiển thị</td></tr>";
                      }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>