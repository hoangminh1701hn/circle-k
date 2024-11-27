<?php
$showluong = $obj->show_luong($admin_role, $admin_id);
$user_info = $obj->show_admin_user();
$dem = 1;
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_luong($id);
    } elseif ($_GET['status'] == 'xacnhan') {
        $obj->xacnhan_luong($id);
    }
}


$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    if (!empty($keyword)) {
      $luong_info = $obj->search_luong($keyword,$admin_role, $admin_id);
  
  
  
      $luong_datas = array();
      while ($luong_ftecth = mysqli_fetch_assoc($luong_info)) {
        $luong_datas[] = $luong_ftecth;
      }
      $search_item = count($luong_datas);
    } else {
      header('location:luong_manage.php');
    }
  } else {
    $luong_info = $obj->show_luong($admin_role, $admin_id);
  
    $luong_datas = array();
  
    while ($luong_ftecth = mysqli_fetch_assoc($luong_info)) {
      $luong_datas[] = $luong_ftecth;
    }
  }
  
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý lương</h4>
            <?php include("includes/search_bar.php"); ?>
            <div class="table-responsive">
                <table class="table" style="color: white;">
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
                            <?php if ($admin_role == 'CuaHangTruong') { ?>
                                <th>Xác nhận</th> <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php      if (count($luong_datas) > 0) {
                        foreach ($luong_datas as $luong) { ?>
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
                                <td> <?php if ($luong['ngayThanhToan'] == '0000-00-00 00:00:00') {
                                    echo 'Chưa thanh toán';
                                } else {
                                    echo $luong['ngayThanhToan'];

                                }
                                ?></td>
                                <?php if ($admin_role == 'CuaHangTruong') { ?>
                                    <td>
                                        <a href="javascript:void(0);" class="badge badge-outline-success"
                                            onclick="confirmXacNhan(<?php echo $luong['id_luong'] ?>)">Xác nhận</a>
                                        <a href="luong_edit.php?trangthai=edit&&id=<?php echo $luong['id_luong'] ?>"
                                            class="badge badge-outline-warning">Sửa</a>
                                        <a href="javascript:void(0);" class="badge badge-outline-danger"
                                            onclick="confirmDelete(<?php echo $luong['id_luong'] ?>)">Xóa</a>
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
    function confirmXacNhan(id) {
        if (confirm("Bạn có chắc chắn muốn xác nhận thanh toán này không?")) {
            window.location.href = "?status=xacnhan&id=" + id;
        }
    }
</script>