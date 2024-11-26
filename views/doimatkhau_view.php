<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_matkhau'])) {
    $id_tk = $_POST['id_tk'];
    $passCu = $_POST['passcu'];
    $passMoi = $_POST['passmoi'];
    $xacNhanPass = $_POST['xacnhanpass'];

   
    if ($passMoi !== $xacNhanPass) {
        echo "<script>alert('Mật khẩu mới và xác nhận không khớp!');</script>";
    } else {
       
        $result = $obj->updatePassword($id_tk, $passCu, $passMoi);
        echo "<script>alert('$result');</script>";
    }
}

?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thay đổi mật khẩu</h4>
            <form class="forms-sample" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_tk" value="<?php echo htmlspecialchars($admin_id); ?>">
               
                <div class="form-group">
                    <label for="">Mật khẩu cũ</label>
                    <div class="input-group">
                        <input type="password" name="passcu" id="passcu" class="form-control" placeholder="Nhập vào mật khẩu cũ" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('passcu')">Hiện</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu mới</label>
                    <div class="input-group">
                        <input type="password" name="passmoi" id="passmoi" class="form-control" placeholder="Nhập vào mật khẩu mới" required minlength="6">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('passmoi')">Hiện</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nhập lại mật khẩu mới</label>
                    <div class="input-group">
                        <input type="password" name="xacnhanpass" id="xacnhanpass" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('xacnhanpass')">Hiện</button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2" name="update_matkhau">Xác nhận</button>
                <button type="reset" class="btn btn-dark">Hủy</button>
            </form>
        </div>
    </div>
</div>
<script>
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const button = field.nextElementSibling.querySelector('button');
        if (field.type === "password") {
            field.type = "text";
            button.innerText = "Ẩn";
        } else {
            field.type = "password";
            button.innerText = "Hiện";
        }
    }
</script>
