<?php
if (isset($_GET['status'])) {
  $admin_id = $_GET['id'];
  if ($_GET['status'] == 'delete') {
    $obj->delete_admin($admin_id);
  }
}

if (isset($_GET['search'])) {
  $keyword = $_GET['keyword'];
  if (!empty($keyword)) {
    $nhanvien_info = $obj->search_nhanvien($keyword);



    $user_datas = array();
    while ($user_ftecth = mysqli_fetch_assoc($nhanvien_info)) {
      $user_datas[] = $user_ftecth;
    }
    $search_item = count($user_datas);
  } else {
    header('location:nhanvien_manage.php');
  }
} else {
  $shownv = $obj->show_admin_user();

  $user_datas = array();

  while ($user_ftecth = mysqli_fetch_assoc($shownv)) {
    $user_datas[] = $user_ftecth;
  }
}
?>
<div class="col-lg-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Quản lý nhân viên</h4>
      <?php include("includes/search_bar.php"); ?>
      </p>
      <div class="table-responsive">
        <table class="table table-bordered table-contextual">
          <thead>
            <tr>
              <th> # </th>
              <th> Họ tên</th>
              <th>Hình đại diện</th>
              <th> Số điện thoại </th>
              <th> Địa chỉ </th>
              <th> Giới tính </th>
              <th>Email</th>
              <th>Vai trò</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (count($user_datas) > 0) {
              $dem = 1;
              foreach ($user_datas as $user) {
                ?>
                <tr class="table-info">
                  <td><?php echo $dem; ?></td>
                  <td><?php echo htmlspecialchars($user['hoTen']); ?></td>
                  <td>
                    <?php if (!empty($user['hinhDaiDien'])): ?>
                      <img src="<?php echo 'uploads/avatar/' . htmlspecialchars($user['hinhDaiDien']); ?>"
                        alt="Hình ảnh Đại diện" style="width: 100px; height: auto;">
                    <?php else: ?>
                      <p>Không có hình ảnh</p>
                    <?php endif; ?>
                  </td>
                  <td><?php echo htmlspecialchars($user['Sdt']); ?></td>
                  <td><?php echo htmlspecialchars($user['diaChi']); ?></td>
                  <td><?php echo htmlspecialchars($user['gioiTinh']); ?></td>
                  <td><?php echo htmlspecialchars($user['email']); ?></td>
                  <td><?php echo $user['role'] === 'CuaHangTruong' ? 'Cửa hàng trưởng' : 'Nhân viên'; ?></td>
                  <td>
                    <a href="nhanvien_edit.php?status=userEdit&&id=<?php echo $user['id_tk']; ?>"
                      class="btn btn-sm btn-warning">Sửa</a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                      onclick="confirmDelete(<?php echo $user['id_tk']; ?>)">Xóa</a>
                  </td>
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