<?php
// Include file chứa class và kết nối cơ sở dữ liệu của bạn
$employee_id = 2;
$thang= 9; // Ví dụ mã nhân viên cần kiểm tra
$soGioLam = $obj->tinhSoGioLamTheoThang($employee_id,$thang);

echo "Số giờ làm trong tháng của nhân viên có ID $employee_id trong tháng $thang là: $soGioLam";

?>  