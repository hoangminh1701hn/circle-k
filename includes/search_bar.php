<div class="header-search-bar layout-01">
    <?php
        $tranghientai = basename($_SERVER['PHP_SELF']); // Lấy tên của trang hiện tại
        // Thiết lập action của form dựa trên trang hiện tại
        if ($tranghientai === 'nhanvien_manage.php') {
            echo '<form action="nhanvien_manage.php" class="form-search" name="desktop-seacrh" method="get">';
        } if ($tranghientai === 'luong_manage.php') {
            echo '<form action="luong_manage.php" class="form-search" name="desktop-seacrh" method="get">';
        } if ($tranghientai === 'thuong_manage.php') {
            echo '<form action="thuong_manage.php" class="form-search" name="desktop-seacrh" method="get">';
        } if ($tranghientai === 'nghiphep_manage.php') {
            echo '<form action="nghiphep_manage.php" class="form-search" name="desktop-seacrh" method="get">';
        } if ($tranghientai === 'phat_manage.php') {
            echo '<form action="phat_manage.php" class="form-search" name="desktop-seacrh" method="get">';
        } if ($tranghientai === 'nghiphep_history.php') {
            echo '<form action="nghiphep_history.php" class="form-search" name="desktop-seacrh" method="get">';
        } 
    ?>
        <input type="text" name="keyword" class="input-text"  placeholder="Nhập nội dung cần tìm...">

        <input type="submit" class="btn-submit" value="Tìm kiếm" name="search" style="margin-top: 8px;font-size:16px;">
        
        <!-- <input type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button> -->
    </form>
</div>