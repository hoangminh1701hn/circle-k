<?php

// Bao gồm tệp xử lý insurance
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $obj->delete_insurance($id);
    } 
}
// Lấy thông tin danh sách bảo hiểm từ hàm đã sửa
$insurance_list = $obj->get_all_insurance(); 

// Kiểm tra nếu có dữ liệu
if (!$insurance_list) {
    die('Không thể truy vấn dữ liệu bảo hiểm: ' . mysqli_error($obj->get_connection()));
}

?>
<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Quản lý bảo hiểm</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-contextual">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Họ tên nhân viên </th>
                            <th> Loại bảo hiểm </th>
                            <th> Ngày bắt đầu </th>
                            <th> Ngày kết thúc </th>
                            <th> Số tiền bảo hiểm </th>
                            <th> Ghi chú </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        while ($insurance = mysqli_fetch_assoc($insurance_list)) {
                            ?>
                            <tr class="table-info">
                                <td> <?php echo $insurance['id']; ?> </td>
                                <td> <?php echo $insurance['ten_nhan_vien']; ?> </td> <!-- Sử dụng tên nhân viên từ truy vấn -->
                                <td> <?php echo $insurance['insurance_type']; ?> </td>
                                <td> <?php echo $insurance['start_date']; ?> </td>
                                <td> <?php echo $insurance['end_date']; ?> </td>
                                <td> <?php echo number_format($insurance['coverage_amount'], 2); ?> </td>
                                <td> <?php echo $insurance['notes']; ?> </td>
                                <td>
                                    <a href="edit_insurance.php?status=edit&&id=<?php echo $insurance['id']; ?>" class="btn btn-sm btn-warning">Sửa</a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $insurance['id']; ?>)">Xóa</a>
                                </td>
                            </tr>
                            <?php
                            
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm("Bạn có chắc chắn muốn xóa mục này?")) {
        window.location.href = "insurance_manage.php?status=delete&&id=" + id;
    }
}
</script>
