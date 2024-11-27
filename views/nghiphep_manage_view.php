<?php
$user_info = $obj->show_admin_user();
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'Duyet') {
        $obj->duyet_trangthai_nghiphep($id);
    } elseif ($_GET['status'] == 'TuChoi') {
        $obj->tuchoi_trangthai_nghiphep($id);
    }
}

if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    if (!empty($keyword)) {
      $nghiphep_info = $obj->search_nghiphep($keyword);
  
  
  
      $nghiphep_datas = array();
      while ($nghiphep_ftecth = mysqli_fetch_assoc($nghiphep_info)) {
        $nghiphep_datas[] = $nghiphep_ftecth;
      }
      $search_item = count($nghiphep_datas);
    } else {
      header('location:nghiphep_manage.php');
    }
  } else {
    $nghiphep_info = $obj->show_xin_nghiphep();
  
    $nghiphep_datas = array();
  
    while ($nghiphep_ftecth = mysqli_fetch_assoc($nghiphep_info)) {
      $nghiphep_datas[] = $nghiphep_ftecth;
    }
  }


?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý nghỉ phép</h4>
            <?php include("includes/search_bar.php"); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-contextual">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Họ tên</th>
                            <th> Lý do </th>
                            <th>Hình ảnh</th>
                            <th>Từ ngày</th>
                            <th> Đến ngày </th>
                            <th>Ngày xin phép</th>
                          
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         if (count($nghiphep_datas) > 0) {
                        $dem = 1;
                       foreach ($nghiphep_datas as $np){
                            ?>
                            <tr class="table-info">
                                <td> <?php echo $dem; ?> </td>
                                <td>
                                    <?php foreach ($user_array as $user) {
                                        if ($np['nhanVien'] == $user['id_tk']) {
                                            echo $user['hoTen'];
                                        }
                                    } ?>
                                </td>
                                <td><?php echo $np['lyDo']; ?> </td>
                                <td>
                                    <?php if (!empty($np['hinhanh'])): ?>
                                        <img src="<?php echo 'uploads/nghiphep/' . basename($np['hinhanh']); ?>"
                                            alt="Hình ảnh chứng minh" style="width: 100px; height: auto;" data-toggle="modal"
                                            data-target="#imageModal"
                                            onclick="document.getElementById('modalImage').src = this.src;">
                                    <?php else: ?>
                                        <p>Không có hình ảnh</p>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo $np['tuNgay']; ?></td>
                                <td> <?php echo $np['denNgay']; ?> </td>
                                <td> <?php echo $np['ngayXinPhep']; ?> </td>
                                <td>
                                    <a href="?status=Duyet&id=<?php echo $np['id_np']; ?>"
                                        class="badge badge-success">Duyệt</a>
                                    <a href="?status=TuChoi&id=<?php echo $np['id_np']; ?>" class="badge badge-danger">Từ
                                        chối</a>
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
                <h5 class="modal-title" id="imageModalLabel">Hình ảnh chứng minh</h5>
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