<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hệ thống nhân sự Circle K Việt Nam</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/style1.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/logomini.png" />

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="dashboard.php"><img src="assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="dashboard.php"><img src="assets/images/logomini.png"
            alt="logo" /></a>
      </div>
      <ul class="nav">
        <!-- <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li> -->
        <li class="nav-item nav-category">
          <span class="nav-link">Menu</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="dashboard.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Bảng điều hướng</span>
          </a>
        </li>
        <?php if ($admin_role == 'CuaHangTruong') { ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#chamcong" aria-expanded="false" aria-controls="chamcong">
            <span class="menu-icon">
              <i class="mdi mdi-tag-faces"></i>
            </span>
            <span class="menu-title">Chấm công</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="chamcong">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="chamcong.php">Chấm công</a></li>
              <li class="nav-item"> <a class="nav-link" href="dangkykhuonmat.php">Đăng ký khuôn mặt</a></li>
              <li class="nav-item"> <a class="nav-link" href="chamcong_manage.php">Quản lý chấm công</a></li>
            </ul>
          </div>
        </li>
        <?php } ?>
        <?php if ($admin_role == 'CuaHangTruong') { ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#nhanvien" aria-expanded="false" aria-controls="nhanvien">
            <span class="menu-icon">
              <i class="mdi mdi-account-multiple"></i>
            </span>
            <span class="menu-title">Nhân viên</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="nhanvien">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="nhanvien_add.php">Thêm nhân viên</a></li>
              <li class="nav-item"> <a class="nav-link" href="nhanvien_manage.php">Quản lý nhân viên</a></li>
            </ul>
          </div>
        </li>
        <?php } ?>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#nghiphep" aria-expanded="false" aria-controls="nghiphep">
            <span class="menu-icon">
              <i class="mdi mdi-debug-step-over"></i>
            </span>
            <span class="menu-title">Nghỉ phép</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="nghiphep">
            <ul class="nav flex-column sub-menu">
            <?php if ($admin_role == 'CuaHangTruong') { ?>
              <li class="nav-item"><a class="nav-link" href="nghiphep_manage.php">Quản lý nghỉ phép</a></li>
              <?php } ?>
              <li class="nav-item"><a class="nav-link" href="nghiphep_history.php">Lịch sử nghỉ phép</a></li>
              <li class="nav-item"><a class="nav-link" href="nghiphep_add.php">Xin nghỉ phép</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#luong" aria-expanded="false" aria-controls="luong">
            <span class="menu-icon">
              <i class="mdi mdi-currency-usd"></i>
            </span>
            <span class="menu-title">Lương</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="luong">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="luong_manage.php">Quản lý lương</a></li>
              <?php if ($admin_role == 'CuaHangTruong') { ?>
              <li class="nav-item"> <a class="nav-link" href="luong_add1.php"> Thêm lương </a></li>
              <?php } ?>
            </ul>
          </div>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#dsThuongPhat" aria-expanded="false"
            aria-controls="dsThuongPhat">
            <span class="menu-icon">
              <i class="mdi mdi-debug-step-over"></i>
            </span>
            <span class="menu-title">DS thưởng, phạt</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="dsThuongPhat">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="thuong_manage.php">Quản lý DS thưởng</a></li>
              <?php if ($admin_role == 'CuaHangTruong') { ?>
              <li class="nav-item"><a class="nav-link" href="thuong_add.php">Thêm DS thưởng</a></li>
              <?php } ?>
              <li class="nav-item"><a class="nav-link" href="phat_manage.php">Quản lý DS phạt</a></li>
              <?php if ($admin_role == 'CuaHangTruong') { ?>
              <li class="nav-item"><a class="nav-link" href="phat_add.php">Thêm DS phạt</a></li>
              <?php } ?>
            </ul>
          </div>
        </li>
        <?php if ($admin_role == 'CuaHangTruong') { ?>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#loaithuongphat" aria-expanded="false"
            aria-controls="loaithuongphat">
            <span class="menu-icon">
              <i class="mdi mdi-book-multiple"></i>
            </span>
            <span class="menu-title">Loại thưởng, phạt</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="loaithuongphat">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="loaithuong_manage.php">Quản lý loại tiền thưởng</a></li>
              
              <li class="nav-item"><a class="nav-link" href="loaithuong_add.php">Thêm loại tiền thưởng</a></li>
            
              <li class="nav-item"><a class="nav-link" href="loaiphat_manage.php">Quản lý loại tiền phạt</a></li>
              
              <li class="nav-item"><a class="nav-link" href="loaiphat_add.php">Thêm loại tiền phạt</a></li>
            
            </ul>
          </div>
        </li>
        <?php } ?>

      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
              alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul> -->
          <ul class="navbar-nav navbar-nav-right">


            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Thông báo</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar text-success"></i>
                    </div>
                  </div>

                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Quản lý cửa hàng</p>
                    <p class="text-muted ellipsis mb-0"> Đơn xin nghỉ đã được duyệt! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Xem tất cả</p>
              </div>
            </li>
            <li class="nav-item dropdown">
              <?php
              $user_info = $obj->show_admin_user();

              while ($user = mysqli_fetch_assoc($user_info)) {
                if ($admin_id == $user['id_tk']) { ?>
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">

                <img src="<?php echo 'uploads/avatar/' . basename($user['hinhDaiDien']); ?>"
                                            alt="Hình ảnh Đại diện" style="width: 50px; height: auto;" class="img-xs rounded-circle">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">
                    <?php
                  
                      echo $user['hoTen'];
                    }
                  }
                  ?>
                  </p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Đổi mật khẩu</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="?adminLogout=logout" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Đăng xuất</p>
                  </div>
                </a>

            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>

      <script>
       $(document).ready(function() {
    $('#profileDropdown').dropdown();
    $('#notificationDropdown').dropdown();
});
</script>