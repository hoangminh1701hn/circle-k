<?php
$showthuong = $obj->show_thuong();

$dem = 1;
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_thuong($id);
    }
}
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh mục tiền thưởng</h4>
            <div class="table-responsive">
                <table class="table" style="color: white;">
                    <thead>
                        <tr>
                            <th>
                                STT
                            </th>
                            <th> Loại thưởng </th>
                            <th> Số tiền thưởng </th> 
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($thuong = mysqli_fetch_assoc($showthuong)) { ?>
                            <tr>
                                <td>
                                    <?php echo $dem ?>
                                </td>
                                <td>
                                <?php echo $thuong['loaiThuong'] ?>
                                </td>
                                <td><?php echo $thuong['soTienThuong'] ?> .000đ</td>
                               

                                <td>
                                
                                    <a href="loaithuong_edit.php?status=edit&&id=<?php echo $thuong['id_thuong'] ?>"
                                        class="badge badge-outline-warning">Sửa</a>
                                    <a href="javascript:void(0);" class="badge badge-outline-danger"
                                        onclick="confirmDelete(<?php echo $thuong['id_thuong'] ?>)">Xóa</a>
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

