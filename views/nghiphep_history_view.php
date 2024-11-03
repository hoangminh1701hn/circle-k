<?php

$show_nghiphep = $obj->show_lichsu_nghiphep();
$user_info = $obj->show_admin_user();
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}
?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Lịch sử nghỉ phép</h4>
            </p>
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
                            <th>Ngày xin nghỉ</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $dem = 1;
                        while ($np = mysqli_fetch_assoc($show_nghiphep)) {
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
                                <td> <?php if ($np['trangThai'] == 'DangXuLy') {
                                    echo '<div class="badge badge-warning">Đang xử lý</div>';
                                } elseif ($np['trangThai'] == 'Duyet') {
                                    echo '<div class="badge badge-success">Đã duyệt</div>';
                                } elseif ($np['trangThai'] == 'TuChoi') {
                                    echo '<div class="badge badge-danger">Đã từ chối</div>';
                                } ?> </td>
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