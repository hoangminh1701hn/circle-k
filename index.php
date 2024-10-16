<!-- <?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *")?> -->
<!-- <?php 

    include("class/adminback.php");
    $obj= new adminback();

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
    $admin_role = $_SESSION['role'];
    if($admin_id==null){
        header("location:dangnhap.php");
    }

    if(isset($_GET['adminLogout'])){
        if($_GET['adminLogout']=="logout"){
            $obj->admin_logout();
        }
    }
?> -->

<?php 
    include ("includes/header.php")
?>

  <body>
  <body>
            <div class="main-panel">
                <div class="content-wrapper">
                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashboard_view.php');
                                        }elseif($views=="chamcong" ){
                                            include ("views/chamcong_view.php");
                                        }elseif($views=="chamcong_manage"){
                                            include ("views/chamcong_manage_view.php");
                                        }elseif($views=="nhanvien_add" ){
                                            include ("views/nhanvien_add_view.php");
                                        }elseif($views=="nhanvien_manage"){
                                            include ("views/nhanvien_manage_view.php");
                                        }elseif($views=="nghiphep_manage"){
                                            include ("views/nghiphep_manage_view.php");
                                        }elseif($views=="nghiphep_history" ){
                                            include ("views/nghiphep_history_view.php");
                                        }elseif($views=="luong_manage" ){
                                            include ("views/luong_manage_view.php");
                                        }elseif($views=="dangkyfaceid" ){
                                            include ("views/dangkyfaceid_view.php");
                                        }elseif($views=="luong_add" ){
                                            include ("views/luong_add_view.php");
                                        }
                                        else{
                                            echo '<script>
                                            window.location.href = "http://localhost/doantn/dashboard.php";
                                            </script>';
                                        }

                                    }
                                ?>
                </div>
            </div>

<?php 
    include ("includes/footer.php")
?>