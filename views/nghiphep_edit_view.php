<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'Edit') {
        $id = $_GET['id'];
        $nghiphep_info = $obj->show_xin_nghiphep_byid($id);
        $nghiphep = mysqli_fetch_assoc($nghiphep_info);
    }
}


if (isset($_POST['update_xinnghi'])) {
    $add_msg = $obj->update_donxinnghi($_POST);
}
?>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Xin nghỉ phép</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data" required>
                <input type="hidden" name="nhanVien" value="<?php echo $admin_id; ?>">
                <input type="hidden" name="id_np" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="">Lý do</label>
                    <textarea name="lyDo" id=""  class="form-control" 
                     placeholder="Nhập vào lý do xin nghỉ" required><?php echo $nghiphep['lyDo']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh chứng minh</label>
                    <input type="file" name="hinhanh" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Chọn hình ảnh chứng minh (JPG, PNG, GIF)</small>
                    <img src="<?php echo 'uploads/nghiphep/' . basename($nghiphep['hinhanh']); ?>" style="width: 80px;" > <br>
                </div>
                <div class="form-group">
                    <label for="">Từ ngày</label>
                    <input type="date" name="tuNgay" class="form-control" value="<?php echo $nghiphep['tuNgay']; ?>" id="tuNgay" placeholder="Nhập ngày bắt đầu nghỉ" required>
                </div>
                <div class="form-group">
                    <label for="">Đến hết ngày</label>
                    <input type="date" name="denNgay" class="form-control" id="denNgay" value="<?php echo $nghiphep['denNgay']; ?>" placeholder="Nhập ngày cuối cùng nghỉ" required>
                </div>
               
                <button type="submit" class="btn btn-primary mr-2" name="update_xinnghi">Xác nhận</button>
                <button type="reset" class="btn btn-dark">Hủy</button>
            </form>
        </div>
    </div>
</div>

<script>

    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const yyyy = today.getFullYear();
    const todayStr = `${yyyy}-${mm}-${dd}`;

 
    document.getElementById('tuNgay').setAttribute('min', todayStr);
    document.getElementById('denNgay').setAttribute('min', todayStr);

 
    document.getElementById('tuNgay').addEventListener('change', function() {
        const tuNgay = new Date(this.value);
        const denNgayInput = document.getElementById('denNgay');
        
        if (tuNgay < today) {
            alert("Ngày bắt đầu không được nhỏ hơn hôm nay!");
            this.value = todayStr;
            denNgayInput.value = todayStr;
        } else if (denNgayInput.value && new Date(denNgayInput.value) < tuNgay) {
            alert("Ngày kết thúc phải sau ngày bắt đầu!");
            denNgayInput.value = ""; 
        }
    });

    document.getElementById('denNgay').addEventListener('change', function() {
        const denNgay = new Date(this.value);
        const tuNgayInput = document.getElementById('tuNgay');
        
        if (denNgay < today) {
            alert("Ngày kết thúc không được nhỏ hơn hôm nay!");
            this.value = todayStr;
        } else if (denNgay < new Date(tuNgayInput.value)) {
            alert("Ngày kết thúc phải sau ngày bắt đầu!");
            this.value = ""; 
        }
    });
</script>
