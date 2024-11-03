<?php
$showphat = $obj->show_phat();

$dem = 1;
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_phat($id);
    }
}
?>
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý danh mục tiền phạt</h4>
            <div class="table-responsive">
                <table class="table" style="color: white;">
                    <thead>
                        <tr>
                            <th>
                                STT
                            </th>
                            <th> Loại phạt </th>
                            <th> Số tiền phạt </th> 
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($phat = mysqli_fetch_assoc($showphat)) { ?>
                            <tr>
                                <td>
                                    <?php echo $dem ?>
                                </td>
                                <td>
                                <?php echo $phat['loaiPhat'] ?>
                                </td>
                                <td><?php echo $phat['soTienPhat'] ?> .000đ</td>
                               

                                <td>
                                
                                    <a href="loaiphat_edit.php?status=edit&&id=<?php echo $phat['id_phat'] ?>"
                                        class="badge badge-outline-warning">Sửa</a>
                                    <a href="javascript:void(0);" class="badge badge-outline-danger"
                                        onclick="confirmDelete(<?php echo $phat['id_phat'] ?>)">Xóa</a>
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

