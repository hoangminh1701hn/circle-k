<?php


$thuong_info = $obj->show_thuong();
$user_info = $obj->show_admin_user();

if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_dsthuong($id);
    }if ($_GET['status'] == 'xacnhan') {
        $obj->xacnhan_dsthuong($id);
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

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    if (!empty($keyword)) {
      $thuong_info = $obj->search_thuong($keyword,$admin_role,$admin_id);
  
  
  
      $thuong_datas = array();
      while ($thuong_ftecth = mysqli_fetch_assoc($thuong_info)) {
        $thuong_datas[] = $thuong_ftecth;
      }
      $search_item = count($thuong_datas);
    } else {
      header('location:thuong_manage.php');
    }
  } else {
    $thuong_info = $obj->show_dsthuong($admin_role,$admin_id);
  
    $thuong_datas = array();
  
    while ($thuong_ftecth = mysqli_fetch_assoc($thuong_info)) {
      $thuong_datas[] = $thuong_ftecth;
    }
  }
?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh sách tiền thưởng</h4>
            <?php include("includes/search_bar.php"); ?>
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
                        if (count($thuong_datas) > 0) {
                        $dem = 1;
                        foreach ($thuong_datas as $ds)
                            # code...
                        {
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
                                <a href="javascript:void(0);" class="btn btn-sm btn-success"
                                onclick="confirmUp(<?php echo $ds['id_dst'] ?>)">+</a>
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

<script>
    function confirmUp(id) {
        if (confirm("Bạn có chắc chắn lựa chọn này không?")) {
            window.location.href = "?status=xacnhan&id=" + id;
        }
    }
</script>