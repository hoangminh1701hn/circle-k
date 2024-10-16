function calculateTotal() {
    var luongTheoGio = parseFloat(document.getElementById('luongTheoGio').value) || 0;
    var soGioLam = parseFloat(document.getElementById('soGioLam').value) || 0;
    var phuCap = parseFloat(document.getElementById('phuCap').value) || 0;
    var tienThuong = parseFloat(document.getElementById('tienThuong').value) || 0;
    var tienPhat = parseFloat(document.getElementById('tienPhat').value) || 0;
    
    var tongcong = ((luongTheoGio * soGioLam) + phuCap + tienThuong - tienPhat);
    var luongThucNhan = tongcong - (tongcong * (10.05/100));
    document.getElementById('luongThucNhan').value = luongThucNhan.toFixed(2);
}


function showTable() {
    var taiKhoan = document.getElementById('taiKhoan').value;
    var salaryTable = document.getElementById('salaryTable');

    // Kiểm tra nếu đã chọn nhân viên (không phải tùy chọn mặc định)
    if (taiKhoan !== "") {
        salaryTable.style.display = "block";  // Hiển thị bảng
    } else {
        salaryTable.style.display = "none";  // Ẩn bảng nếu chưa chọn nhân viên
    }
}